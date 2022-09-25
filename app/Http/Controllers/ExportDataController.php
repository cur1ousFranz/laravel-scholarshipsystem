<?php

namespace App\Http\Controllers;

use App\Models\ApplicantList;
use App\Models\QualifiedApplicant;
use App\Models\RejectedApplicant;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportDataController extends Controller
{

    public function show(){

        $year = request()->validate([
            'school_year' => 'required',
        ]);

        $applicantList = ApplicantList::with('applicant', 'applicant.school')
                        ->whereYear('created_at', $year['school_year'])
                        ->get();

        $qualifiedApplicants = QualifiedApplicant::with('applicant', 'applicant.school')
                        ->whereYear('created_at', $year['school_year'])
                        ->get();

        $rejectedApplicants = RejectedApplicant::with('applicant', 'applicant.school')
                        ->whereYear('created_at', $year['school_year'])
                        ->get();

        // Fetcing all schools without duplication and asigning to array
        $schools = [];
        foreach($applicantList as $list){

            if(!in_array($list->applicant->first()->school->desired_school, $schools)){
                $schools[] = $list->applicant->first()->school->desired_school;
            }
        }

        // Counting the applicants on every school and asigning it to array
        $schoolApplicantsCount = array();
        foreach($schools as $school){
            $count = 0;
            foreach($applicantList as $list){
                if($list->applicant->first()->school->desired_school === $school){
                    $count++;
                }
            }
            $schoolApplicantsCount[$school] = $count;
        }

        if (request()->input('action') === 'preview') {

            $pdf = Pdf::loadView('pdf.export', [
                'applicantList' => $applicantList,
                'qualifiedApplicants' => $qualifiedApplicants,
                'rejectedApplicants' => $rejectedApplicants,
                'year' => $year['school_year'],
                'schoolApplicantsCount' => $schoolApplicantsCount
            ]);

            return $pdf->stream('School-Year-'. $year['school_year'] .'-'. $year['school_year'] + 1 .'.pdf');
        }

        if (request()->input('action') === 'download') {

            $pdf = Pdf::loadView('pdf.export', [
                'applicantList' => $applicantList,
                'qualifiedApplicants' => $qualifiedApplicants,
                'rejectedApplicants' => $rejectedApplicants,
                'year' => $year['school_year'],
                'schoolApplicantsCount' => $schoolApplicantsCount
            ]);
            return $pdf->download('School-Year-'. $year['school_year'] .'-'. $year['school_year'] + 1 .'.pdf');
        }

    }
}
