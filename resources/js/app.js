import './bootstrap';
import { Notyf } from 'notyf/notyf.es.js';
window.notyf = new Notyf(); // Asigna a window para hacerlo global
// Exporta notyf para uso global si es necesario
export default notyf;
