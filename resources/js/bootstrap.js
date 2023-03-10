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

window.axios = axios;
window.Alpine = Alpine;
window.Swal = Swal;
window.FormData = FormData;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });
