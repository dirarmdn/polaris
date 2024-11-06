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

import { DataTable } from "simple-datatables";
const dataTable = new DataTable("#default-table");