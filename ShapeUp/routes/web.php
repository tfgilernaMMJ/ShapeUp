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
})->name('account.landing')->middleware('auth');

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
})->name('account.imc')->middleware('auth');

// ABOUT

Route::get('/conocenos', function () {
    return view('web.about');
})->name('account.about')->middleware('auth');

// TRAININGS

Route::get('/entrenamientos', [App\Http\Controllers\WebController::class, 'indexTrainings'])->name('account.trainings')->middleware('auth', 'supershapeup');

Route::post('/entrenamientos/filtros', [App\Http\Controllers\WebController::class, 'indexTrainings'])->name('account.trainings.filters')->middleware('auth', 'supershapeup');

Route::get('/entrenamientos/ejercicios/{training_id}', [App\Http\Controllers\WebController::class, 'indexTrainingsExercises'])->name('account.trainings.exercises')->middleware('auth', 'supershapeup');

Route::get('/entrenamientos/accion/{action}/{view}/{training_id}', [App\Http\Controllers\WebController::class, 'followTrainings'])->name('account.trainings.follow')->middleware('auth', 'supershapeup');

// DIETS

Route::get('/dietas', [App\Http\Controllers\WebController::class, 'indexDiets'])->name('account.diets')->middleware('auth', 'supershapeup');

Route::post('/dietas/filtros', [App\Http\Controllers\WebController::class, 'indexDiets'])->name('account.diets.filters')->middleware('auth', 'supershapeup');

Route::get('/dietas/alimentos/{diet_id}', [App\Http\Controllers\WebController::class, 'indexDietsIngredients'])->name('account.diets.ingredients')->middleware('auth', 'supershapeup');

Route::get('/dietas/accion/{action}/{view}/{diet_id}', [App\Http\Controllers\WebController::class, 'followDiets'])->name('account.diets.follow')->middleware('auth', 'supershapeup');

// COACHES 

Route::get('/entrenadores', [App\Http\Controllers\WebController::class, 'indexCoaches'])->name('account.coaches')->middleware('auth');

Route::post('/entrenadores/filtros', [App\Http\Controllers\WebController::class, 'indexCoaches'])->name('account.coaches.filters')->middleware('auth');

Route::get('/entrenadores/accion/{action}/{coach_id}', [App\Http\Controllers\WebController::class, 'followCoaches'])->name('account.coaches.follow')->middleware('auth');

Route::get('/entrenadores/mensajes/{coach_id}', [App\Http\Controllers\WebController::class, 'messageCoaches'])->name('account.coaches.message')->middleware('auth', 'supershapeup');

Route::post('/entrenadores/enviarmensajes/{coach_id}', [App\Http\Controllers\WebController::class, 'sendMessageCoaches'])->name('account.coaches.message.send')->middleware('auth', 'supershapeup');

// EVENTS

Route::get('/eventos', function () {
    return view('web.events');
})->name('account.events')->middleware('auth');

// SUBSCRIPTIONS
Route::get('/suscripciones', function () {
    return view('web.subscriptions');
})->name('account.subscriptions')->middleware('auth');

Route::get('/suscripciones/metodo-de-pago', function () {
    return view('web.checkout');
})->name('account.checkout')->middleware('auth');

Route::get('/suscripciones/metodo-de-pago/paypal', function () {
    return view('web.paypal');
})->name('account.paypal')->middleware('auth');

Route::get('/suscripciones/metodo-de-pago/tarjeta-de-credito', function () {
    return view('web.creditcard');
})->name('account.creditcard')->middleware('auth');

Route::post('/suscripciones/metodo-de-pago/pago', [App\Http\Controllers\WebController::class, 'paymentSubscription'])->name('account.payment')->middleware('auth');

Route::get('/suscripciones/metodo-de-pago/confirm', function () {
    return view('web.confirmdisable');
})->name('account.confirmdisable')->middleware('auth', 'supershapeup');

Route::get('/suscripciones/metodo-de-pago/{action}', [App\Http\Controllers\WebController::class, 'paymentSubscription'])->name('account.payment.disable')->middleware('auth');

// CONTACT

Route::get('/contacto', function () {
    return view('web.contact');
})->name('account.contact')->middleware('auth');

Route::post('/contacto/enviarcorreo/', [App\Http\Controllers\WebController::class, 'contactShapeUp'])->name('account.contact.email.send')->middleware('auth');

// PROFILE

Route::get('/perfil', function () {
    return view('web.profile');
})->name('account.profile')->middleware('auth');

Route::post('/perfil/editar/', [App\Http\Controllers\WebController::class, 'editProfile'])->name('account.profile.edit')->middleware('auth');

Route::get('/perfil/cambiar-contraseña', function () {
    return view('web.editpassword');
})->name('account.profile.password')->middleware('auth');

Route::post('/perfil/editar/cambiar-contraseña', [App\Http\Controllers\WebController::class, 'editPassword'])->name('account.profile.edit.password')->middleware('auth');

// ------------------------------------------------------------

// COACH DASHBOARD

// ------------------------------------------------------------

Route::get('/admin-entrenador', [App\Http\Controllers\CoachController::class, 'dashboardPrincipal'])->name('admin-coach')->middleware('auth', 'coach');

Route::get('/admin-entrenador/trainings', function () {
    return view('coach.trainings');
})->name('admin-coach.trainings')->middleware('auth', 'coach');

Route::get('/search',[App\Http\Controllers\CoachController::class, 'searchTrainings'])->name('search-trainings')->middleware('auth', 'coach');

Route::get('/admin-entrenador/formularios', function () {
    return view('coach.forms');
})->name('admin-coach.forms')->middleware('auth', 'coach');

Route::get('/admin-entrenador/tarjetas', function () {
    return view('coach.cards');
})->name('admin-coach.cards')->middleware('auth', 'coach');

Route::get('/admin-entrenador/graficos', function () {
    return view('coach.charts');
})->name('admin-coach.charts')->middleware('auth', 'coach');

Route::get('/admin-entrenador/botones', function () {
    return view('coach.buttons');
})->name('admin-coach.buttons')->middleware('auth', 'coach');

Route::get('/admin-entrenador/modales', function () {
    return view('coach.modals');
})->name('admin-coach.modals')->middleware('auth', 'coach');

Route::get('/admin-entrenador/tablas', function () {
    return view('coach.tables');
})->name('admin-coach.tables')->middleware('auth', 'coach');

// ------------------------------------------------------------

// ADMIN DASHBOARD

// ------------------------------------------------------------

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'dashboardPrincipal'])->name('admin');
Route::get('/search',[App\Http\Controllers\AdminController::class, 'dashboardPrincipal'])->name('admin-search');

Route::get('/admin-coaches',[App\Http\Controllers\AdminController::class, 'dashboardCoaches'])->name('admin.coaches');

Route::get('/admin-trainings', function () {
    return view('admin.trainings');
})->name('admin.trainings');

Route::get('/admin-formularios', function () {
    return view('admin.forms');
})->name('admin.forms')->middleware('auth', 'admin');

Route::get('/admin-tarjetas', function () {
    return view('admin.cards');
})->name('admin.cards')->middleware('auth', 'admin');

Route::get('/admin-graficos', function () {
    return view('admin.charts');
})->name('admin.charts')->middleware('auth', 'admin');

Route::get('/admin-botones', function () {
    return view('admin.buttons');
})->name('admin.buttons')->middleware('auth', 'admin');

Route::get('/admin-modales', function () {
    return view('admin.modals');
})->name('admin.modals')->middleware('auth', 'admin');

Route::get('/admin-tablas', function () {
    return view('admin.tables');
})->name('admin.tables')->middleware('auth', 'admin');

// ------------------------------------------------------------

// Auth::routes(['verify' => true]);

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');