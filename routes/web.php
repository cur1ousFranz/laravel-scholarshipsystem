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


Route::controller(UserController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/signup', 'signup')->middleware('guest');
    Route::post('/users', 'create')->middleware('guest');
    Route::post('authenticate', 'login')->name('login')->middleware('guest');
    Route::get('/logout', 'logout')->name('logout')->middleware('auth');
});

Route::group(['middleware' => 'auth'], function() {

    Route::group(['middleware' => 'coordinator'], function(){

            Route::controller(CoordinatorController::class)->group(function(){
                Route::get('/dashboard', 'dashboard');
                Route::get('/applications', 'application');
            });

            Route::controller(ScholarshipApplicationController::class)->group(function(){
                Route::get('/applications/create','create');
                Route::post('/applications/create','store');
                Route::get('/applications/{application}/edit','edit');
                Route::patch('/applications/{application}/details','updateDetails');
                Route::patch('/applications/{application}/files','updateFiles');
            });

            Route::controller(QualifiedApplicantController::class)->group(function(){
                Route::get('/qualified', 'index');
                Route::get('/qualified/{application}','show');
            });

            Route::controller(RejectedApplicantController::class)->group(function(){
                Route::get('/rejected','index');
                Route::get('/rejected/{application}','show');
            });

            Route::controller(NotificationController::class)->group(function(){
                Route::post('/applicants/qualified/message/{application}', 'storeQualified');
                Route::post('/applicants/rejected/message/{application}','storeRejected');
            });

            Route::get('/applications/{application}/submissions', [SubmissionController::class, 'show']);
            Route::post('/applicants/{application}', [ListingApplicantController::class, 'store']);

    });

    Route::group(['middleware' => 'applicant'], function() {

        Route::controller(ApplicantController::class)->group(function(){
            Route::get('/profile', 'index');
            Route::get('/profiles/{applicant}/edit', 'edit');
            Route::put('/profiles/{applicant}', 'update');
        });

        Route::controller(DynamicDropdownController::class)->group(function(){
            // Fetch Method of Address Dynamic Dependent
            Route::post('/applicantcontroller/fetchAddress', 'fetchAddress')
            ->name('dynamicdropdowncontroller.fetchAddress');
            // Fetch Method of School Courses Dynamic Dependent
            Route::post('/applicantcontroller/fetch', 'fetch')
            ->name('dynamicdropdowncontroller.fetch');
        });

        Route::controller(ApplicationController::class)->group(function(){
            Route::get('/apply', 'index');
            Route::post('/apply/{application}', 'store');
        });

        Route::get('/notifications/{notification}', [NotificationController::class, 'show']);

    });

});





