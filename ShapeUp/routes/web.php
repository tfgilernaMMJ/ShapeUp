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

// ------------------------------------------------------------

// WEB

// ------------------------------------------------------------

// INDEX

Route::get('/', [App\Http\Controllers\WebController::class, 'index'])->name('account.index')->middleware('auth');

Route::get('/home', function () {
    return view('web.landing');
})->name('account.landing');
// AUTH

Route::get('/signin', function () {
    return view('auth\login');
})->name('signin');

Route::get('/signup', function () {
    return view('auth\register');
})->name('signup');

// LANDING

Route::get('/landing', function () {
    return view('web.landing');
})->name('landing');

// IMC

Route::get('/imc', function () {
    return view('web.imc');
})->name('account.imc');

// ABOUT

Route::get('/conocenos', function () {
    return view('web.about');
})->name('account.about');

// COURSES

Route::get('/cursos', function () {
    return view('web.courses');
})->name('account.courses');

Route::get('/cursos/detalles', function () {
    return view('web.course-details');
})->name('account.courses-details');

// COACHES 

Route::get('/entrenadores', [App\Http\Controllers\WebController::class, 'indexCoaches'])->name('account.coaches');

Route::get('/entrenadores/accion/{action}/{coach_id}', [App\Http\Controllers\WebController::class, 'followCoaches'])->name('account.coaches.follow');

Route::get('/entrenadores/mensajes/{coach_id}', [App\Http\Controllers\WebController::class, 'messageCoaches'])->name('account.coaches.message');

Route::post('/entrenadores/enviarmensajes/{coach_id}', [App\Http\Controllers\WebController::class, 'sendMessageCoaches'])->name('account.coaches.message.send');

// EVENTS

Route::get('/eventos', function () {
    return view('web.events');
})->name('account.events');

// SUBSCRIPTIONS
Route::get('/suscripciones', function () {
    return view('web.subscriptions');
})->name('account.subscriptions');

Route::get('/suscripciones/metodo-de-pago', function () {
    return view('web.checkout');
})->name('account.checkout');

Route::get('/suscripciones/metodo-de-pago/paypal', function () {
    return view('web.paypal');
})->name('account.paypal');

Route::get('/suscripciones/metodo-de-pago/tarjeta-de-credito', function () {
    return view('web.creditcard');
})->name('account.creditcard');

Route::post('/suscripciones/metodo-de-pago/pago', [App\Http\Controllers\WebController::class, 'paymentSubscription'])->name('account.payment');

Route::get('/suscripciones/metodo-de-pago/confirm', function () {
    return view('web.confirmdisable');
})->name('account.confirmdisable');

Route::get('/suscripciones/metodo-de-pago/{action}', [App\Http\Controllers\WebController::class, 'paymentSubscription'])->name('account.payment.disable');

// CONTACT

Route::get('/contacto', function () {
    return view('web.contact');
})->name('account.contact');

Route::post('/contacto/enviarcorreo/', [App\Http\Controllers\WebController::class, 'contactShapeUp'])->name('account.contact.email.send');

// ------------------------------------------------------------

// TESTING DASHBOARD

// ------------------------------------------------------------

Route::get('/dashboard-principal/{coach_id}', [App\Http\Controllers\DashboardController::class, 'get_users_followers'])->name('dashboard-principal');



Route::get('/dashboard-tables', function () {
    return view('dashboard.tables');
})->name('dashboard-tables');

// CONTROLLERS DASHBOARD




// Auth::routes(['verify' => true]);

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
