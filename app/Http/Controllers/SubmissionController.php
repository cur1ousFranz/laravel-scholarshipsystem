<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicantList;

class SubmissionController extends Controller
{
    public function show(Application $application)
    {
        $applicantList = ApplicantList::with('applicant',
                        'applicant.address',
                        'applicant.school',
                        'applicant.contact',
                        'rating'
                        )
                        ->where(['applications_id' => $application->id, 'review' => null])
                        ->filter(request(['search']))
                        ->join('ratings', 'applicant_lists.id', '=', 'ratings.applicant_lists_id')
                        ->orderBy('ratings.rate', 'desc')
                        ->orderBy('applicant_lists.created_at')
                        ->paginate(10);

        return view('coordinator.submission', [
            'applicantList' => $applicantList,
            'application' => $application
        ]);
    }
}
