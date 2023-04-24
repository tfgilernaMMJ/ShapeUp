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

Route::get('/login', function () {
    return view('auth\register');
})->name('signing');

Route::get('/conocenos', function () {
    return view('web.about');
})->name('account.about');

Route::get('/cursos', function () {
    return view('web.courses');
})->name('account.courses');

Route::get('/cursos/detalles', function () {
    return view('web.course-details');
})->name('account.courses-details');

Route::get('/entrenadores', function () {
    return view('web.coaches');
})->name('account.coaches');

Route::get('/eventos', function () {
    return view('web.events');
})->name('account.events');

Route::get('/suscripciones', function () {
    return view('web.subscriptions');
})->name('account.subscriptions');

Route::get('/contacto', function () {
    return view('web.contact');
})->name('account.contact');