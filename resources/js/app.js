import "./bootstrap";

Alpine.store("deleteConfirm", (accept = null, reject = null, options = {}) => {
  Swal.fire({
    title: "Are you sure?",
    text: "You will delete it permanently.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, Delete it!",
    cancelButtonText: "No, Cancel",
    reverseButtons: true,
    buttonsStyling: false,
    customClass: {
      confirmButton: "btn btn-danger",
      cancelButton: "btn btn-primary",
    },
    ...options,
  }).then(function (result) {
    if (result.value && typeof accept === "function") {
      accept();
    } else if (typeof reject === "function") {
      reject();
    }
  });
});

window.fire = {
  success(text, options = {}) {
    Swal.fire({
      icon: "success",
      title: "Sukses",
      text,
      ...options,
    });
  },
  error(text, options = {}) {
    Swal.fire({
      icon: "error",
      title: "Error",
      text,
      ...options,
    });
  },
  info(text, options = {}) {
    Swal.fire({
      icon: "info",
      title: "Info",
      text,
      ...options,
    });
  },
  warning(text, options = {}) {
    Swal.fire({
      icon: "warning",
      title: "Warning",
      text,
      ...options,
    });
  },
};

Alpine.store("fire", window.fire);
Alpine.start();
