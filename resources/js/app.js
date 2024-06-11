import './bootstrap';
/* import { Notyf } from 'notyf/notyf.es.js';
import 'notyf/notyf.min.css'; // for React, Vue and Svelte
window.notyf = new Notyf(); // Asigna a window para hacerlo global
// Exporta notyf para uso global si es necesario
export default notyf; */

import toastr from 'toastr';
import 'toastr/build/toastr.min.css';

window.toastr = toastr; // Asigna a window para hacerlo global

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-bottom-right",  // Predeterminado para tablets y escritorio
  "preventDuplicates": true,
  "onclick": null,
  "showDuration": "1300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};



//todo esto es para los iconos aninamos 
import lottie from "lottie-web";
import { defineElement } from "@lordicon/element";

// define "lord-icon" custom element with default properties
defineElement(lottie.loadAnimation);
