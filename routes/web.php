<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CoordinatorController;

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

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::get('/signup', function () {
    return view('signup');
})->middleware('guest');

Route::get('/home', function () {
    return view('applicant.home');
})->name('home')->middleware('auth');

Route::get('/dashboard', function () {
    return view('coordinator.dashboard');
})->name('dashboard')->middleware('auth');

/**
 * User Controller
 *
 */

// Create Account of User
Route::post('/users', [UserController::class,'createAccount'])->middleware('guest');
// Login User
Route::post('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
// Logout User
Route::post('/logout', [UserController::class, 'logout']);

/**
 * Coordinator Controller
 *
 */

// Create Account of Coordinator
Route::get('/coordinator', [CoordinatorController::class, 'createForm'])->name('coordinator');
// Create Accoount of Coordinator
Route::post('/coordinator/create', [CoordinatorController::class, 'createAccount']);
// Application Page
Route::get('/application', [CoordinatorController::class, 'application'])->name('application');
// Application Form
Route::get('/application/create', [CoordinatorController::class, 'applicationCreate']);

