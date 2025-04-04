<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});
    

Route::get('/contact', [ContactController::class, 'rendFormulaire']);
Route::post('/contact', [ContactController::class, 'valideEtTraiteFormulaire']);