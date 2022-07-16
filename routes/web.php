<?php

use App\Models\Application;
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

/**
 * User Controller
 *
 */

// Create Account of User
Route::post('/users', [UserController::class,'createAccount'])->middleware('guest');
// Login User
Route::post('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
// Logout User
Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

Route::group(['middleware' => 'auth'], function() {

    Route::group(['middleware' => 'coordinator'], function(){

            /**
             * Coordinator Controller
             */
            // Dashboard page
            Route::get('/dashboard', [CoordinatorController::class, 'dashboard'])->name('dashboard');
            // Application Page
            Route::get('/applications', [CoordinatorController::class, 'application'])->name('application');
            // Application Form
            Route::get('/applications/create', function() {
                return view('coordinator.create_application');
            });
            // Application Store
            Route::post('/applications/store', [CoordinatorController::class, 'applicationStore']);
            // Application Edit View
            Route::get('/applications/{application}/edit', function(Application $application) {

                return view('coordinator.edit_application', [
                    'application' => $application
                ]);
            });
            // Application details update
            Route::patch('/applications/{application}/details', [CoordinatorController::class, 'applicationDetailsUpdate']);
            // Application files update
            Route::patch('/applications/{application}/files', [CoordinatorController::class, 'applicationFilesUpdate']);

            // Submissions
            Route::get('/applications/{application}/submissions', [CoordinatorController::class, 'submissions']);
            // Listing Applicant if Qualified or Rejected
            Route::post('/submissions/listing/{application}', [CoordinatorController::class, 'listingApplicant']);

            // Qualified Applicant Table
            Route::get('/applicants/qualified', [CoordinatorController::class, 'qualifiedApplicant']);
            // Qualified Applicant List Table
            Route::get('/applicants/qualified/list/{application}', [CoordinatorController::class, 'qualifiedApplicantList']);
            // Send notification to Qualified Applicants
            Route::post('/applicants/qualified/message/{application}', [CoordinatorController::class, 'qualifiedApplicantNotification']);

            // Rejected Applicant Table
            Route::get('/applicants/rejected', [CoordinatorController::class, 'rejectedApplicant']);
            // Rejected Applicant List Table
            Route::get('/applicants/rejected/list/{application}', [CoordinatorController::class, 'rejectedApplicantList']);
            // Send notification to Rejected Applicants
            Route::post('/applicants/rejected/message/{application}', [CoordinatorController::class, 'rejectedApplicantNotification']);

    });

    Route::group(['middleware' => 'applicant'], function() {

        /**
         * Applicant Controller
         */
        // Applicant profile page
        Route::get('/profile', [ApplicantController::class, 'applicantProfile']);
        // Applicant edit profile page
        Route::get('/profiles/{profile}/edit', [ApplicantController::class, 'applicantProfileEdit']);
        // Applicant profile update
        Route::put('/profiles/{profile}', [ApplicantController::class, 'applicantProfileUpdate']);
        // Applicant notification
        Route::get('/notifications/{id}', [ApplicantController::class, 'notificationMessage']);

        // Fetch Method of Address Dynamic Dependent
        Route::post('/applicantcontroller/fetchAddress', [ApplicantController::class, 'fetchAddress'])->name('applicantcontroller.fetchAddress');
        // Fetch Method of School Courses Dynamic Dependent
        Route::post('/applicantcontroller/fetch', [ApplicantController::class, 'fetch'])->name('applicantcontroller.fetch');

        /** Application Controller */
        // Application Form
        Route::get('/apply', [ApplicationController::class, 'apply'])->name('apply');
        // Submission Store
        Route::post('/submissions/{application}', [ApplicationController::class, 'submissionStore']);

    });

});





