import './bootstrap';
import 'flowbite';

import $ from 'jquery';
window.$ = window.jQuery = $;

import 'material-icons/iconfont/material-icons.css';
import '@material/web/button/filled-button.js';
import '@material/web/button/outlined-button.js';
import '@material/web/checkbox/checkbox.js';

import AOS from 'aos';
import 'aos/dist/aos.css';

import swal from 'sweetalert2';
window.Swal = swal;

AOS.init();

import 'flowbite';
import { DataTable } from "simple-datatables";
if (document.getElementById("mitra-table")) {
    const dataTable = new DataTable("#mitra-table", {
        searchable: true,
        sortable: true
    });
}
