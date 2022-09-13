<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\ApplicationDetail;
use App\Models\Coordinator;
use Illuminate\Support\Facades\Auth;

class ScholarshipApplicationController extends Controller
{
    public function create(){

        return view('coordinator.create_application');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'slots' => 'required',
            'batch' => 'required',
            'end_date' => 'required',
            'description' => 'required',
            'documentary_requirement' => ['required', 'mimes:pdf'],
            'application_form' => ['required', 'mimes:pdf']
        ]);

        $formFields['documentary_requirement'] = $request->file('documentary_requirement')->store('application_files', 'public');
        $formFields['application_form'] = $request->file('application_form')->store('application_files', 'public');

        $coordinatorID = Coordinator::where('users_id', Auth::user()->id)->first();

        $application = Application::create([
            'coordinators_id' => $coordinatorID->id,
            'slots' => $formFields['slots'],
            'start_date' => request('start_date'),
            'end_date' => $formFields['end_date'],
            'batch' => $formFields['batch'],
            'status' => "On-going"
        ]);

        ApplicationDetail::create([

            'applications_id' => $application->id,
            'description' => $formFields['description'],
            'years_in_city' => $request->years_in_city,
            'family_income' => $request->family_income,
            'educational_attainment' => $request->educational_attainment,
            'gwa' => $request->gwa,
            'nationality' => $request->nationality,
            'city' => $request->city,
            'registered_voter' => $request->registered_voter,
            'documentary_requirement' => $formFields['documentary_requirement'],
            'application_form' => $formFields['application_form']

        ]);

        return redirect('/applications')->with('success', 'Application created successfully!');
    }

    public function edit(Application $application){

        return view('coordinator.edit_application', [
            'application' => $application
        ]);
    }

    public function updateDetails(Request $request, Application $application)
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

    public function updateFiles(Request $request, Application $application)
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
}
