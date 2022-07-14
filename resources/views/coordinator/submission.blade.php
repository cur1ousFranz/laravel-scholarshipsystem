<x-navbar>
    <section>
        <x-layout>
            <div class="d-flex justify-content-between">
                <div class="d-lg-flex">
                    <h4 class="mt-3">Applicant List</h4>
                    <p class="mt-2 ms-3" data-bs-toggle="modal" data-bs-target="#infoModal">
                        <i class="bi bi-info-circle"></i>
                    </p>
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
                            <p>To add applicant as qualified or rejected, check boxes must be selected in order to gain access in buttons. Added applicant as qualified or rejected, it will automatically hidden from the list.</p>
                        </div>

                        </div>
                    </div>
                </div>

                <div class="d-flex">
                    <div>
                        <span data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Qualified">
                            <button class="shadow-sm btn btn-outline-success me-2" data-bs-toggle="modal"
                            data-bs-target="#qualifiedApplicant" id="checkBox1" disabled>
                                <i class="bi bi-person-check-fill"></i>
                            </button>
                        </span>
                    </div>

                    <div>
                        <span data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Rejected">
                            <button class="shadow-sm btn btn-outline-danger me-2" id="checkBox2"
                            disabled data-bs-toggle="modal" data-bs-target="#rejectedApplicant" disabled>
                                <i class="bi bi-person-x-fill"></i>
                            </button>
                        </span>
                    </div>

                    <span data-bs-toggle="tooltip" data-bs-placement="left" title="Show All Applicants">
                        <a href="/applications/{{ $application->id }}/submissions" class="btn btn-outline-warning me-2">
                            <i class="bi bi-arrow-up-square-fill"></i>
                        </a>
                    </span>

                    <form action="">
                        <div class="input-group">
                            <div class="shadow-sm form-outline">
                                <input type="search" id="form1" class="form-control" name="search"/>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="scroll shadow-sm">
                <form action="/submissions/listing/{{ $application->id }}" method="POST" id="checkboxForm">
                    @csrf
                    <table class="table table-striped table-bordered">
                        <thead class="text-center text-dark" id="applicantListHeader">
                            <tr>
                                <th scope="col" class="bg-light">
                                    <input type="checkbox" class="mb-1 form-check-input" name="selectAll"
                                    onchange="document.getElementById('checkBox1').disabled = !this.checked;
                                        document.getElementById('checkBox2').disabled = !this.checked;">
                                </th>
                                <th scope="col" class="bg-light">Rating</th>
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

                            if(!$applicantList->isEmpty()){

                                foreach($applicantList as $applicantsLists){
                                    $applicant = App\Models\Applicant::
                                    where('id', $applicantsLists->applicants_id)
                                    ->first();

                                    ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="applicant[]" value="{{ $applicant->id }}"
                                                    class="form-check-input mt-1"
                                                    onchange="document.getElementById('checkBox1').disabled = !this.checked;
                                                    document.getElementById('checkBox2').disabled = !this.checked;">
                                            </td>
                                            <td>Test</td>
                                            <td>
                                                <a class="text-decoration-none" href="/storage/{{ $applicantsLists->document }}"
                                                    target="_blank">View</a>
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
                                    <td colspan="25">No submissions yet</td>
                                </tr>
                                <?php

                                }
                        ?>
                        </tbody>
                    </table>
                </form>
            </div>
            {{-- PAGINATION --}}
            <div class="container mt-3">
                {{ $applicantList->links('pagination::bootstrap-5') }}
            </div>

            {{-- QualifiedApplicant Button Modal --}}
            <div class="modal fade" id="qualifiedApplicant">
                <div class="modal-dialog modal-dialog-centered text-center" >
                  <div class="modal-content border border-success">
                    <div class="modal-header d-flex justify-content-center">
                        <h4 class="modal-title">Qualified Applicant</h4>
                    </div>
                    <div class="modal-body">

                        <h5>Are you sure you want to proceed?</h5>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="btn btn-outline-danger"
                        data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-outline-primary"
                        form="checkboxForm" name="action" value="qualified">
                            Confirm
                        </button>
                    </div>
                  </div>
                </div>
              </div>

            {{-- RejectedApplicant Button Modal --}}
            <div class="modal fade" id="rejectedApplicant">
                <div class="modal-dialog modal-dialog-centered text-center" >
                  <div class="modal-content border border-danger">
                    <div class="modal-header d-flex justify-content-center">
                        <h4 class="modal-title">Rejected Applicant</h4>
                    </div>
                    <div class="modal-body">
                        <h5>Are you sure you want to proceed?</h5>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-outline-primary"
                        form="checkboxForm" name="action" value="rejected">
                            Confirm
                        </button>
                    </div>
                  </div>
                </div>
              </div>
        </x-layout>
    </section>

</x-navbar>

<script>
    $(function() {
        jQuery("[name=selectAll]").click(function(source) {
            checkboxes = jQuery("[name='applicant[]'");
            for (var i in checkboxes) {
                checkboxes[i].checked = source.target.checked;
            }
        });
    })
</script>
