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
     * Registration form of Coordinator
     */
    public function createForm()
    {

        return view('coordinator.create_account');
    }

    /**
     * Create Account of Coordinator
     */
    public function createAccount(Request $request)
    {
        $formFields = $request->validate([

            'username' => ['required', Rule::unique('users', 'username')],
            'password' => ['required', 'confirmed'],
            'code' => 'required'
        ]);

        $formFields['password'] = bcrypt($formFields['password']);
        if ($formFields['code'] == 9999) {
            $user = User::create([

                'username' => $formFields['username'],
                'password' => $formFields['password'],
                'role' => 'coordinator'
            ]);

            Coordinator::create([

                'users_id' => $user->id
            ]);

            return back()->with('success', 'Created account successfully!');
        } else {
            return back()->withErrors(['username' => 'Invalid, please contact the administrator.'])->onlyInput('username');
        }
    }

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
         * Fetching total applicants who registered in the system.
         * Fetching total application created.
         * Fetching total submissions that have been made.
         */
        $totalApplicants = Applicant::get();
        $totalApplications = Application::get();
        $totalSubmissions = ApplicantList::get();

        return view('coordinator.dashboard',[
            'appliedApplicantYears' => $appliedApplicantYears,
            'appliedApplicantYearCount' => $appliedApplicantYearCount,

            'qualifiedApplicantYears' => $qualifiedApplicantYears,
            'qualifiedApplicantYearCount' => $qualifiedApplicantYearCount,

            'totalApplicants' => $totalApplicants,
            'totalApplications' => $totalApplications,
            'totalSubmissions' => $totalSubmissions
        ]);
    }


    /**
     * Application Page
     */
    public function application()
    {

        $application = Application::latest()->paginate(10);

        return view('coordinator.application', [
            'application' => $application
        ]);
    }

    /**
     * Application Form
     */
    public function applicationCreate()
    {

        return view('coordinator.create_application');
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

        $formFields['documentary_requirement'] = $request->file('documentary_requirement')->store('files', 'public');
        $formFields['application_form'] = $request->file('application_form')->store('files', 'public');

        $coordinatorID = DB::table('coordinators')->where('users_id', Auth::user()->id)->first();
        $formFields['coordinators_id'] = $coordinatorID->id;
        $formFields['status'] = "On-going";

        $application = Application::create([
            'coordinators_id' => $formFields['coordinators_id'],
            'slots' => $formFields['slots'],
            'start_date' => $formFields['start_date'],
            'end_date' => $formFields['end_date'],
            'batch' => $formFields['batch'],
            'status' => $formFields['status']
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
     * Show to edit of application form
     */
    public function applicationEdit(Application $application)
    {

        return view('coordinator.edit_application', [
            'application' => $application

        ]);
    }

    /**
     * Update the details application form
     */
    public function applicationDetailsUpdate(Request $request, Application $application)
    {

        $formFields = $request->validate([
            'slots' => 'required',
            'end_date' => 'required',
            'batch' => 'required',

            'description' => 'required',
            'years_in_city' => 'required',
            'family_income' => 'required',
            'educational_attainment' => 'required',
            'gwa' => 'required',
            'nationality' => 'required',
            'city' => 'required',
            'registered_voter' => 'required'
        ]);

        $application->update([
            'slots' => $formFields['slots'],
            'end_date' => $formFields['end_date'],
            'batch' => $formFields['batch']
        ]);

        ApplicationDetail::where('applications_id', $application->id)->update([

            'description' => $formFields['description'],
            'years_in_city' => $formFields['years_in_city'],
            'family_income' => $formFields['family_income'],
            'educational_attainment' => $formFields['educational_attainment'],
            'gwa' => $formFields['gwa'],
            'nationality' => $formFields['nationality'],
            'city' => $formFields['city'],
            'registered_voter' => $formFields['registered_voter']
        ]);

        return back();
    }

    /**
     * Update the files application form
     */
    public function applicationFilesUpdate(Request $request, Application $application)
    {

        $formFields = $request->validate([

            'documentary_requirement' => ['sometimes', 'mimes:pdf'],
            'application_form' => ['sometimes', 'mimes:pdf']
        ]);

        $formFields['documentary_requirement'] = $request->file('documentary_requirement')->store('files', 'public');
        $formFields['application_form'] = $request->file('application_form')->store('files', 'public');

        ApplicationDetail::where('applications_id', $application->id)->update([

            'documentary_requirement' => $formFields['documentary_requirement'],
            'application_form' => $formFields['application_form']
        ]);

        return back();
    }

    // Submissions
    public function submissions(Application $application)
    {

        $applicantList = ApplicantList::
            leftJoin('applicants', 'applicants.id' , '=', 'applicant_lists.applicants_id')
            ->where('applications_id', $application->id)->filter(request(['search']))
            ->paginate(10);

        return view('coordinator.submission', [
            'applicantList' => $applicantList,
            'application' => $application
        ]);
    }

    // Submission Store
    public function submissionStore(Request $request, Application $application)
    {

        $formFields = $request->validate([

            'document' => ['required', 'mimes:pdf']
        ]);

        $applicant = Applicant::where('users_id', Auth::user()->id)->first();

        $formFields['document'] = $request->file('document')->store('submissions', 'public');
        $formFields['applications_id'] = $application->id;
        $formFields['applicants_id'] = $applicant->id;

        /**
         * This is for second validation which avoid the
         * user manipulation using the inspect element
         */

        // Validating if applicant is exist in ApplicantList
        $applicantList = ApplicantList::where([
            'applications_id' => $application->id,
            'applicants_id' => $applicant->id
        ])->exists();

        // Validating if applicant is exist in QualifiedApplicant list
        $qualifiedList = QualifiedApplicant::where([
            'applications_id' => $application->id,
            'applicants_id' => $applicant->id
        ])->exists();

        // Validating if applicant is exist in RejectedApplicant list
        $rejectedList = RejectedApplicant::where([
            'applications_id' => $application->id,
            'applicants_id' => $applicant->id
        ])->exists();

        if ($applicantList || $applicant->first_name == null || $qualifiedList || $rejectedList) {
            abort('403', 'Unauthorized Action');
        } else {

            ApplicantList::create($formFields);

            return back()->with('success', 'Application submitted successfully!');
        }
    }

    /**
     * Listing Applicant if Qualified or Rejected
     */
    public function listingApplicant(Request $request, Application $application)
    {

        /**
         * Input has send through checkboxes
         */
        if ($request->input('applicant')) {
            switch ($request->input('action')) {
                case 'qualified':

                    foreach ($request->input('applicant') as $applicantID) {

                        $applicant = ApplicantList::where('applicants_id', $applicantID)->first();
                        $document = $applicant->document;

                        /** Getting the current count of qualified applicants, for validating the slots */
                        $qualifiedApplicantCount = QualifiedApplicant::where('applications_id', $application->id)->get()->count();

                        // Validating if there is slot available
                        if($qualifiedApplicantCount < $application->slots){
                            $applicant = [
                                'applications_id' => $application->id,
                                'applicants_id' => $applicantID,
                                'document' => $document
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

                        $applicant = ['applications_id' => $application->id, 'applicants_id' => $applicantID];

                        RejectedApplicant::create([
                            'applications_id' => $application->id,
                            'applicants_id' => $applicantID
                        ]);

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
        $qualifiedApplicant = QualifiedApplicant::latest()->paginate(10);

        return view('coordinator.qualified_applicant',[
            'qualifiedApplicant' => $qualifiedApplicant
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
                ->paginate(10);

        // QualifiedApplicant::where(
        //     'applications_id', $application->id)->latest()->filter(request(['search']))->paginate(10);

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

        $rejectedApplicant = RejectedApplicant::latest()->paginate(10);

        return view('coordinator.rejected_applicant',[
            'rejectedApplicant' => $rejectedApplicant
        ]);
    }

    /**
     * Qualified Applicant List Table
     */
    public function rejectedApplicantList(Application $application){

        $rejectedApplicantList = RejectedApplicant::
                leftJoin('applicants', 'applicants.id' , '=', 'rejected_applicants.applicants_id')
                ->where('applications_id', $application->id)->filter(request(['search']))
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
         *
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
        $rejectedApplicantList = RejectedApplicant::where(
            'applications_id', $application->id)->latest()->get();


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
         *
         */
        $users = array();
        foreach($applicantNotif as $applicantNotifs){

            $users[] = User::where('id', $applicantNotifs)->first();
        }

        Notification::send($users, new ApplicantNotification($formFields['title'], $formFields['message'] ));

        return back()->with('success', 'Announcement sent successfully!');

    }
}
