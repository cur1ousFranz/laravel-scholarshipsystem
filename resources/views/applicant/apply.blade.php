<x-navbar>
    <section>
        <x-layout>
            <div class="card shadow-sm" style="margin-top: 110px">
                <div class="card-body border-top border-bottom border-bottom-4 border-top-4 border-primary">
                    <div class="container text-center">
                        <h4>Apply Edukar Scholarship</h4>
                        <hr>
                    </div>
                    <div class="container mt-4 mb-4">
                        <div class="container">
                            <h4 class="mb-4">Description</h4>
                            {{-- DECODING THE HTML TAGS FROM DATABASE --}}
                            {!! $applicationDetail->description !!}
                        </div>
                        <hr class="mt-5">
                    </div>
                    <div class="container">
                        <h4>How to Apply</h4>
                        <div class="row mt-4">
                            <div class="col-md-10">
                                <h5>1. Complete your profile to be able to proceed.</h5>
                            </div>
                            <div class="col-2 d-flex align-items-center justify-content-center">

                                @if (Auth::user())
                                    @if ($applicant->first_name != null)
                                        <button class="btn btn-outline-success shadow-sm">
                                            &nbsp;&nbsp;&nbsp;Set&nbsp;<i class="bi bi-check2-circle mt-5"></i>
                                            &nbsp;&nbsp;
                                        </button>
                                    @else
                                        <button class="btn btn-outline-danger shadow-sm" disabled>Not Set</button>
                                    @endif
                                @else
                                    <button class="btn btn-outline-primary shadow-sm" disabled>Not Set</button>
                                @endif

                            </div>
                        </div>
                        <hr>

                        <div class="row mt-4">
                            <div class="col-md-10">
                                <h5>2. Documentary Requirements</h5>
                                <p>
                                    Download or View the pdf file of complete list of requirements. Make sure to READ
                                    and UNDERSTAND each requirement needed to avoid delay and denial of application.
                                    Each requirement has corresponding description eg. Only Certified True Copy with
                                    school seal is needed, Photocopy only of PSA Authenticated BC is needed, etc.
                                </p>
                            </div>
                            <div class="col-2 d-flex align-items-center justify-content-center">
                                <a href="/storage/{{ $applicationDetail->documentary_requirement }}"
                                    class="btn btn-outline-success" target="_blank">&nbsp;View&nbsp;<i class="bi bi-filetype-pdf"></i></a>
                            </div>
                        </div>
                        <hr>

                        <div class="row mt-4">
                            <div class="col-md-10">
                                <h5>3. Application Form</h5>
                                <p>
                                    Please download the application form. Print it in long bond paper (8.5x13 inches)
                                    and fill out legibly all the needed information. All blank spaces MUST be filled
                                    with “N/A”. In the back portion of the form, paste your passport size ID (with name
                                    and signature), fill out the CTC Number and Place of Issue (refer to your CTC or
                                    Cedula) and lastly, don’t forget to affix your thumb mark.

                                </p>
                            </div>
                            <div class="col-2 d-flex align-items-center justify-content-center">
                                <a href="/storage/{{ $applicationDetail->application_form }}" class="btn btn-outline-success"
                                    target="_blank">&nbsp;View&nbsp;<i class="bi bi-filetype-pdf"></i></a>
                            </div>
                        </div>
                        <hr>

                        <div class="row mt-4">
                            <div class="col-md-10">
                                <h5>4. Submission</h5>
                                <p>
                                    Once you have already completed/secured all the requirements, scan the documents IN
                                    ORDER and save it as one PDF File (not individually). Rename the file to (SURNAME,
                                    FIRST NAME.pdf). Click the button to submit your PDF File.<br>Note: ONLY COMPLETE
                                    DOCUMENTS WILL BE ACCEPTED
                                </p>
                            </div>
                            <div class="col-2 d-flex align-items-center justify-content-center">
                                {{-- CHECKING IF THE USER IS ALREADY APPLIED TO CURRENT APPLICATION.
                                    IT WILL DISABLE THE UPLOAD BUTTON IF ITS TRUE --}}
                                <?php
                                    if ($application) {
                                        $isApplied = false;

                                        // Validating if applicant is exist in ApplicantList
                                        $applicantList = App\Models\ApplicantList::where([
                                            'applications_id' => $application->id,
                                            'applicants_id' => $applicant->id
                                        ])->exists();

                                        // Validating if applicant is exist in QualifiedApplicant list
                                        $qualifiedList = App\Models\QualifiedApplicant::where([
                                            'applications_id' => $application->id,
                                            'applicants_id' => $applicant->id
                                        ])->exists();

                                        // Validating if applicant is exist in RejectedApplicant list
                                        $rejectedList = App\Models\RejectedApplicant::where([
                                            'applications_id' => $application->id,
                                            'applicants_id' => $applicant->id
                                        ])->exists();


                                        if($applicantList || $qualifiedList || $rejectedList){

                                            $isApplied = true;
                                        }

                                        if ($isApplied) {
                                            ?>
                                                <button class="btn btn-outline-success" disabled>
                                                    Upload&nbsp;<i class="bi bi-filetype-pdf"></i>
                                                </button>
                                            <?php
                                        }else {

                                            if ($applicant->first_name != null) {
                                                ?>
                                                    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#uploadFile">
                                                        Upload&nbsp;<i class="bi bi-filetype-pdf"></i>
                                                    </button>
                                                <?php
                                            }else{
                                                ?>
                                                    <button class="btn btn-outline-success" disabled>
                                                        Upload&nbsp;<i class="bi bi-filetype-pdf"></i>
                                                    </button>
                                                <?php
                                            }

                                        }

                                    // Optional if the user manipulates the inspect element
                                    } else {
                                        ?>
                                            <button class="btn btn-outline-success" disabled>
                                                Upload&nbsp;<i class="bi bi-filetype-pdf"></i>
                                            </button>
                                        <?php
                                    }

                                ?>

                                <!-- Modal -->
                                <div class="modal fade" id="uploadFile">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content border-top border-bottom border-1 border-primary">
                                            <div class="modal-header">
                                                <div class="container text-center">
                                                    <h4 class="">Upload File</h4>
                                                </div>
                                            </div>
                                            <form action="/submissions/{{ $application->id }}" method="POST"
                                                enctype="multipart/form-data">

                                                @csrf
                                                <div class="modal-body">

                                                    <h6>Note: You may only submit once, make sure you uploaded the right
                                                        file. <br> File should be pdf format.</h6>
                                                    <input type="file" class="form-control mt-4 mb-4"
                                                        name="document">

                                                    @error('document')
                                                        @php
                                                            back()->with('error', 'File not submitted!');
                                                        @endphp
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror

                                                </div>
                                                <div class="modal-footer d-flex justify-content-center">
                                                    <button type="button" class="btn btn-outline-danger"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit"
                                                        class="btn btn-outline-success">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <hr>

                    </div>
                </div>
            </div>

        </x-layout>
    </section>
</x-navbar>
