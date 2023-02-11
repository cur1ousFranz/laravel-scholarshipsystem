<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Coordinator;
use Illuminate\Http\Request;
use App\Models\ApplicationDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Coordinator\StoreApplicationRequest;

class ScholarshipApplicationController extends Controller
{
    public function create()
    {
        $family_incomes = DB::table('family_incomes')->first();
        return view('coordinator.create_application', [
            'family_incomes' => $family_incomes
        ]);
    }

    public function store(StoreApplicationRequest $request)
    {
        $formFields = $request->validated();

        // $reqPath = $formFields['documentary_requirement']->store('documentary_requirement', 's3');
        // $appPath = $formFields['application_form']->store('application_form', 's3');

        // $formFields['documentary_requirement'] = Storage::disk('s3')->url($reqPath);
        // $formFields['application_form'] = Storage::disk('s3')->url($appPath);

        $coordinator = Coordinator::where('users_id', Auth::user()->id)->first();
        $application = Application::create([
            'coordinators_id' => $coordinator->id,
            'slots' => $formFields['slots'],
            'start_date' => request('start_date'),
            'end_date' => $formFields['end_date'],
            'batch' => $formFields['batch'],
            'status' => "On-going"
        ]);

        $application->applicationDetail()->create([

            'description' => $formFields['description'],
            'documentary_requirement' => $formFields['documentary_requirement'],
            'application_form' => $formFields['application_form']
            // 'documentary_requirement' => '',
            // 'application_form' => ''

        ]);

        return redirect('/applications')->with('success', 'Application created successfully!');
    }

    public function edit(Application $application)
    {
        $family_incomes = DB::table('family_incomes')->first();
        return view('coordinator.edit_application', [
            'application' => $application,
            'family_incomes' => $family_incomes
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

                $reqPath = $request->file('documentary_requirement')->store('documentary_requirement', 's3');
                $formFields['documentary_requirement'] = Storage::disk('s3')->url($reqPath);
            }
        }

        if($request->hasFile('application_form')){
            $temp = $request->validate(['application_form' => 'mimes:pdf']);
            if($temp){

                $appPath = $request->file('application_form')->store('application_form', 's3');
                $formFields['application_form'] = Storage::disk('s3')->url($appPath);
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
