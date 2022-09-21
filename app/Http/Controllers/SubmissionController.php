<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicantList;

class SubmissionController extends Controller
{
    public function show(Application $application)
    {
        $applicantList = ApplicantList::with([
                'applicant',
                'applicant.school',
                'applicant.address',
                'applicant.contact',
                'application:id',
                'rating:applicant_lists_id,rate'
            ])
            ->leftJoin('applicants', 'applicants.id' , '=', 'applicant_lists.applicants_id')
            ->where([
                'applications_id' => $application->id,
                'review' => null
            ])
            ->filter(request(['search']))
            ->orderBy('applicant_lists.created_at','desc')
            ->paginate(10);

        return view('coordinator.submission', [
            'applicantList' => $applicantList,
            'application' => $application
        ]);
    }
}
