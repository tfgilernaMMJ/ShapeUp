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

Route::get('/entrenamientos', [App\Http\Controllers\WebController::class, 'indexTrainings'])->name('account.trainings');

Route::get('/entrenamientos/ejercicios/{training_id}', [App\Http\Controllers\WebController::class, 'indexTrainingsExercises'])->name('account.trainings.exercises');

Route::get('/entrenamientos/accion/{action}/{training_id}', [App\Http\Controllers\WebController::class, 'followTrainings'])->name('account.trainings.follow');

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

// PROFILE

Route::get('/perfil', function () {
    return view('web.profile');
})->name('account.profile');

Route::post('/perfil/editar/', [App\Http\Controllers\WebController::class, 'editProfile'])->name('account.profile.edit');

Route::get('/perfil/cambiar-contraseña', function () {
    return view('web.editpassword');
})->name('account.profile.password');

Route::post('/perfil/editar/cambiar-contraseña', [App\Http\Controllers\WebController::class, 'editPassword'])->name('account.profile.edit.password');

// ------------------------------------------------------------

// COACH DASHBOARD

// ------------------------------------------------------------

Route::get('/admin-entrenador', [App\Http\Controllers\CoachController::class, 'dashboardPrincipal'])->name('admin-coach');

Route::get('/admin-entrenador/trainings', function () {
    return view('coach.trainings');
})->name('admin-coach.trainings');
Route::get('/search', [App\Http\Controllers\CoachController::class, 'searchTrainings'])->name('search-trainings');

Route::get('/admin-entrenador/formularios', function () {
    return view('coach.forms');
})->name('admin-coach.forms');

Route::get('/admin-entrenador/tarjetas', function () {
    return view('coach.cards');
})->name('admin-coach.cards');

Route::get('/admin-entrenador/graficos', function () {
    return view('coach.charts');
})->name('admin-coach.charts');

Route::get('/admin-entrenador/botones', function () {
    return view('coach.buttons');
})->name('admin-coach.buttons');

Route::get('/admin-entrenador/modales', function () {
    return view('coach.modals');
})->name('admin-coach.modals');

Route::get('/admin-entrenador/tablas', function () {
    return view('coach.tables');
})->name('admin-coach.tables');


// ADMIN DASHBOARD

// ------------------------------------------------------------

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'dashboardPrincipal'])->name('admin');
    Route::get('/search', [App\Http\Controllers\AdminController::class, 'dashboardPrincipal'])->name('admin-search');
    Route::prefix('admin')->name('admin.')->group(function () {
        // ADMIN USERS VIEWS
        // ----------------------------
        Route::get('/coaches', [App\Http\Controllers\AdminController::class, 'bringGeneralData'])->name('coaches');
        Route::get('/users', [App\Http\Controllers\AdminController::class, 'bringGeneralData'])->name('users');
        Route::get('/admins', [App\Http\Controllers\AdminController::class, 'bringGeneralData'])->name('admins');

        // ADMIN TRAININGS VIEWS
        // ----------------------------
        Route::get('/trainings', [App\Http\Controllers\AdminController::class, 'bringGeneralData'])->name('trainings');
        Route::get('/exercises', [App\Http\Controllers\AdminController::class, 'bringGeneralData'])->name('exercises');

        // ADMIN DIETS VIEWS
        // ----------------------------
        Route::get('/diets', [App\Http\Controllers\AdminController::class, 'bringGeneralData'])->name('diets');
        Route::get('/ingredients', [App\Http\Controllers\AdminController::class, 'bringGeneralData'])->name('ingredients');

        // ADMIN BRANDS VIEWS
        // ----------------------------
        Route::get('/gyms', [App\Http\Controllers\AdminController::class, 'bringGeneralData'])->name('gyms');
        Route::get('/markets', [App\Http\Controllers\AdminController::class, 'bringGeneralData'])->name('markets');

        // ADMIN CATEOGRIES VIEWS
        // ----------------------------
        Route::get('/trainings-categories', [App\Http\Controllers\AdminController::class, 'bringGeneralData'])->name('trainings-categories');
        Route::get('/exercises-categories', [App\Http\Controllers\AdminController::class, 'bringGeneralData'])->name('exercises-categories');
        Route::get('/diets-categories', [App\Http\Controllers\AdminController::class, 'bringGeneralData'])->name('diets-categories');
        Route::get('/ingredients-categories', [App\Http\Controllers\AdminController::class, 'bringGeneralData'])->name('ingredients-categories');
    });
});


Route::get('/admin-formularios', function () {
    return view('admin.forms');
})->name('admin.forms');

Route::get('/admin-tarjetas', function () {
    return view('admin.cards');
})->name('admin.cards');

Route::get('/admin-graficos', function () {
    return view('admin.charts');
})->name('admin.charts');

Route::get('/admin-botones', function () {
    return view('admin.buttons');
})->name('admin.buttons');

Route::get('/admin-modales', function () {
    return view('admin.modals');
})->name('admin.modals');

Route::get('/admin-tablas', function () {
    return view('admin.tables');
})->name('admin.tables');

// Auth::routes(['verify' => true]);

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
