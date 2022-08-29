<x-layout>
    <section>
        <x-container>
            <div class="row">
                <div class="col-lg d-flex">
                    <h4 class="mt-2">Applicant List</h4>
                    <p class="mt-2 ms-3" data-bs-toggle="modal" data-bs-target="#infoModal">
                        <i class="bi bi-info-circle"></i>
                    </p>
                </div>
                <div class="col-lg">
                    <div class="d-flex float-lg-end">
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

                        <form action="">
                            <div class="input-group">
                                <div class="shadow-sm form-outline">
                                    <input type="search"
                                    id="search-applicant-list"
                                    onkeyup="searchApplicantList()"
                                    class="form-control"
                                    autocomplete="off"
                                    name="search"
                                    placeholder="Search"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

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

            </div>
            <div class="scroll shadow-sm mt-2">
                <form action="/applicants/{{ $application->id }}" method="POST" id="checkboxForm">
                    @csrf
                    <x-table.table>
                        <thead class="text-center text-dark" id="applicantListHeader">
                            <tr>
                                <x-table.th class="bg-light">
                                    <input type="checkbox" class="mb-1 form-check-input" name="selectAll"
                                    onchange="document.getElementById('checkBox1').disabled = !this.checked;
                                        document.getElementById('checkBox2').disabled = !this.checked;">
                                </x-table.th>
                                <x-table.th class="bg-light">Rating</x-table.th>
                                <x-table.th class="bg-light">Document</x-table.th>
                                <x-table.th>First Name</x-table.th>
                                <x-table.th>Midle Name</x-table.th>
                                <x-table.th>Last Name</x-table.th>
                                <x-table.th>Age</x-table.th>
                                <x-table.th>Gender</x-table.th>
                                <x-table.th>Civil Status</x-table.th>
                                <x-table.th>Street</x-table.th>
                                <x-table.th>Barangay</x-table.th>
                                <x-table.th>City</x-table.th>
                                <x-table.th>Province</x-table.th>
                                <x-table.th>Region</x-table.th>
                                <x-table.th>Zipcode</x-table.th>
                                <x-table.th>Contact Number</x-table.th>
                                <x-table.th>Contact Email</x-table.th>
                                <x-table.th>Course</x-table.th>
                                <x-table.th>HEI Type</x-table.th>
                                <x-table.th>Desired School</x-table.th>
                                <x-table.th>School Last Attended<</x-table.th>
                                <x-table.th>Nationality</x-table.th>
                                <x-table.th>Educational Attainment School</x-table.th>
                                <x-table.th>No. Years in City</x-table.th>
                                <x-table.th>Family Income</x-table.th>
                                <x-table.th>Registered Voter</x-table.th>
                                <x-table.th>GWA</x-table.th>
                            </tr>
                        </thead>
                        <tbody class="text-center" id="applicantListHeader">
                            @if (!$applicantList->isEmpty())
                                @foreach ($applicantList as $list)
                                    <tr class="tbl-row">
                                        <td>
                                            <input type="checkbox" name="applicant[]"
                                            value="{{ $list->applicant->first()->id }}"
                                            class="form-check-input mt-1"
                                            onchange="document.getElementById('checkBox1').disabled = !this.checked;
                                            document.getElementById('checkBox2').disabled = !this.checked;">
                                        </td>
                                        <td>Test</td>
                                        <td>
                                            <a class="text-decoration-none" href="/storage/{{ $list->document }}"
                                                target="_blank">View</a>
                                        </td>
                                        <td>{{ $list->applicant->first()->first_name }}</td>
                                        <td>{{ $list->applicant->first()->middle_name }}</td>
                                        <td>{{ $list->applicant->first()->last_name }}</td>
                                        <td>{{ $list->applicant->first()->age }}</td>
                                        <td>{{ $list->applicant->first()->gender }}</td>
                                        <td>{{ $list->applicant->first()->civil_status }}</td>
                                        <td>{{ $list->applicant->first()->address->street }}</td>
                                        <td>{{ $list->applicant->first()->address->barangay }}</td>
                                        <td>{{ $list->applicant->first()->address->city }}</td>
                                        <td>{{ $list->applicant->first()->address->province }}</td>
                                        <td>{{ $list->applicant->first()->address->region }}</td>
                                        <td>{{ $list->applicant->first()->address->zipcode }}</td>
                                        <td>{{ $list->applicant->first()->contact->contact_number }}</td>
                                        <td>{{ $list->applicant->first()->contact->email }}</td>
                                        <td>{{ $list->applicant->first()->school->desired_school }}</td>
                                        <td>{{ $list->applicant->first()->school->course_name }}</td>
                                        <td>{{ $list->applicant->first()->school->hei_type }}</td>
                                        <td>{{ $list->applicant->first()->school->school_last_attended }}</td>
                                        <td>{{ $list->applicant->first()->nationality }}</td>
                                        <td>{{ $list->applicant->first()->educational_attainment }}</td>
                                        <td>{{ $list->applicant->first()->years_in_city }}</td>
                                        <td>{{ $list->applicant->first()->family_income }}</td>
                                        <td>{{ $list->applicant->first()->registered_voter }}</td>
                                        <td>{{ $list->applicant->first()->gwa }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="25">No submissions yet</td>
                                </tr>
                            @endif
                        </tbody>
                    </x-table.table>
                </form>
            </div>

            <div class="container mt-3">
                {{ $applicantList->links('pagination::bootstrap-5') }}
            </div>

              <x-modal name="qualifiedApplicant">
                <x-slot name="header">Qualified Applicant</x-slot>
                <x-slot name="body">Are you sure you want to proceed?</x-slot>
                <x-slot name="footer">
                    <x-form.button type="button" class="btn-outline-danger" data-bs-dismiss="modal">
                        Cancel
                    </x-form.button>
                    <x-form.button type="submit" class="btn-outline-primary"
                    form="checkboxForm" name="action" value="qualified">
                        Confirm
                    </x-form.button>
                </x-slot>
            </x-modal>

            <x-modal name="rejectedApplicant">
                <x-slot name="header">Rejected Applicant</x-slot>
                <x-slot name="body">Are you sure you want to proceed?</x-slot>
                <x-slot name="footer">
                    <x-form.button type="button" class="btn-outline-danger" data-bs-dismiss="modal">
                        Cancel
                    </x-form.button>
                    <x-form.button type="submit" class="btn-outline-primary"
                    form="checkboxForm" name="action" value="rejected">
                        Confirm
                    </x-form.button>
                </x-slot>
            </x-modal>
        </x-container>
    </section>

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
    <script src="{{ asset('scripts/dynamic-search.js') }}"></script>
</x-layout>

