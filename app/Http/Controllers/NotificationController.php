<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Applicant;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\RejectedApplicant;
use App\Models\QualifiedApplicant;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Mail;
use App\Notifications\ApplicantNotification;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{

    protected function sendMail($title, $body, $applicants)
    {
        $data = array('body' => $body);

        foreach($applicants as $applicant){

            Mail::send('email.email-content', $data, function($message) use ($applicant, $title){

                $message->to($applicant->contact->email)->subject($title);
            });
        }

    }

    /**
     * Applicant Notification message
     */
    public function show(Request $request){

        $notification = DB::table('notifications')->where('id', $request->route('notification'))->first();
        return view('applicant.notification',[
            'notification' => $notification
        ]);
    }

    /**
     * Send Notification to Qualified Applicant List
     */
    public function storeQualified(Request $request, Application $application){

        $formFields = $request->validate([
            'title'=> 'required',
            'message' => 'required'
        ]);

        /**  Get all applicants that belongs to qualified table
         *   according to the current application id
         */
        $qualifiedApplicants = QualifiedApplicant::where(
            'applications_id', $application->id)->latest()->get();

        /**
         * Looping through Applicant table that is match in qualified
         * applicant list, and store it to an array
         */
        $applicants = array();
        foreach($qualifiedApplicants as $applicant){

            $applicants[] = Applicant::where('id', $applicant->applicants_id)->first();
        }

        /**
         * Looping through applicant list and store their users_id
         * to an array
         */
        $applicantsID = array();
        foreach($applicants as $applicant){
            $applicantsID[] = $applicant->users_id;
        }

        /**
         * Getting all the users from Users table and looping on it.
         * Whenever the current users->id is in array of applicantListID
         * it stores it in another array which is applicantNotif.
         */
        $user = User::get();
        $applicantNotif = array();
        foreach($user as $users){

            if(in_array($users->id, $applicantsID)){

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
        $this->sendMail($request->title, $request->message, $applicants);

        return back()->with('success', 'Announcement sent successfully!');

    }

    /**
     * Send Notification to Rejected Applicant List
     */
    public function storeRejected(Request $request, Application $application){

        $formFields = $request->validate([
            'title'=> 'required',
            'message' => 'required'
        ]);

        /**  Get all applicants that belongs to rejected table
         *   according to the current application id
         */
        $rejectedApplicantList = RejectedApplicant::where('applications_id', $application->id)
        ->latest()->get();

        /**
         * Looping through Applicant table that is match in rejected
         * applicant list, and store it to an array
         */
        $applicants = array();
        foreach($rejectedApplicantList as $rejectedApplicantLists){

            $applicants[] = Applicant::where('id', $rejectedApplicantLists->applicants_id)->first();
        }

        /**
         * Looping through applicant list and store their users_id
         * to an array
         */
        $applicantsID = array();
        foreach($applicants as $applicant){
            $applicantsID[] = $applicant->users_id;
        }

        /**
         * Getting all the users from Users table and looping on it.
         * Whenever the current users->id is in array of applicantListID
         * it stores it in another array which is applicantNotif.
         */
        $user = User::get();
        $applicantNotif = array();
        foreach($user as $users){

            if(in_array($users->id, $applicantsID)){

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
        $this->sendMail($request->title, $request->message, $applicants);

        return back()->with('success', 'Announcement sent successfully!');

    }
}
