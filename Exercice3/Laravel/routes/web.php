<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formController;
Route::get('/', function () {
    return view('welcome');
});


Route::get('/form', [formController::class, 'afficheFormulaire']);

Route::post('/traiteListe', [formController::class, 'traiteListe']);

Route::get('/liste', [formController::class, 'afficheListe']);
