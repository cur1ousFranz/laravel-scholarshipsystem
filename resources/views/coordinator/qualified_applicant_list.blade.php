<x-navbar>
    <section>
        <x-layout style="margin-top: 80px">
            <div class="row">
                <div class="col-lg d-flex">
                    <h4 class="mt-2">Qualified Applicant List</h4>
                    <p class="mt-2 ms-3" data-bs-toggle="modal" data-bs-target="#infoModal">
                        <i class="bi bi-info-circle"></i>
                    </p>
                </div>
                <div class="col-lg">
                    <div class="d-flex float-lg-end">
                        <div>
                            @if (!$qualifiedApplicantList->isEmpty())
                                <span data-bs-toggle="tooltip" data-bs-placement="left" title="Send Announcement">
                                    <button class="btn btn-outline-success me-1" data-bs-toggle="modal" data-bs-target="#message">
                                        <i class="bi bi-envelope-plus-fill"></i>
                                    </button>
                                </span>

                            @else
                                <span data-bs-toggle="tooltip" data-bs-placement="left" title="Send Announcement">
                                    <button class="btn btn-outline-success me-1" disabled>
                                        <i class="bi bi-envelope-plus-fill"></i>
                                    </button>
                                </span>

                            @endif

                            {{-- MESSAGE MODAL --}}
                            <div class="modal fade" id="message">
                                <div class="modal-dialog modal-lg modal-dialog-centered text-center">
                                    <div class="modal-content border border-dark">
                                        <div class="modal-header d-flex justify-content-center">
                                            <h4 class="modal-title">Create Announcement</h4>
                                        </div>
                                        <form action="/applicants/qualified/message/{{ $application->id }}" method="POST">
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
                                                <p>Note: This announcement will automatically send to all qualified applicants in this batch through notification.</p>
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
                        <div class="input-group">
                            <div class="form-outline">
                                <input type="text" class="form-control shadow-sm" onkeyup="searchApplicant()" id="search-applicant" placeholder="Search"/>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            {{-- MODAL --}}
            <div class="modal fade" id="infoModal">
                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content bg-secondary">
                    <div class="modal-header">
                        <h5 class="modal-title text-light"><i class="bi bi-info-circle"></i></h5>
                        <button type="button" class="close border-0 float-start" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-light">
                        <p>By clicking the message button, you can send announcement to all qualified applicants in this table. You can also view who added in each qualifed applicants by hovering the gear icon from Document column.</p>
                    </div>

                    </div>
                </div>
            </div>

            <div class="scroll2 shadow-sm">
                <table class="table table-striped table-bordered">
                    <thead class="text-center text-dark" id="applicantListHeader">
                        <tr>
                            <th class="fw-normal bg-light">Document</th>
                            <th class="fw-normal">First Name</th>
                            <th class="fw-normal">Middle Name</th>
                            <th class="fw-normal">Last Name</th>
                            <th class="fw-normal">Age</th>
                            <th class="fw-normal">Gender</th>
                            <th class="fw-normal">Civil Status</th>

                            <th class="fw-normal">Street</th>
                            <th class="fw-normal">Barangay</th>
                            <th class="fw-normal">City</th>
                            <th class="fw-normal">Province</th>
                            <th class="fw-normal">Region</th>
                            <th class="fw-normal">Zipcode</th>

                            <th class="fw-normal">Contact Number</th>
                            <th class="fw-normal">Contact Email</th>

                            <th class="fw-normal">Desired School</th>
                            <th class="fw-normal">Course</th>
                            <th class="fw-normal">HEI Type</th>
                            <th class="fw-normal">School Last Attended</th>

                            <th class="fw-normal">Nationality</th>
                            <th class="fw-normal">Educational Attainment</th>
                            <th class="fw-normal">No. Years in City</th>
                            <th class="fw-normal">Family Income</th>
                            <th class="fw-normal">Registered Voter</th>
                            <th class="fw-normal">GWA</th>

                        </tr>
                    </thead>
                    {{-- RETRIEVING APPLICANT DATA ACCORDING TO ITS CURRENT ID IN LOOP --}}
                    <tbody class="text-center" id="applicantListHeader">
                        <?php

                        if(!$qualifiedApplicantList->isEmpty()){

                            foreach($qualifiedApplicantList as $qualifiedApplicantLists){
                                $applicant = App\Models\Applicant::
                                    where('id', $qualifiedApplicantLists->applicants_id)
                                    ->first();

                        ?>
                            <tr class="tbl-row">
                                <td class="d-flex">
                                    <p style="font-size: 11px;" data-bs-toggle="tooltip" data-bs-placement="left"
                                    title="Added by: {{ $qualifiedApplicantLists->added }}">
                                    <i class="bi bi-gear-fill"></i>
                                    </p>
                                    <a class="text-decoration-none ms-2" href="/storage/{{ $qualifiedApplicantLists->document }}"
                                        target="_blank">View
                                    </a>
                                </td>
                                <td>{{ $applicant->first_name }}</td>
                                <td>{{ $applicant->middle_name }}</td>
                                <td>{{ $applicant->last_name }}</td>
                                <td>{{ $applicant->age }}</td>
                                <td>{{ $applicant->gender }}</td>
                                <td>{{ $applicant->civil_status }}</td>
                                <td>{{ $applicant->address->street }}</td>
                                <td>{{ $applicant->address->barangay }}</td>
                                <td>{{ $applicant->address->city }}</td>
                                <td>{{ $applicant->address->province }}</td>
                                <td>{{ $applicant->address->region }}</td>
                                <td>{{ $applicant->address->zipcode }}</td>
                                <td>{{ $applicant->contact->contact_number }}</td>
                                <td>{{ $applicant->contact->email }}</td>
                                <td>{{ $applicant->school->desired_school }}</td>
                                <td>{{ $applicant->school->course_name }}</td>
                                <td>{{ $applicant->school->hei_type }}</td>
                                <td>{{ $applicant->school->school_last_attended }}</td>
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
                            <td colspan="25">No qualified applicant yet</td>
                        </tr>
                        <?php

                            }
                        ?>
                    </tbody>
                </table>
                </form>
            </div>
            <div class="container mt-3">
                {{ $qualifiedApplicantList->links('pagination::bootstrap-5') }}
            </div>
        </x-layout>
    </section>
    <script src="{{ asset('scripts/dynamic-search.js') }}"></script>
</x-navbar>


