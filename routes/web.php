<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ApplicationController;
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
});

Route::get('/signup', function () {
    return view('signup');
})->middleware('guest');


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
// Create Account of Coordinator Form
Route::get('/coordinator', [CoordinatorController::class, 'createForm'])->name('coordinator');
// Create Accoount of Coordinator
Route::post('/coordinator/create', [CoordinatorController::class, 'createAccount']);
// Application Page
Route::get('/applications', [CoordinatorController::class, 'application'])->name('application');
// Application Form
Route::get('/applications/create', [CoordinatorController::class, 'applicationCreate']);
// Application Store
Route::post('/applications/store', [CoordinatorController::class, 'applicationStore']);
// Application Edit View
Route::get('/applications/{application}/edit', [CoordinatorController::class, 'applicationEdit']);
// Application details update
Route::put('/applications/{application}', [CoordinatorController::class, 'applicationDetailsUpdate']);
// Application files update
Route::put('/applications/{application}', [CoordinatorController::class, 'applicationFilesUpdate']);

// Submission Table
Route::get('/submissions', [CoordinatorController::class, 'submission']);
// Applicant Table
Route::get('/applicants', [CoordinatorController::class, 'applicant']);

/**
 * Applicant Controller
 *
 */
// Applicant profile page
Route::get('/profile', [ApplicantController::class, 'applicantProfile']);
// Applicant edit profile page
Route::get('/profiles/{profile}/edit', [ApplicantController::class, 'applicantProfileEdit']);
// Applicant profile update
Route::put('/profiles/{profile}', [ApplicantController::class, 'applicantProfileUpdate']);

/**
 * Application Controller
 *
 */
// Application Form
Route::get('/apply', [ApplicationController::class, 'apply'])->name('apply');



