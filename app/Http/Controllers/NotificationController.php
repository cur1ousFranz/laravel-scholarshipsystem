<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function index()
    {
        $notifications = auth()->user()->notifications;
        return view('applicant.notifications', compact('notifications'));
    }

    public function show(Request $request){

        $notification = DB::table('notifications')
                        ->where('id', $request->route('notification'))
                        ->first();
        if($notification) {
            return view('applicant.notification',[
                'notification' => $notification
            ]);
        }

        return view('page-not-found');
    }

    
    protected function sendMail($title, $body, $applicants)
    {
        $data = array('body' => $body);
        foreach($applicants as $applicant){

            Mail::send('email.email-content', $data, function($message) use ($applicant, $title){

                $message->to($applicant->first()->contact->email)->subject($title);
            });
        }

    }

    public function storeQualified(Request $request, Application $application)
    {
        $formFields = $request->validate([
            'title'=> 'required',
            'message' => 'required',
            'coordinator' => 'required',
        ]);

        $qualifiedApplicants = QualifiedApplicant::with('applicant')->where(
            'applications_id', $application->id)->latest()->get();

        $applicants = array();
        foreach($qualifiedApplicants as $list){

            $applicants[] = $list->applicant;
        }

        $applicantsID = array();
        foreach($applicants as $applicant){
            $applicantsID[] = $applicant->first()->users_id;
        }

        $user = User::get();
        $applicantNotif = array();
        foreach($user as $users){

            if(in_array($users->id, $applicantsID)){

                $applicantNotif[] = $users->id;
            }
        }

        $users = array();
        foreach($applicantNotif as $id){

            $users[] = User::where('id', $id)->first();
        }

        Notification::send($users,
        new ApplicantNotification($formFields['title'], $formFields['message'], $formFields['coordinator'] ));

        $this->sendMail($request->title, $request->message, $applicants);

        return back()->with('success', 'Announcement sent successfully!');

    }

    public function storeRejected(Request $request, Application $application)
    {
        $formFields = $request->validate([
            'title'=> 'required',
            'message' => 'required',
            'coordinator' => 'required',
        ]);

        $rejectedApplicantList = RejectedApplicant::where('applications_id', $application->id)
        ->latest()->get();

        $applicants = array();
        foreach($rejectedApplicantList as $list){
            $applicants[] = $list->applicant;
        }

        $applicantsID = array();
        foreach($applicants as $applicant){
            $applicantsID[] = $applicant->first()->users_id;
        }

        $user = User::get();
        $applicantNotif = array();
        foreach($user as $users){

            if(in_array($users->id, $applicantsID)){

                $applicantNotif[] = $users->id;
            }
        }

        $users = array();
        foreach($applicantNotif as $id){

            $users[] = User::where('id', $id)->first();
        }

        Notification::send($users,
        new ApplicantNotification($formFields['title'], $formFields['message'], $formFields['coordinator'] ));

        $this->sendMail($request->title, $request->message, $applicants);

        return back()->with('success', 'Announcement sent successfully!');

    }
}
