<x-navbar>
    <x-layout>
        <div class="row">
            <div class="col-3">
                <div class="card shadow-sm">
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
                                        <h6 class="float-start">{{ $applicant->contact->email }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="card shadow-sm">
                    <form action="/profiles/{{ $applicant->id }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-body mb-5 border-top border-top-4 border-primary">
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
                                            <input class="shadow-sm form-control form-control" type="text" id="first_name"
                                                name="first_name"
                                                value="{{ old('first_name') ?? $applicant->first_name }}">

                                            @error('first_name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-6">
                                                <div>
                                                    <label for="middle_name">
                                                        <h6>Middle Name</h6>
                                                    </label>
                                                    <input class="shadow-sm form-control form-control" type="text" id="middle_name"
                                                        name="middle_name"
                                                        value="{{ old('middle_name') ?? $applicant->middle_name }}">

                                                    @error('middle_name')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                            </div>

                                            <div class="col-6">

                                                <div>
                                                    <label for="last_name">
                                                        <h6>Last Name</h6>
                                                    </label>
                                                    <input class="shadow-sm form-control form-control" type="text" id="last_name"
                                                        name="last_name"
                                                        value="{{ old('last_name') ?? $applicant->last_name }}">

                                                    @error('last_name')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-6">
                                                <div>
                                                    <label for="age">
                                                        <h6>Age</h6>
                                                    </label>
                                                    <select class="shadow-sm form-select form-control" name="age">
                                                        <option selected disabled>Select</option>
                                                        @foreach ($age as $ages)
                                                            <option
                                                                {{ $applicant->age == $ages ? 'selected' : '' }}
                                                                value="{{ $ages }}">
                                                                {{ $ages }}</option>
                                                        @endforeach
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
                                                    <select class="shadow-sm form-select form-control" name="gender">
                                                        <option selected disabled>Select</option>
                                                        <option
                                                            {{ $applicant->gender === 'Male' ? 'selected' : '' }}
                                                            value="Male">Male</option>
                                                        <option
                                                            {{ $applicant->gender === 'Female' ? 'selected' : '' }}
                                                            value="Female">Female</option>
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
                                                    <select class="shadow-sm form-select form-control" name="civil_status">
                                                        <option selected disabled>Select</option>
                                                        <option
                                                            {{ $applicant->civil_status === 'Single' ? 'selected' : '' }}
                                                            value="Single">Single</option>
                                                        <option
                                                            {{ $applicant->civil_status === 'Married' ? 'selected' : '' }}
                                                            value="Married">Married</option>
                                                        <option
                                                            {{ $applicant->civil_status === 'Widowed' ? 'selected' : '' }}
                                                            value="Widowed">Widowed </option>
                                                        <option
                                                            {{ $applicant->civil_status === 'Divorced' ? 'selected' : '' }}
                                                            value="Divorced">Divorced</option>
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
                                                    <select class="shadow-sm form-select form-control" name="nationality">
                                                        <option selected disabled>Select</option>
                                                        <option
                                                            {{ $applicant->nationality === 'Filipino' ? 'selected' : '' }}
                                                            value="Filipino">Filipino</option>
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
                                            <select class="shadow-sm form-select form-control" name="educational_attainment">
                                                <option selected disabled>Select</option>
                                                <option
                                                    {{ $applicant->educational_attainment === 'SHS' ? 'selected' : '' }}
                                                    value="SHS">Senior Highschool Graduate</option>
                                                <option
                                                    {{ $applicant->educational_attainment === 'ALS' ? 'selected' : '' }}
                                                    value="ALS">ALS Graduate</option>
                                                <option
                                                    {{ $applicant->educational_attainment === 'College Level' ? 'selected' : '' }}
                                                    value="College Level">College Level</option>

                                            </select>

                                            @error('educational_attainment')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mt-2">
                                            <label for="school_last_attended">
                                                <h6>School Last Attended</h6>
                                            </label>
                                            <input class="shadow-sm form-control form-control" type="text"
                                                id="school_last_attended" name="school_last_attended"
                                                value="{{ old('school_last_attended') ?? $applicant->school->school_last_attended }}">

                                            @error('school_last_attended')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mt-2">
                                            <label for="desired_school">
                                                <h6>Desired School</h6>
                                            </label>

                                            <select class="shadow-sm form-select form-control dynamic" name="desired_school"
                                                id="school" data-dependent="course">
                                                <option selected disabled>Select School</option>
                                                @foreach ($school_list as $schools)
                                                    <option value="{{ $schools->school }}">
                                                        {{ $schools->school }}</option>
                                                @endforeach
                                            </select>

                                            @error('desired_school')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mt-2">
                                            <label for="course_name">
                                                <h6>Course</h6>
                                            </label>
                                            <select class="shadow-sm form-select form-control" name="course_name"
                                                id="course">
                                                <option selected disabled>Select</option>

                                            </select>

                                            @error('course_name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-6">
                                                <div>
                                                    <label for="hei_type">
                                                        <h6>HEI Type</h6>
                                                    </label>
                                                    <select class="shadow-sm form-select form-control" name="hei_type">
                                                        <option selected disabled>Select</option>
                                                        <option
                                                            {{ $applicant->school->hei_type === 'Public' ? 'selected' : '' }}
                                                            value="Public">Public</option>
                                                        <option
                                                            {{ $applicant->school->hei_type === 'Private' ? 'selected' : '' }}
                                                            value="Private">Private</option>
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
                                                    <input class="shadow-sm form-control form-control" type="int"
                                                        id="gwa" name="gwa"
                                                        value="{{ old('gwa') ?? $applicant->gwa }}"
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
                                            <label for="registered_voter">
                                                <h6>Registered Voter</h6>
                                            </label>
                                            <select class="shadow-sm form-select form-control" name="registered_voter">
                                                <option selected disabled>Select</option>
                                                <option
                                                    {{ $applicant->registered_voter == 'Yes' ? 'selected' : '' }}
                                                    value="Yes">Yes</option>
                                                <option
                                                    {{ $applicant->registered_voter == 'No' ? 'selected' : '' }}
                                                    value="No">No</option>
                                            </select>

                                            @error('registered_voter')
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
                                                <input class="shadow-sm form-control form-control" type="text"
                                                    id="contact_number" name="contact_number"
                                                    value="{{ old('contact_number') ?? $applicant->contact->contact_number }}"
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
                                            <input class="shadow-sm form-control form-control" type="email"
                                                id="email" name="email"
                                                value="{{ $applicant->contact->email }}" readonly>

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
                                                    <select class="shadow-sm form-select form-control" name="years_in_city">
                                                        <option selected disabled>Select</option>
                                                        @for ($i = 1; $i <= 10; $i++)
                                                            <option
                                                                {{ $applicant->years_in_city == $i ? 'selected' : '' }}
                                                                value="{{ $i }}"> {{ $i }}
                                                            </option>
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
                                                    <select class="shadow-sm form-select form-control" name="family_income">
                                                        <option selected disabled>Select</option>
                                                        <option
                                                            {{ $applicant->family_income == 8000 ? 'selected' : '' }}
                                                            value="8000">8,000 PHP</option>
                                                        <option
                                                            {{ $applicant->family_income == 12000 ? 'selected' : '' }}
                                                            value="12000">12,000 PHP</option>
                                                        <option
                                                            {{ $applicant->family_income == 16000 ? 'selected' : '' }}
                                                            value="16000">16,000 PHP</option>
                                                        <option
                                                            {{ $applicant->family_income == 20000 ? 'selected' : '' }}
                                                            value="20000">20,000 PHP</option>
                                                        <option
                                                            {{ $applicant->family_income == 25000 ? 'selected' : '' }}
                                                            value="25000">25,000 PHP</option>
                                                    </select>

                                                    @error('family_income')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        {{-- DYNAMIC DROPDOWNS OF ADDRESS --}}

                                        <div class="row mt-2">
                                            <div class="col-6">
                                                <label for="country">
                                                    <h6>Country</h6>
                                                </label>
                                                <select class="shadow-sm form-select form-control dynamic" name="country"
                                                    id="country" data-dependent="province">
                                                    <option selected disabled>Select</option>

                                                    @foreach ($dynamic_address as $country)
                                                    <option value="{{ $country->country }}">
                                                        {{ $country->country }}</option>
                                                    @endforeach
                                                </select>

                                                @error('country')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="col-6">
                                                <label for="province">
                                                    <h6>Province</h6>
                                                </label>
                                                <select class="shadow-sm form-select form-control dynamic" name="province"
                                                    id="province" data-dependent="city">
                                                    <option selected disabled>Select</option>

                                                </select>

                                                @error('province')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mt-2">
                                            <label for="city">
                                                <h6>City</h6>
                                            </label>
                                            <select class="shadow-sm form-select form-control dynamic" name="city"
                                                id="city" data-dependent="barangay">
                                                <option selected disabled>Select</option>

                                            </select>

                                            @error('city')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mt-2">
                                            <label for="barangay">
                                                <h6>Barangay</h6>
                                            </label>
                                            <select class="shadow-sm form-select form-control" name="barangay"
                                                id="barangay">
                                                <option selected disabled>Select</option>

                                            </select>

                                            @error('barangay')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mt-2">
                                            <label for="street">
                                                <h6>Street</h6>
                                            </label>
                                            <input class="shadow-sm form-control form-control" type="text"
                                            id="street" name="street"
                                            value="{{ old('street') ?? $applicant->address->street }}">

                                            @error('street')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="row mt-2">

                                            <div class="col-6">
                                                <div>
                                                    <label for="region">
                                                        <h6>Region</h6>
                                                    </label>
                                                    <select class="shadow-sm form-select form-control" name="region">
                                                        <option selected disabled>Select</option>
                                                        @for ($i = 1; $i <= 12; $i++)
                                                            <option
                                                                {{ $applicant->address->region == $i ? 'selected' : '' }}
                                                                value="{{ $i }}">
                                                                {{ $i }}</option>
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
                                                    <input class="shadow-sm form-control form-control" type="text"
                                                        id="zipcode" name="zipcode"
                                                        value="{{ old('zipcode') ?? $applicant->address->zipcode }}"
                                                        onkeypress="return /[0-9]/i.test(event.key)"
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
                                <button class="shadow-sm btn btn-outline-primary float-end" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-layout>
</x-navbar>

<script>
    // This is for School and Courses function
    // dynamic dependent dropdown
    $(document).ready(function() {

        $('.dynamic').change(function() {
            if ($(this).val() != '') {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('applicantcontroller.fetch') }}",
                    method: "POST",
                    data: {
                        select: select,
                        value: value,
                        _token: _token,
                        dependent: dependent
                    },
                    success: function(result) {
                        $('#' + dependent).html(result);
                    }

                })
            }
        });

        $('#school').change(function() {
            $('#course').val('');
        });

    });

</script>
<script>

    // This is for Address function
    // dynamic dependent dropdown
    $(document).ready(function() {

    $('.dynamic').change(function() {
        if ($(this).val() != '') {
            var select = $(this).attr("id");
            var value = $(this).val();
            var dependent = $(this).data('dependent');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('applicantcontroller.fetchAddress') }}",
                method: "POST",
                data: {
                    select: select,
                    value: value,
                    _token: _token,
                    dependent: dependent
                },
                success: function(result) {
                    $('#' + dependent).html(result);
                }

            })
        }
    });

    $('#country').change(function() {
        $('#province').val('');
        $('#city').val('');
        $('#barangay').val('');
        $('#province').val('');
    });

    $('#province').change(function() {
        $('#city').val('');
        $('#barangay').val('');
    });

    $('#city').change(function() {
        $('#barangay').val('');
    });

    });
</script>
