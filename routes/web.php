<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});

Route::get('/home/index', function () {
    return view('home.index');
});