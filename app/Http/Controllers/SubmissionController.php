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
                'applicant:id,first_name,middle_name,last_name,age,gender,civil_status,nationality,educational_attainment,years_in_city,family_income,registered_voter,gwa',
                'applicant.school:applicants_id,desired_school,course_name,hei_type,school_last_attended',
                'applicant.address:applicants_id,country,province,city,barangay,street,region,zipcode',
                'applicant.contact:applicants_id,contact_number,email',
                'application:id',
                'rating:applicant_lists_id,rate'
            ])
            ->where([
                'applications_id' => $application->id,
                'review' => null
            ])
            // ->join('ratings', 'ratings.applicant_lists_id', '=', 'applicant_lists.id')
            // ->orderBy('ratings.rate', 'DESC')
            ->latest()
            ->paginate(100);

        return view('coordinator.submission', [
            'applicantList' => $applicantList,
            'application' => $application
        ]);
    }
}
