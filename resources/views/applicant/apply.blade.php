<x-navbar>
    <x-layout class="h-100">

        <div class="container mb-5">
            <div class="card">
                <div class="card-body">
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
                            <div class="col-10">
                                <h5>1. Click “Apply” for the pre-registration</h5>
                                <p>
                                    Make sure that you have completed setting up your profile to be able to proceed.
                                </p>
                            </div>
                            <div class="col-2 d-flex align-items-center justify-content-center">
                                <button class="btn btn-primary">Apply</button>
                            </div>
                        </div>
                        <hr>

                        <div class="row mt-4">
                            <div class="col-10">
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
                                    class="btn btn-primary" target="_blank">&nbsp;View&nbsp;</a>
                            </div>
                        </div>
                        <hr>

                        <div class="row mt-4">
                            <div class="col-10">
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
                                <a href="/storage/{{ $applicationDetail->application_form }}" class="btn btn-primary"
                                    target="_blank">&nbsp;View&nbsp;</a>
                            </div>
                        </div>
                        <hr>

                        <div class="row mt-4">
                            <div class="col-10">
                                <h5>4. Submission</h5>
                                <p>
                                    Once you have already completed/secured all the requirements, scan the documents IN
                                    ORDER and save it as one PDF File (not individually). Rename the file to (SURNAME,
                                    FIRST NAME.pdf). Click the button to submit your PDF File.<br>Note: ONLY COMPLETE
                                    DOCUMENTS WILL BE ACCEPTED
                                </p>
                            </div>
                            <div class="col-2 d-flex align-items-center justify-content-center">
                                <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Upload</button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="container text-center">
                                                    <h4 class="">Upload File</h4>
                                                </div>
                                            </div>
                                            <form action="/submissions/{{ $application->id }}" method="POST" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    @csrf

                                                    <h6>Note: You may only submit once, make sure you uploaded the right
                                                        file. <br> File should be pdf format.</h6>
                                                    <input type="file" class="form-control mt-4 mb-4"
                                                        name="document">

                                                    @error('document')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror

                                                </div>
                                                <div class="modal-footer d-flex justify-content-center">
                                                    <button type="button" class="btn btn-outline-danger"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit"
                                                        class="btn btn-outline-primary">Submit</button>
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
        </div>

    </x-layout>
</x-navbar>
