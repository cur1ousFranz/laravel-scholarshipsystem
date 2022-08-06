<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Applicant;
use App\Models\Application;
use App\Models\Coordinator;
use Illuminate\Http\Request;
use App\Models\ApplicantList;
use Illuminate\Validation\Rule;
use App\Models\ApplicationDetail;
use App\Models\RejectedApplicant;
use App\Models\QualifiedApplicant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Notifications\ApplicantNotification;
use Illuminate\Support\Facades\Notification;

class CoordinatorController extends Controller
{

    /**
     * Dashboard Page
     */
    public function dashboard(){

        /**
         * This is for Applied Applicants chart in dashboard
         */
        $appliedApplicantData = ApplicantList::select('id', 'created_at')->get()->groupBy(function($data){

           return Carbon::parse($data->created_at)->format('Y');
        });

        $appliedApplicantYears = [];
        $appliedApplicantYearCount = [];
        foreach($appliedApplicantData as $year => $value){
            $appliedApplicantYears[] = $year;
            $appliedApplicantYearCount[] = count($value);
        }

         /**
         * This is for Qualified Applicants chart in dashboard
         */
        $qualifiedApplicantData = QualifiedApplicant::select('id', 'created_at')->get()->groupBy(function($data){

            return Carbon::parse($data->created_at)->format('Y');
         });

         $qualifiedApplicantYears = [];
         $qualifiedApplicantYearCount = [];
         foreach($qualifiedApplicantData as $year => $value){
             $qualifiedApplicantYears[] = $year;
             $qualifiedApplicantYearCount[] = count($value);
         }

        /**
         * This is for the Pie Chart with family income data
         */
        $applicant = Applicant::get();
        $applicantFamilyIncome = [0, 0, 0, 0, 0];
        foreach($applicant as $applicants){

            switch($applicants->family_income){
                case 8000:
                    $applicantFamilyIncome[0]++;
                    break;

                case 12000:
                    $applicantFamilyIncome[1]++;
                    break;

                case 16000:
                    $applicantFamilyIncome[2]++;
                    break;

                case 20000:
                    $applicantFamilyIncome[3]++;
                    break;

                case 24000:
                    $applicantFamilyIncome[4]++;
                    break;

            }
        }

        return view('coordinator.dashboard',[
            'appliedApplicantYears' => $appliedApplicantYears,
            'appliedApplicantYearCount' => $appliedApplicantYearCount,

            'qualifiedApplicantYears' => $qualifiedApplicantYears,
            'qualifiedApplicantYearCount' => $qualifiedApplicantYearCount,

            'applicantFamilyIncome' => $applicantFamilyIncome,

            'totalApplicants' => Applicant::get(),
            'totalApplications' => Application::get(),
            'totalSubmissions' => ApplicantList::get()
        ]);

    }

    /**
     * Application Page
     */
    public function application()
    {

        return view('coordinator.application', [
            'application' => Application::latest()->paginate(10)
        ]);
    }

    /**
     * Storing the applications created
     */
    public function applicationStore(Request $request)
    {

        $formFields = $request->validate([
            'slots' => 'required',
            'start_date' => 'required',
            'batch' => 'required',
            'end_date' => 'required',

            'description' => 'required',
            'years_in_city' => 'required',
            'family_income' => 'required',
            'educational_attainment' => 'required',
            'gwa' => 'required',
            'nationality' => 'required',
            'city' => 'required',
            'registered_voter' => 'required',
            'documentary_requirement' => ['required', 'mimes:pdf'],
            'application_form' => ['required', 'mimes:pdf']
        ]);

        $formFields['documentary_requirement'] = $request->file('documentary_requirement')->store('application_files', 'public');
        $formFields['application_form'] = $request->file('application_form')->store('application_files', 'public');

        $coordinatorID = DB::table('coordinators')->where('users_id', Auth::user()->id)->first();

        $application = Application::create([
            'coordinators_id' => $coordinatorID->id,
            'slots' => $formFields['slots'],
            'start_date' => $formFields['start_date'],
            'end_date' => $formFields['end_date'],
            'batch' => $formFields['batch'],
            'status' => "On-going"
        ]);

        ApplicationDetail::create([

            'applications_id' => $application->id,
            'description' => $formFields['description'],
            'years_in_city' => $formFields['years_in_city'],
            'family_income' => $formFields['family_income'],
            'educational_attainment' => $formFields['educational_attainment'],
            'gwa' => $formFields['gwa'],
            'nationality' => $formFields['nationality'],
            'city' => $formFields['city'],
            'registered_voter' => $formFields['registered_voter'],
            'documentary_requirement' => $formFields['documentary_requirement'],
            'application_form' => $formFields['application_form']

        ]);

        return redirect('/applications')->with('success', 'Application created successfully!');
    }

    /**
     * Update the details application form
     */
    public function applicationDetailsUpdate(Request $request, Application $application)
    {

        /* Updating to Applications Table
        * if there is no changes it cannot be updated
        *
        * Getting the current updated date of application
        */
        $currentUpdatedApplication = $application->updated_at;

        $application->slots = $request->input('slots');
        $application->end_date = $request->input('end_date');
        $application->batch = $request->input('batch');
        $application->save();

        /**
         * Updating to ApplicationDetails Table
         * if there is no changes it cannot be updated
         *
         * Getting the current updated date of application details
         */
        $applicationDetail = ApplicationDetail::find($application->id);
        $currentUpdatedDetail = $applicationDetail->updated_at;

        $applicationDetail->description = $request->input('description');
        $applicationDetail->years_in_city = $request->input('years_in_city');
        $applicationDetail->family_income =$request->input('family_income');
        $applicationDetail->educational_attainment = $request->input('educational_attainment');
        $applicationDetail->gwa = $request->input('gwa');
        $applicationDetail->nationality = $request->input('nationality');
        $applicationDetail->city = $request->input('city');
        $applicationDetail->registered_voter = $request->input('registered_voter');
        $applicationDetail->save();

        if($currentUpdatedApplication != $application->updated_at){
            return back()->with('success', 'Application updated successfully!');
        }

        if($currentUpdatedDetail != $applicationDetail->updated_at){
            return back()->with('success', 'Application updated successfully!');
        }

        return back();
    }

    /**
     * Update the files application form
     */
    public function applicationFilesUpdate(Request $request, Application $application)
    {

        $formFields = [

            'documentary_requirement' => '',
            'application_form' => ''
        ];

        if($request->hasFile('documentary_requirement')){
            $temp = $request->validate(['documentary_requirement' => 'mimes:pdf']);
            if($temp){

                $formFields['documentary_requirement'] = $request
                ->file('documentary_requirement')
                ->store('files', 'public');
            }
        }

        if($request->hasFile('application_form')){
            $temp = $request->validate(['application_form' => 'mimes:pdf']);
            if($temp){

                $formFields['application_form'] = $request
                ->file('application_form')
                ->store('files', 'public');
            }
        }

        /*
        *  Validation if there are changes in Application's file
        *  and if there are no changes, it cannot update.
        */
        $applicationFiles = ApplicationDetail::find($application->id);
        $currentUpdated = $applicationFiles->updated_at; // Getting the current updated date of application detail

        $applicationFiles->documentary_requirement = $formFields['documentary_requirement'] != '' ? $formFields['documentary_requirement'] : $applicationFiles->documentary_requirement;
        $applicationFiles->application_form = $formFields['application_form'] != '' ? $formFields['application_form'] : $applicationFiles->application_form;
        $applicationFiles->save();

        if($applicationFiles->updated_at != $currentUpdated){
            return back()->with('success', 'Files updated successfully!');
        }
        return back();
    }

    // Submissions
    public function submissions(Application $application)
    {

        $applicantList = ApplicantList::
            leftJoin('applicants', 'applicants.id' , '=', 'applicant_lists.applicants_id')
            ->where('applications_id', $application->id)
            ->where('review', null)
            ->filter(request(['search']))
            ->orderBy('applicant_lists.created_at','desc')
            ->paginate(10);

        return view('coordinator.submission', [
            'applicantList' => $applicantList,
            'application' => $application
        ]);
    }

    /**
     * Listing Applicant if Qualified or Rejected
     */
    public function listingApplicant(Request $request, Application $application)
    {

        /**
         * Input has sent through checkboxes
         */
        if ($request->input('applicant')) {
            switch ($request->input('action')) {
                case 'qualified':

                    foreach ($request->input('applicant') as $applicantID) {

                        $applicant = ApplicantList::where(['applicants_id' => $applicantID,
                        'applications_id' => $application->id])->first();
                        $document = $applicant->document;

                        /** Getting the current count of qualified applicants, for validating the slots */
                        $qualifiedApplicantCount = QualifiedApplicant::where('applications_id', $application->id)->get()->count();

                        // Validating if there is slot available
                        if($qualifiedApplicantCount < $application->slots){
                            $applicant = [
                                'applications_id' => $application->id,
                                'applicants_id' => $applicantID,
                                'document' => $document,
                                'added' => auth()->user()->username
                            ];

                            // Adding to Qualified Applicant
                            QualifiedApplicant::create($applicant);

                            // Setting the applicant review to Yes
                            ApplicantList::where('applicants_id', $applicantID)->update([

                                'review' => 'Yes'
                            ]);

                        }else{

                            return back()->with('error', 'No more slots available!');
                        }

                    }
                    return back()->with('success', 'Added to qualified successfully!');

                    break;

                case 'rejected':

                    foreach ($request->input('applicant') as $applicantID) {

                        $applicant = ApplicantList::where(['applicants_id' => $applicantID,
                        'applications_id' => $application->id])->first();
                        $document = $applicant->document;

                        $applicant = [
                            'applications_id' => $application->id,
                            'applicants_id' => $applicantID,
                            'document' => $document,
                            'added' => auth()->user()->username

                            ];

                        RejectedApplicant::create($applicant);

                        // Setting the applicant review to Yes
                        ApplicantList::where('applicants_id', $applicantID)->update([

                            'review' => 'Yes'
                        ]);
                    }
                    return back()->with('success', 'Added to rejected successfully!');

                    break;
            }
        } else {
            return Redirect::back()->with('error', 'No applicants selected!');
            // return back()->with('error', 'No applicants selected!');
        }
    }

    /**
     * Qualified Applicant Table
     */
    public function qualifiedApplicant()
    {
        /**
         * Retrieving the list of applications in QualifiedApplicants table
         * and filter it with unique applications_id, to avoid duplications
         */
        return view('coordinator.qualified_applicant',[
            'qualifiedApplicant' => QualifiedApplicant::distinct(['applications_id'])
            ->orderBy('created_at','desc')
            ->paginate(10)
        ]);

    }

    /**
     * Qualified Applicant List Table
     */
    public function qualifiedApplicantList(Application $application){

        // Getting all qualified applicants and fetching data for search query
        $qualifiedApplicantList = QualifiedApplicant::
                leftJoin('applicants', 'applicants.id' , '=', 'qualified_applicants.applicants_id')
                ->where('applications_id', $application->id)->filter(request(['search']))
                ->orderBy('qualified_applicants.created_at','desc')
                ->paginate(10);

        return view('coordinator.qualified_applicant_list',[
            'qualifiedApplicantList' => $qualifiedApplicantList,
            'application' => $application
        ]);
    }

    /**
     * Rejected Applicant Table
     */
    public function rejectedApplicant()
    {

        return view('coordinator.rejected_applicant',[
            'rejectedApplicant' => RejectedApplicant::distinct(['applications_id'])
            ->orderBy('created_at','desc')
            ->paginate(10)
        ]);
    }

    /**
     * Qualified Applicant List Table
     */
    public function rejectedApplicantList(Application $application){

        $rejectedApplicantList = RejectedApplicant::
                leftJoin('applicants', 'applicants.id' , '=', 'rejected_applicants.applicants_id')
                ->where('applications_id', $application->id)->filter(request(['search']))
                ->orderBy('rejected_applicants.created_at','desc')
                ->paginate(10);

        return view('coordinator.rejected_applicant_list',[
            'rejectedApplicantList' => $rejectedApplicantList,
            'application' => $application
        ]);
    }

    /**
     * Send Notification to Qualified Applicant List
     */
    public function qualifiedApplicantNotification(Request $request, Application $application){

        $formFields = [
            'title'=> $request->title,
            'message' => $request->message
        ];

        /**  Get all applicants that belongs to qualified table
         *   according to the current application id
         */
        $qualifiedApplicantList = QualifiedApplicant::where(
            'applications_id', $application->id)->latest()->get();

        /**
         * Looping through Applicant table that is match in qualified
         * applicant list, and store it to an array
         */
        $applicantList = array();
        foreach($qualifiedApplicantList as $qualifiedApplicantLists){

            $applicantList[] = Applicant::where('id', $qualifiedApplicantLists->applicants_id)->first();
        }

        /**
         * Looping through applicant list and store their users_id
         * to an array
         */
        $applicantsListID = array();
        foreach($applicantList as $applicantLists){
            $applicantsListID[] = $applicantLists->users_id;
        }

        /**
         * Getting all the users from Users table and looping on it.
         * Whenever the current users->id is in array of applicantListID
         * it stores it in another array which is applicantNotif.
         */
        $user = User::get();
        $applicantNotif = array();
        foreach($user as $users){

            if(in_array($users->id, $applicantsListID)){

                $applicantNotif[] = $users->id;
            }
        }

        /**
         * Retreiving users that has an ID belongs to
         * applicantNotifs array
         */
        $users = array();
        foreach($applicantNotif as $applicantNotifs){

            $users[] = User::where('id', $applicantNotifs)->first();
        }

        Notification::send($users, new ApplicantNotification($formFields['title'], $formFields['message'] ));

        return back()->with('success', 'Announcement sent successfully!');

    }

    /**
     * Send Notification to Rejected Applicant List
     */
    public function rejectedApplicantNotification(Request $request, Application $application){

        $formFields = [
            'title'=> $request->title,
            'message' => $request->message
        ];

        /**  Get all applicants that belongs to rejected table
         *   according to the current application id
         */
        $rejectedApplicantList = RejectedApplicant::where('applications_id', $application->id)
        ->latest()->get();

        /**
         * Looping through Applicant table that is match in rejected
         * applicant list, and store it to an array
         */
        $applicantList = array();
        foreach($rejectedApplicantList as $rejectedApplicantLists){

            $applicantList[] = Applicant::where('id', $rejectedApplicantLists->applicants_id)->first();
        }

        /**
         * Looping through applicant list and store their users_id
         * to an array
         */
        $applicantsListID = array();
        foreach($applicantList as $applicantLists){
            $applicantsListID[] = $applicantLists->users_id;
        }

        /**
         * Getting all the users from Users table and looping on it.
         * Whenever the current users->id is in array of applicantListID
         * it stores it in another array which is applicantNotif.
         */
        $user = User::get();
        $applicantNotif = array();
        foreach($user as $users){

            if(in_array($users->id, $applicantsListID)){

                $applicantNotif[] = $users->id;
            }
        }

        /**
         * Retreiving users that has an ID belongs to
         * applicantNotifs array
         */
        $users = array();
        foreach($applicantNotif as $applicantNotifs){

            $users[] = User::where('id', $applicantNotifs)->first();
        }

        Notification::send($users, new ApplicantNotification($formFields['title'], $formFields['message'] ));

        return back()->with('success', 'Announcement sent successfully!');

    }
}
