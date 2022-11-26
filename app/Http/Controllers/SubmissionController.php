<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicantList;

class SubmissionController extends Controller
{
    public function show(Application $application)
    {
        $applicantList = ApplicantList::with('applicant',
                        'applicant.address', 'applicant.school',
                        'applicant.contact', 'rating'
                        )
                        ->where(['applications_id' => $application->id, 'review' => null])
                        ->filter(request(['search']))
                        ->orderBy('applicant_lists.created_at','desc')
                        ->paginate(100);

        return view('coordinator.submission', [
            'applicantList' => $applicantList,
            'application' => $application
        ]);
    }
}
