<?php

use App\Http\Controllers\AppointmentController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Inertia::share('appName', config('app.name'));
Route::get('/', function () {
    return Inertia::render('Welcome', [
    ]);
})->name('/');

// Pages
Route::get('/coacheslist', function () {
    return Inertia::render('CoachesList');

})->middleware(['auth', 'verified'])->name('coacheslist');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile Routing
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Pages Routing
    // Route::get('/pages/coaches', [PageController::class, 'getCoaches'])->name('pages.coaches');
    
    // Coahes
    Route::resource('coaches', CoachController::class);
    
    // Clients
    Route::resource('clients', ClientController::class)->middleware('client');

    // Appointment
    Route::resource('appointments', AppointmentController::class);

    Route::get('/coachesList', [CoachController::class, 'coachesList'])->name('coaches.coachesList');
    Route::get('/calendar', [CoachController::class, 'calendar'])->middleware('coach')->name('coaches.calendar');
});

// ----------------------------------------
Route::get('/share', function () {
    return Inertia::render('ShareData', [
    ]);
});

require __DIR__.'/auth.php';
