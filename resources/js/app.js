import axios from "axios";
import Alpine from "alpinejs";
import Swal from "sweetalert2/dist/sweetalert2";
import FormData from "form-data";
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
