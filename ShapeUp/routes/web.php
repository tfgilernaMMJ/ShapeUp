<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('web.index');
})->name('account.index');

Route::get('/conocenos', function () {
    return view('web.about');
})->name('account.about');

Route::get('/suscripciones', function () {
    return view('web.subscriptions');
})->name('account.subscriptions');

Route::get('/contacto', function () {
    return view('web.contact');
})->name('account.contact');

