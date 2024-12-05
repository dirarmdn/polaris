import './bootstrap';
import 'flowbite';

import 'material-icons/iconfont/material-icons.css';
import '@material/web/button/filled-button.js';
import '@material/web/button/outlined-button.js';
import '@material/web/checkbox/checkbox.js';
import "/node_modules/select2/dist/css/select2.css";

import AOS from 'aos';
import 'aos/dist/aos.css';

import swal from 'sweetalert2';
window.Swal = swal;

AOS.init();

import 'flowbite';
import select2 from 'select2';
select2();

import Alpine from 'alpinejs'

Alpine.start()

// If you want Alpine's instance to be available globally
window.Alpine = Alpine
