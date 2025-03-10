<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/form', function () {
    return view('view_form');
});

Route::post('/traiteFormulaire', function () {
    return view('view_form');
});
