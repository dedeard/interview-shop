window.deleteConfirm = (accept = null, reject = null, options = {}) => {
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
      confirmButton: "btn btn-danger ml-1",
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
};
