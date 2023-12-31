<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SoporteController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::resource('/', TicketController::class);
Route::get('/tickets', [TicketController::class, 'showList'])->name('showList');;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register',  [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register',  [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard.index');

    Route::prefix('dashboard')->group(function () {
        Route::resource('/users', UserController::class);
        Route::resource('/soporte', SoporteController::class);
    });
});
