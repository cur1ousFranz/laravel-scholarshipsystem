<x-navbar>
    <x-layout class="h-100">

        <div class="conntainer mb-5">
            <div class="row">
                <div class="col-3">
                    <div class="card">
                        <div class="card-body border-top border-bottom border-bottom-4 border-top-4 border-primary">
                            <div class="d-flex flex-column align-items-center text-center py-3">
                                <img class="rounded-circle mb-2" width="150px"
                                    src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                <div class="container-fluid me-5">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="bi bi-person-square"></i>
                                        </div>
                                        <div class="col-10 mt-1 ">
                                            <h6 class="float-start">{{ auth()->user()->username }}</h6>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-2">
                                            <i class="bi bi-envelope-fill"></i>
                                        </div>
                                        <div class="col-10 mt-1">
                                            <h6 class="float-start">{{ $contact->email }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card">
                        <div class="card-body border-top border-top-4 border-bottom border-bottom-4 border-primary">
                            <div class="container d-flex justify-content-between mt-3">
                                <h2>Profile</h2>
                                <a href="/profiles/{{ $applicant->id }}/edit"
                                    style="font-size: 16px; text-decoration: none;">
                                    <i class="bi bi-pencil-square">&nbsp;</i>Edit Profile</a>
                            </div>
                            <div class="container mb-4 mt-4">

                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label for="first_name">
                                                <h6>First Name</h6>
                                            </label>
                                            <input class="form-control form-control text-muted" type="text" id="first_name"
                                                value="{{ $applicant->first_name }}" style="background-color: #fff;"
                                                disabled>
                                        </div>

                                        <div class="mt-2">
                                            <label for="middle_name">
                                                <h6>Middle Name</h6>
                                            </label>
                                            <input class="form-control form-control text-muted" type="text" id="middle_name"
                                                value="{{ $applicant->middle_name }}" style="background-color: #fff;"
                                                disabled>
                                        </div>

                                        <div class="mt-2">
                                            <label for="last_name">
                                                <h6>Last Name</h6>
                                            </label>
                                            <input class="form-control form-control text-muted" type="text" id="last_name"
                                                value="{{ $applicant->last_name }}" style="background-color: #fff;"
                                                disabled>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-6">
                                                <div>
                                                    <label for="age">
                                                        <h6>Age</h6>
                                                    </label>
                                                    <input class="form-control form-control text-muted" type="text"
                                                        id="age" value="{{ $applicant->age }}"
                                                        style="background-color: #fff;" disabled>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div>
                                                    <label for="gender">
                                                        <h6>Gender</h6>
                                                    </label>
                                                    <input class="form-control form-control text-muted" type="text"
                                                        id="gender" value="{{ $applicant->gender }}"
                                                        style="background-color: #fff;" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-6">
                                                <div>
                                                    <label for="civil_status">
                                                        <h6>Civil Status</h6>
                                                    </label>
                                                    <input class="form-control form-control text-muted" type="text"
                                                        id="civil_status" value="{{ $applicant->civil_status }}"
                                                        style="background-color: #fff;" disabled>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div>
                                                    <label for="nationality">
                                                        <h6>Nationality</h6>
                                                    </label>
                                                    <input class="form-control form-control text-muted" type="text"
                                                        id="nationality" value="{{ $applicant->nationality }}"
                                                        style="background-color: #fff;" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-2">
                                            <label for="educational_attainment">
                                                <h6>Educational Attainment</h6>
                                            </label>
                                            <input class="form-control form-control text-muted" type="text"
                                                id="educational_attainment"
                                                value="{{ $applicant->educational_attainment }}"
                                                style="background-color: #fff;" disabled>
                                        </div>

                                        <div class="mt-2">
                                            <label for="school_last_attended">
                                                <h6>School Last Attended</h6>
                                            </label>
                                            <input class="form-control form-control text-muted" type="text"
                                                id="school_last_attended" value="{{ $school->school_last_attended }}"
                                                style="background-color: #fff;" disabled>
                                        </div>

                                        <div class="mt-2">
                                            <label for="desired_school">
                                                <h6>Desired School</h6>
                                            </label>
                                            <input class="form-control form-control text-muted" type="text" id="desired_school"
                                                value="{{ $school->desired_school }}" style="background-color: #fff;"
                                                disabled>
                                        </div>

                                        <div class="mt-2">
                                            <label for="course_name">
                                                <h6>Course</h6>
                                            </label>
                                            <input class="form-control form-control text-muted" type="text" id="course_name"
                                                value="{{ $school->course_name }}" style="background-color: #fff;" disabled>
                                        </div>

                                    </div>

                                    {{-- NEXT COLUMN --}}
                                    <div class="col-6">

                                        <div class="row">
                                            <div class="col-6">
                                                <div>
                                                    <label for="hei_type">
                                                        <h6>HEI Type</h6>
                                                    </label>
                                                    <input class="form-control form-control text-muted" type="text"
                                                        id="hei_type" value="{{ $school->hei_type }}"
                                                        style="background-color: #fff;" disabled>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div>
                                                    <label for="gwa">
                                                        <h6>General Weighted Avg</h6>
                                                    </label>
                                                    <input class="form-control form-control text-muted" type="text"
                                                        id="gwa" value="{{ $applicant->gwa }}"
                                                        style="background-color: #fff;" disabled>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="mt-2">
                                            <label for="contact_number">
                                                <h6>Contact Number</h6>
                                            </label>
                                            <input class="form-control form-control text-muted" type="text"
                                                id="contact_number" value="{{ $contact->contact_number }}"
                                                style="background-color: #fff;" disabled>
                                        </div>

                                        <div class="mt-2">
                                            <label for="email">
                                                <h6>Email</h6>
                                            </label>
                                            <input class="form-control form-control text-muted" type="text" id="email"
                                                value="{{ $contact->email }}" style="background-color: #fff;"
                                                disabled>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-6">
                                                <div>
                                                    <label for="years_in_city">
                                                        <h6>No. years in city</h6>
                                                    </label>
                                                    <input class="form-control form-control text-muted" type="text"
                                                        id="years_in_city" value="{{ $applicant->years_in_city }}"
                                                        style="background-color: #fff;" disabled>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div>
                                                    <label for="family_income">
                                                        <h6>Family Income</h6>
                                                    </label>
                                                    <input class="form-control form-control text-muted" type="text"
                                                        id="family_income" value="{{ $applicant->family_income }}"
                                                        style="background-color: #fff;" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-2">
                                            <label for="street">
                                                <h6>Street</h6>
                                            </label>
                                            <input class="form-control form-control text-muted" type="text" id="street"
                                                value="{{ $address->street }}" style="background-color: #fff;"
                                                disabled>
                                        </div>

                                        <div class="mt-2">
                                            <label for="barangay">
                                                <h6>Barangay</h6>
                                            </label>
                                            <input class="form-control form-control text-muted" type="text" id="barangay"
                                                value="{{ $address->barangay }}" style="background-color: #fff;"
                                                disabled>
                                        </div>

                                        <div class="mt-2">
                                            <label for="city">
                                                <h6>City</h6>
                                            </label>
                                            <input class="form-control form-control text-muted" type="text" id="city"
                                                value="{{ $address->city }}" style="background-color: #fff;"
                                                disabled>
                                        </div>

                                        <div class="mt-2">
                                            <label for="province">
                                                <h6>Province</h6>
                                            </label>
                                            <input class="form-control form-control text-muted" type="text" id="province"
                                                value="{{ $address->province }}" style="background-color: #fff;"
                                                disabled>
                                        </div>

                                        <div class="row mt-2">

                                            <div class="col-6">
                                                <div>
                                                    <label for="region">
                                                        <h6>Region</h6>
                                                    </label>
                                                    <input class="form-control form-control text-muted" type="text"
                                                        id="region" value="{{ $address->region }}"
                                                        style="background-color: #fff;" disabled>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div>
                                                    <label for="zipcode">
                                                        <h6>Zipcode</h6>
                                                    </label>
                                                    <input class="form-control form-control text-muted" type="text"
                                                        id="zipcode" value="{{ $address->zipcode }}"
                                                        style="background-color: #fff;" disabled>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </x-layout>
</x-navbar>
