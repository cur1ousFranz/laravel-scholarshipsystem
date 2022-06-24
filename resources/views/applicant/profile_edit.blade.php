<x-navbar>
    <x-layout class="h-100">

        <div class="conntainer mb-5">
            <div class="row">
                <div class="col-3">
                    <div class="card">
                        <div class="card-body border-top border-bottom border-bottom-4 border-top-4 border-primary">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                <img class="rounded-circle" width="150px"
                                    src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card">
                        <form action="/profiles/{{ $applicant->id }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="card-body mb-5 border-top border-top-4 border-bottom-4 border-primary">
                                <div class="container d-flex justify-content-between mt-3">
                                    <h2>Edit Profile</h2>
                                </div>
                                <div class="container mb-4 mt-4">

                                    <div class="row">
                                        <div class="col-6">
                                            <div>
                                                <label for="first_name">
                                                    <h6>First Name</h6>
                                                </label>
                                                <input class="form-control form-control" type="text" id="first_name"
                                                    name="first_name" value="{{ old('first_name') }}">

                                                @error('first_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mt-2">
                                                <label for="middle_name">
                                                    <h6>Middle Name</h6>
                                                </label>
                                                <input class="form-control form-control" type="text" id="middle_name"
                                                    name="middle_name" value="{{ old('middle_name') }}">

                                                @error('middle_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mt-2">
                                                <label for="last_name">
                                                    <h6>Last Name</h6>
                                                </label>
                                                <input class="form-control form-control" type="text" id="last_name"
                                                    name="last_name" value="{{ old('last_name') }}">

                                                @error('last_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-6">
                                                    <div>
                                                        <label for="age">
                                                            <h6>Age</h6>
                                                        </label>
                                                        <select class="form-select form-control" name="age">
                                                            <option selected disabled>Select</option>
                                                            @for ($i = 17; $i <= 25; $i++)
                                                                <option value="{{ $i }}">{{ $i }}
                                                                </option>
                                                            @endfor
                                                        </select>

                                                        @error('age')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div>
                                                        <label for="gender">
                                                            <h6>Gender</h6>
                                                        </label>
                                                        <select class="form-select form-control" name="gender">
                                                            <option selected disabled>Select</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>

                                                        @error('gender')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-6">
                                                    <div>
                                                        <label for="civil_status">
                                                            <h6>Civil Status</h6>
                                                        </label>
                                                        <select class="form-select form-control" name="civil_status">
                                                            <option selected disabled>Select</option>
                                                            <option value="Single">Single</option>
                                                            <option value="Married">Married</option>
                                                            <option value="Widowed">Widowed </option>
                                                            <option value="Divorced">Divorced</option>
                                                        </select>

                                                        @error('civil_status')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div>
                                                        <label for="nationality">
                                                            <h6>Nationality</h6>
                                                        </label>
                                                        <select class="form-select form-control" name="nationality">
                                                            <option selected disabled>Select</option>
                                                            <option value="filipino">Filipino</option>
                                                        </select>

                                                        @error('nationality')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-2">
                                                <label for="educational_attainment">
                                                    <h6>Educational Attainment</h6>
                                                </label>
                                                <select class="form-select form-control" name="educational_attainment">
                                                    <option selected disabled>Select</option>
                                                    <option value="SHS">Senior Highschool Graduate</option>
                                                    <option value="ALS">ALS Graduate</option>
                                                    <option value="College Level">College Level</option>
                                                </select>

                                                @error('educational_attainment')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mt-2">
                                                <label for="desired_school">
                                                    <h6>Desired School</h6>
                                                </label>
                                                <input class="form-control form-control" type="text"
                                                    id="desired_school" name="desired_school"
                                                    value="{{ old('desired_school') }}">

                                                @error('desired_school')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mt-2">
                                                <label for="school_last_attended">
                                                    <h6>School Last Attended</h6>
                                                </label>
                                                <input class="form-control form-control" type="text"
                                                    id="school_last_attended" name="school_last_attended"
                                                    value="{{ old('school_last_attended') }}">

                                                @error('school_last_attended')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-6">
                                                    <div>
                                                        <label for="hei_type">
                                                            <h6>HEI Type</h6>
                                                        </label>
                                                        <select class="form-select form-control" name="hei_type">
                                                            <option selected disabled>Select</option>
                                                            <option value="Public">Public</option>
                                                            <option value="Private">Private</option>
                                                        </select>

                                                        @error('hei_type')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div>
                                                        <label for="gwa">
                                                            <h6>General Weighted Avg</h6>
                                                        </label>
                                                        <input class="form-control form-control" type="int"
                                                            id="gwa" name="gwa"
                                                            value="{{ old('gwa') }}"
                                                            onkeypress="return /[0-9.]/i.test(event.key)"
                                                            maxlength="5">

                                                        @error('gwa')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        {{-- NEXT COLUMN --}}
                                        <div class="col-6">

                                            <div>
                                                <label for="course_name">
                                                    <h6>Course</h6>
                                                </label>
                                                <select class="form-select form-control" name="course_name">
                                                    <option selected disabled>Select</option>
                                                    @foreach ($course as $courses)
                                                        <option value="{{ $courses->course_name }}">
                                                            {{ $courses->course_name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('course_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mt-2">
                                                <label for="contact_number">
                                                    <h6>Contact Number</h6>
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">+63</span>
                                                    </div>
                                                    <input class="form-control form-control" type="text"
                                                        id="contact_number" name="contact_number"
                                                        value="{{ old('contact_number') }}"
                                                        onkeypress="return /[0-9]/i.test(event.key)" maxlength="11">

                                                    </div>

                                                    @error('contact_number')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                            </div>

                                            <div class="mt-2">
                                                <label for="email">
                                                    <h6>Email</h6>
                                                </label>
                                                <input class="form-control form-control" type="email"
                                                    id="email" name="email" value="{{ old('email') }}">

                                                @error('email')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-6">
                                                    <div>
                                                        <label for="years_in_city">
                                                            <h6>No. years in city</h6>
                                                        </label>
                                                        <select class="form-select form-control" name="years_in_city">
                                                            <option selected disabled>Select</option>
                                                            @for ($i = 1; $i <= 10; $i++)
                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>

                                                        @error('years_in_city')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div>
                                                        <label for="family_income">
                                                            <h6>Family Income</h6>
                                                        </label>
                                                        <select class="form-select form-control" name="family_income">
                                                            <option selected disabled>Select</option>
                                                            <option value="8000">8,000 PHP</option>
                                                            <option value="12000">12,000 PHP</option>
                                                            <option value="16000">16,000 PHP</option>
                                                            <option value="20000">20,000 PHP</option>
                                                        </select>

                                                        @error('family_income')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-2">
                                                <label for="street">
                                                    <h6>Street</h6>
                                                </label>
                                                <input class="form-control form-control" type="text"
                                                    id="street" name="street" value="{{ old('street') }}">

                                                @error('street')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mt-2">
                                                <label for="barangay">
                                                    <h6>Barangay</h6>
                                                </label>
                                                <input class="form-control form-control" type="text"
                                                    id="barangay" name="barangay" value="{{ old('barangay') }}">

                                                @error('barangay')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mt-2">
                                                <label for="city">
                                                    <h6>City</h6>
                                                </label>
                                                <input class="form-control form-control" type="text"
                                                    id="city" name="city" value="{{ old('city') }}">

                                                @error('city')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mt-2">
                                                <label for="province">
                                                    <h6>Province</h6>
                                                </label>
                                                <input class="form-control form-control" type="text"
                                                    id="province" name="province" value="{{ old('province') }}">

                                                @error('province')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="row mt-2">

                                                <div class="col-6">
                                                    <div>
                                                        <label for="region">
                                                            <h6>Region</h6>
                                                        </label>
                                                        <select class="form-select form-control" name="region">
                                                            <option selected disabled>Select</option>
                                                            @for ($i = 1; $i <= 12; $i++)
                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>

                                                        @error('region')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div>
                                                        <label for="zipcode">
                                                            <h6>Zipcode</h6>
                                                        </label>
                                                        <input class="form-control form-control" type="text"
                                                            id="zipcode" name="zipcode"
                                                            value="{{ old('zipcode') }}" onkeypress="return /[0-9]/i.test(event.key)"
                                                            maxlength="4">

                                                        @error('zipcode')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="container">
                                    <button class="btn btn-primary float-end" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </x-layout>
</x-navbar>
