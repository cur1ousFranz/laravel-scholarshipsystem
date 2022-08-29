<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\DynamicDropdownController;
use App\Http\Controllers\ListingApplicantController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\QualifiedApplicantController;
use App\Http\Controllers\RejectedApplicantController;
use App\Http\Controllers\ScholarshipApplicationController;
use App\Http\Controllers\SubmissionController;


Route::get('/', [UserController::class, 'index']);
Route::get('/signup', [UserController::class, 'signup'])->middleware('guest');
Route::post('/users', [UserController::class,'create'])->middleware('guest');
Route::post('login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

Route::group(['middleware' => 'auth'], function() {

    Route::group(['middleware' => 'coordinator'], function(){

            Route::get('/dashboard', [CoordinatorController::class, 'dashboard']);
            Route::get('/applications', [CoordinatorController::class, 'application']);

            Route::get('/applications/create', [ScholarshipApplicationController::class, 'create']);
            Route::post('/applications/create', [ScholarshipApplicationController::class, 'store']);
            Route::get('/applications/{application}/edit', [ScholarshipApplicationController::class, 'edit']);

            Route::patch('/applications/{application}/details', [ScholarshipApplicationController::class, 'updateDetails']);
            Route::patch('/applications/{application}/files', [ScholarshipApplicationController::class, 'updateFiles']);

            Route::get('/applications/{application}/submissions', [SubmissionController::class, 'show']);

            Route::post('/applicants/{application}', [ListingApplicantController::class, 'store']);

            Route::get('/applicants/qualified', [QualifiedApplicantController::class, 'index']);
            Route::get('/applicants/qualified/{application}', [QualifiedApplicantController::class, 'show']);

            Route::get('/applicants/rejected', [RejectedApplicantController::class, 'index']);
            Route::get('/applicants/rejected/{application}', [RejectedApplicantController::class, 'show']);

            Route::post('/applicants/qualified/message/{application}', [NotificationController::class, 'storeQualified']);
            Route::post('/applicants/rejected/message/{application}', [NotificationController::class, 'storeRejected']);

    });

    Route::group(['middleware' => 'applicant'], function() {

        Route::get('/profile', [ApplicantController::class, 'index']);
        Route::get('/profiles/{applicant}/edit', [ApplicantController::class, 'edit']);
        Route::put('/profiles/{applicant}', [ApplicantController::class, 'update']);
        Route::get('/notifications/{notification}', [NotificationController::class, 'show']);

        // Fetch Method of Address Dynamic Dependent
        Route::post('/applicantcontroller/fetchAddress', [DynamicDropdownController::class, 'fetchAddress'])
        ->name('dynamicdropdowncontroller.fetchAddress');
        // Fetch Method of School Courses Dynamic Dependent
        Route::post('/applicantcontroller/fetch', [DynamicDropdownController::class, 'fetch'])
        ->name('dynamicdropdowncontroller.fetch');

        Route::get('/apply', [ApplicationController::class, 'index']);
        Route::post('/apply/{application}', [ApplicationController::class, 'store']);

    });

});





