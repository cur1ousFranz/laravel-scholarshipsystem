<x-layout title="Rejected Applicant">
    <section>
        <x-container class="border shadow-sm">
            <div class="row mt-3">
                <div class="col-lg d-flex">
                    <h4 class="mt-2">Rejected Applicant List</h4>
                    <p class="mt-2 ms-3" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#infoModal">
                        <i class="bi bi-info-circle"></i>
                    </p>
                </div>

                <div class="col-lg">
                    <div class="d-flex float-lg-end">
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

                            <div class="modal fade" id="message">
                                <div class="modal-dialog modal-lg modal-dialog-centered text-center">
                                    <div class="modal-content border">
                                        <div class="modal-header d-flex justify-content-center">
                                            <h4 class="modal-title">Create Announcement</h4>
                                        </div>
                                        <form action="/applicants/rejected/message/{{ $application->id }}" method="POST">
                                            @csrf

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="text-start">
                                                            <x-form.label name="title"/>
                                                            <input class="shadow-sm form-control" id="title" name="title"
                                                            style="background-color: #fff;"
                                                            autocomplete="off" value="{{ old('title') }}"
                                                            maxlength="15">

                                                            @error('title')
                                                                @php
                                                                    back()->with('error', 'Provide all fields!');
                                                                @endphp
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6"></div>
                                                </div>
                                                <div class="text-start mt-2">
                                                    <x-form.label name="message"/>
                                                    <textarea class="form-control shadow-sm" name="message" id="editor"></textarea>

                                                    @error('message')
                                                        @php
                                                            back()->with('error', 'Provide all fields!');
                                                        @endphp
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="text-start ms-3 text-muted">
                                                <p>Note: This announcement will automatically send to all rejected applicants in this batch through notification and email.</p>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-end">
                                                <x-form.button class="btn-outline-secondary" type="button" data-bs-dismiss="modal">Cancel</x-form.button>
                                                <x-form.button type="submit">Send</x-form.button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <form action="">
                            <div class="input-group">
                                <div class="shadow-sm form-outline">
                                    <input type="search"
                                    id="search-applicant-list"
                                    class="form-control"
                                    autocomplete="off"
                                    name="search"
                                    placeholder="Search"
                                    value="{{ request()->has('search') ? request()->input('search') : '' }}"/>
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
                                <p>By clicking the message button, you can send announcement to all rejected applicants in this table. You can also view who added in each rejected applicant by hovering the gear icon from Document column.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <hr class="mt-1">
            <div class="scroll2 shadow-sm">
                <x-table.table>
                    <thead class="text-center text-dark" id="applicantListHeader">
                        <tr>
                            <x-table.th class="bg-light">Rating</x-table.th>
                            <x-table.th class="bg-light">Document</x-table.th>
                            <x-table.th>First Name</x-table.th>
                            <x-table.th>Middle Name</x-table.th>
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
                            <x-table.th>Desired School</x-table.th>
                            <x-table.th>Course</x-table.th>
                            <x-table.th>HEI Type</x-table.th>
                            <x-table.th>School Last Attended</x-table.th>
                            <x-table.th>Nationality</x-table.th>
                            <x-table.th>Educational Attainment</x-table.th>
                            <x-table.th>No. Years in City</x-table.th>
                            <x-table.th>Family Income</x-table.th>
                            <x-table.th>Registered Voter</x-table.th>
                            <x-table.th>GWA</x-table.th>
                        </tr>
                    </thead>
                    <tbody id="applicantListHeader">
                        @forelse ($rejectedApplicantList as $list)
                            <tr class="tbl-row">
                                <td class="text-center">
                                    <a href="/applicant/evaluation/{{ $list->applicant_lists_id }}" target="_blank">
                                    {{ $list->applicantList->rating->rate }}%
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a class="fw-bold text-danger" href="/storage/{{ $list->document }}"
                                        target="_blank" style="font-size: 22px">
                                        <i class="bi bi-file-earmark-pdf"></i>
                                    </a>
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
                        @empty
                            <tr>
                                <td colspan="25">No submissions yet</td>
                            </tr>
                        @endforelse
                    </tbody>
                </x-table.table>
            </div>
            <div class="container mt-3">
                {{ $rejectedApplicantList->links('pagination::bootstrap-5') }}
            </div>
        </x-container>
    </section>
    <script src="{{ asset('scripts/dynamic-search.js') }}"></script>
</x-layout>
