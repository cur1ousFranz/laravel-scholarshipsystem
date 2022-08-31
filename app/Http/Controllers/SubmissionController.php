<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicantList;

class SubmissionController extends Controller
{
       public function show(Application $application)
       {

           $applicantList = ApplicantList::where(['applications_id' => $application->id, 'review' => null])
               ->latest()
               ->paginate(10);

           return view('coordinator.submission', [
               'applicantList' => $applicantList,
               'application' => $application
           ]);
       }
}
