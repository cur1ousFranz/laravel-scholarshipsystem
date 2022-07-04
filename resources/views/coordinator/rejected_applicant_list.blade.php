<x-navbar>
    <x-layout>
        <div class="d-flex justify-content-between">
            <h4 class="mt-3">Rejected Applicant List</h4>
            <div class="d-flex">
                <div>
                    @if (!$rejectedApplicantList->isEmpty())
                        <span data-bs-toggle="tooltip" data-bs-placement="left" title="Send Announcement">
                            <button class="btn btn-outline-success me-1 shadow-sm" data-bs-toggle="modal" data-bs-target="#message">
                                <i class="bi bi-envelope-plus-fill"></i>
                            </button>
                        </span>
                    @else
                        <span data-bs-toggle="tooltip" data-bs-placement="left" title="Send Announcement">
                            <button class="btn btn-outline-success me-1 shadow-sm" disabled>
                                <i class="bi bi-envelope-plus-fill"></i>
                            </button>
                        </span>
                    @endif

                    <span data-bs-toggle="tooltip" data-bs-placement="left" title="Show All Applicants">
                        <a href="/applicants/rejected/list/{{ $application->id }}" class="btn btn-outline-warning me-2">
                            <i class="bi bi-arrow-up-square-fill"></i>
                        </a>
                    </span>

                    {{-- MESSAGE MODAL --}}
                    <div class="modal fade" id="message">
                        <div class="modal-dialog modal-lg modal-dialog-centered text-center">
                            <div class="modal-content border border-danger">
                                <div class="modal-header d-flex justify-content-center">
                                    <h4 class="modal-title">Create Announcement</h4>
                                </div>
                                <form action="/applicants/rejected/message/{{ $application->id }}" method="POST">
                                    @csrf

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="text-start">
                                                    <label for="title">
                                                        <h6>Title</h6>
                                                    </label>
                                                    <input class="form-control shadow-sm" type="text" id="title"
                                                        name="title" value="{{ old('title') }}" maxlength="20">
                                                </div>
                                            </div>
                                            <div class="col-6"></div>
                                        </div>
                                        <div class="text-start mt-2">
                                            <label for="message">
                                                <h6>Message</h6>
                                            </label>
                                            <textarea class="form-control shadow-sm" name="message" id="editor"></textarea>
                                        </div>
                                    </div>
                                    <div class="text-start ms-3 text-muted">
                                        <p>Note: This announcement will automatically send to all rejected applicants in this batch through notification.</p>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-end">
                                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                                            Cancel
                                        </button>
                                        <button type="submit" class="btn btn-outline-primary">
                                            Send
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <form action="">
                    <div class="input-group">
                        <div class="form-outline">
                            <input type="search" id="form1" class="form-control shadow-sm" name="search"/>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>

            </div>
        </div>
        <div class="scroll2 shadow-sm">
            <table class="table table-striped table-bordered">
                <thead class="text-center text-dark" id="applicantListHeader">
                    <tr>
                        <th scope="col" class="bg-light">Document</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Middle Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Civil Status</th>

                        <th scope="col">Street</th>
                        <th scope="col">Barangay</th>
                        <th scope="col">City</th>
                        <th scope="col">Province</th>
                        <th scope="col">Region</th>
                        <th scope="col">Zipcode</th>

                        <th scope="col">Contact Number</th>
                        <th scope="col">Contact Email</th>

                        <th scope="col">Desired School</th>
                        <th scope="col">Course</th>
                        <th scope="col">HEI Type</th>
                        <th scope="col">School Last Attended</th>

                        <th scope="col">Nationality</th>
                        <th scope="col">Educational Attainment</th>
                        <th scope="col">No. Years in City</th>
                        <th scope="col">Family Income</th>
                        <th scope="col">Registered Voter</th>
                        <th scope="col">GWA</th>

                    </tr>
                </thead>
                {{-- RETRIEVING APPLICANT DATA ACCORDING TO ITS CURRENT ID IN LOOP --}}
                <tbody class="text-center" id="applicantListHeader">
                    <?php

                    if(!$rejectedApplicantList->isEmpty()){

                        foreach($rejectedApplicantList as $rejectedApplicantLists){
                            $applicant = Illuminate\Support\Facades\DB::table('applicants')
                                ->where('id', $rejectedApplicantLists->applicants_id)
                                ->first();

                            $address = Illuminate\Support\Facades\DB::table('addresses')
                            ->where('applicants_id', $rejectedApplicantLists->applicants_id)
                            ->first();

                            $school = Illuminate\Support\Facades\DB::table('schools')
                            ->where('applicants_id', $rejectedApplicantLists->applicants_id)
                            ->first();

                            $contact = Illuminate\Support\Facades\DB::table('contacts')
                            ->where('applicants_id', $rejectedApplicantLists->applicants_id)
                            ->first();

                            ?>
                    <tr>
                        <td>
                            <a class="text-decoration-none" href="/storage/{{ $rejectedApplicantLists->document }}"
                                target="_blank">View</a>
                        </td>
                        <td>{{ $applicant->first_name }}</td>
                        <td>{{ $applicant->middle_name }}</td>
                        <td>{{ $applicant->last_name }}</td>
                        <td>{{ $applicant->age }}</td>
                        <td>{{ $applicant->gender }}</td>
                        <td>{{ $applicant->civil_status }}</td>
                        <td>{{ $address->street }}</td>
                        <td>{{ $address->barangay }}</td>
                        <td>{{ $address->city }}</td>
                        <td>{{ $address->province }}</td>
                        <td>{{ $address->region }}</td>
                        <td>{{ $address->zipcode }}</td>
                        <td>{{ $contact->contact_number }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $school->desired_school }}</td>
                        <td>{{ $school->course_name }}</td>
                        <td>{{ $school->hei_type }}</td>
                        <td>{{ $school->school_last_attended }}</td>
                        <td>{{ $applicant->nationality }}</td>
                        <td>{{ $applicant->educational_attainment }}</td>
                        <td>{{ $applicant->years_in_city }}</td>
                        <td>{{ $applicant->family_income }}</td>
                        <td>{{ $applicant->registered_voter }}</td>
                        <td>{{ $applicant->gwa }}</td>
                    </tr>
                    <?php

                        }

                    }   else{

                        ?>
                    <tr>
                        <td colspan="25">No submissions yet</td>
                    </tr>
                    <?php

                        }
                    ?>
                </tbody>
            </table>
            </form>
        </div>
        <div class="container mt-3">
            {{ $rejectedApplicantList->links('pagination::bootstrap-5') }}
        </div>
    </x-layout>
</x-navbar>
<x-footer/>
