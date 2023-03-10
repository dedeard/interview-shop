import jQuery from "jquery";
import axios from "axios";
import Alpine from "alpinejs";
import Swal from "sweetalert2/dist/sweetalert2";
import FormData from "form-data";
window.jQuery = window.$ = jQuery;

import "bootstrap";
import "admin-lte";
import "admin-lte/plugins/summernote/summernote-bs4";

import s2 from "admin-lte/plugins/select2/js/select2.full";
s2(jQuery);

import "./fire";
import "./deleteConfirm";

window.axios = axios;
window.Alpine = Alpine;
window.Swal = Swal;
window.FormData = FormData;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

Alpine.store("deleteConfirm", window.deleteConfirm);
Alpine.store("fire", window.fire);
Alpine.start();

$(function () {
  //Initialize Select2 Elements
  $(".select2").select2();

  //Initialize Select2 Elements
  $(".select2bs4").select2({
    theme: "bootstrap4",
  });

  // Summernote
  $("#summernote").summernote();
});
