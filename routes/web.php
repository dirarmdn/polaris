<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});

Route::get('/pengajuan/detail', function () {
    return view('submissions.show');
});
