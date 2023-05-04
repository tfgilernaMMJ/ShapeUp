<?php

// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use Illuminate\Foundation\Auth\EmailVerificationRequest;

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


Route::get('/', [App\Http\Controllers\WebController::class, 'index'])->name('account.index')->middleware('auth');

Route::get('/landing', function () {
    return view('web.landing');
})->name('account.landing');

Route::get('/signin', function () {
    return view('auth\login');
})->name('signin');

Route::get('/signup', function () {
    return view('auth\register');
})->name('signup');

Route::get('/imc', function () {
    return view('web.imc');
})->name('account.imc');

Route::get('/conocenos', function () {
    return view('web.about');
})->name('account.about');

Route::get('/cursos', function () {
    return view('web.courses');
})->name('account.courses');

Route::get('/cursos/detalles', function () {
    return view('web.course-details');
})->name('account.courses-details');

// COACHES 
Route::get('/entrenadores', [App\Http\Controllers\WebController::class, 'indexCoaches'])->name('account.coaches');
Route::get('/entrenadores/{action}/{coach_id}', [App\Http\Controllers\WebController::class, 'followCoaches'])->name('account.coaches.follow');

Route::get('/eventos', function () {
    return view('web.events');
})->name('account.events');

Route::get('/suscripciones', function () {
    return view('web.subscriptions');
})->name('account.subscriptions');

Route::get('/contacto', function () {
    return view('web.contact');
})->name('account.contact');


// TESTING DASHBOARD

// ------------------------------------------------------------

Route::get('/dashboard-principal', function () {
    return view('dashboard.dashboard');
})->name('dashboard-principal');

Route::get('/dashboard-tables', function () {
    return view('dashboard.tables');
})->name('dashboard-tables');

// Auth::routes(['verify' => true]);

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
