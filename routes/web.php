<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('portafolio');
});

Route::get('/contacto', [ContactController::class, 'showForm'])->name('contacto.form');
Route::post('/contacto', [ContactController::class, 'submit'])->name('contacto.submit');
