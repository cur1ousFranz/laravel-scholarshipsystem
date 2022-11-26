<x-layout title="Profile | Settings">
    <section>
        <x-container>
            @if ($applicant->first_name)
                <div class="col-lg-9 mt-4 mx-auto">
                    <div class="card shadow-sm">
                        <x-card-primary-border>
                            <h2>Basic Info</h2>
                            <x-form.row-col>
                                <x-slot name="first">
                                    <x-form.input name="first_name" disable="true" value="{{ $applicant->first_name }}"/>

                                    <x-form.row-col>
                                        <x-slot name="first">
                                            <x-form.input name="middle_name" disable="true" value="{{ $applicant->middle_name }}"/>
                                        </x-slot>
                                        <x-slot name="second">
                                            <x-form.input name="last_name" disable="true" value="{{ $applicant->last_name }}"/>
                                        </x-slot>
                                    </x-form.row-col>

                                    <x-form.row-col>
                                        <x-slot name="first">
                                            <x-form.input name="birth_date" disable="true" value="{{ $applicant->birth_date }}"/>
                                        </x-slot>
                                        <x-slot name="second">
                                            <x-form.input name="gender" disable="true" value="{{ $applicant->gender }}"/>
                                        </x-slot>
                                    </x-form.row-col>

                                    <x-form.row-col>
                                        <x-slot name="first">
                                            <x-form.input name="civil_status" disable="true" value="{{ $applicant->civil_status }}"/>
                                        </x-slot>
                                        <x-slot name="second">
                                            <x-form.input name="nationality" disable="true" value="{{ $applicant->nationality }}"/>
                                        </x-slot>
                                    </x-form.row-col>

                                    <x-form.input class="mt-4" name="educational_attainment" disable="true" value="{{ $applicant->educational_attainment }}"/>
                                    <x-form.input class="mt-4" name="school_last_attended" disable="true" value="{{ $applicant->school->school_last_attended }}"/>
                                    <x-form.input class="mt-4" name="desired_school" disable="true" value="{{ $applicant->school->desired_school }}"/>
                                    <x-form.input class="mt-4" name="course_name" disable="true" value="{{ $applicant->school->course_name }}"/>

                                </x-slot>

                                <x-slot name="second">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="HEI">
                                                <h6>HEI</h6>
                                            </label>
                                            <input class="shadow-sm form-control"
                                            name="HEI"
                                            style="background-color: #fff;"
                                            autocomplete="off"
                                            value="{{ $applicant->school->hei_type }}"
                                            disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <x-form.input name="general_average" disable="true" value="{{ $applicant->gwa }}"/>
                                        </div>
                                    </div>

                                    <x-form.input name="registered_voter" class="mt-4" disable="true" value="{{ $applicant->registered_voter }}"/>

                                    <x-form.row-col>
                                        <x-slot name="first">
                                            <x-form.input name="years_in_city" disable="true" value="{{ $applicant->years_in_city }}"/>
                                        </x-slot>
                                        <x-slot name="second">
                                            <x-form.input name="family_income" disable="true" value="{{ $applicant->family_income }}"/>
                                        </x-slot>
                                    </x-form.row-col>

                                    <x-form.row-col>
                                        <x-slot name="first">
                                            <x-form.input name="country" disable="true" value="{{ $applicant->address->country }}"/>
                                        </x-slot>
                                        <x-slot name="second">
                                            <x-form.input name="province" disable="true" value="{{ $applicant->address->province }}"/>
                                        </x-slot>
                                    </x-form.row-col>

                                    <x-form.input class="mt-4" name="city" disable="true" value="{{ $applicant->address->city }}"/>
                                        <x-form.input class="mt-4" name="barangay" disable="true" value="{{ $applicant->address->barangay }}"/>
                                        <x-form.input class="mt-4" name="street" disable="true" value="{{ $applicant->address->street }}"/>

                                    <x-form.row-col>
                                        <x-slot name="first">
                                            <x-form.input name="region" disable="true" value="{{ $applicant->address->region }}"/>
                                        </x-slot>
                                        <x-slot name="second">
                                            <x-form.input name="zipcode" disable="true" value="{{ $applicant->address->zipcode }}"/>
                                        </x-slot>
                                    </x-form.row-col>

                                </x-slot>
                            </x-form.row-col>

                        </x-card-primary-border>
                    </div>
                </div>
                <div class="col-lg-9 mt-4 mx-auto">
                    <div class="card shadow-sm">
                        <x-card-primary-border>
                            <div class="container d-flex justify-content-between mt-3">
                                <h2>Contact Info</h2>
                            </div>
                            <div class="container">
                                <x-form.row-col>
                                    <x-slot name="first">
                                        <x-form.input class="mt-2" name="contact_number" disable="true" value="{{ $applicant->contact->contact_number }}"/>

                                    </x-slot>
                                    <x-slot name="second">

                                        <x-form.input class="mt-2" name="email" disable="true" value="{{ $applicant->contact->email }}"/>
                                    </x-slot>
                                </x-form.row-col>
                            </div>
                            <x-form.button class="float-end me-3 mt-3">
                                Update
                            </x-form.button>
                        </x-card-primary-border>
                    </div>
                </div>
            @else
            {{-- COMPLETE PROFILE FIRST IF THERE IS NO DATA REGISTERED --}}
                <div class="col-lg-9 mt-4 mx-auto">
                    <div class="card shadow-sm">
                        <x-card-primary-border>
                            <div class="container d-flex justify-content-between mt-3">
                                <h4>Complete your profile</h4>
                            </div>

                            <form action="/profiles/{{ $applicant->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                {{-- FIRST STEP --}}
                                <div id="first-step" class="container">
                                    <x-form.row-col>
                                        <x-slot name="first">
                                            <x-form.label name="nationality (Filipino)"/>
                                            <select id="nationality" class="shadow-sm form-select form-control" name="nationality">
                                                <option selected disabled>Select</option>
                                                <option {{ $applicant->nationality == 'Yes' ? 'selected' : '' }}
                                                    value="Yes">
                                                    Yes
                                                </option>
                                                <option {{ $applicant->nationality == 'No' ? 'selected' : '' }}
                                                    value="No">
                                                    No
                                                </option>
                                            </select>
                                            <p id="nationality-message" class="text-danger position-absolute" hidden>Must be Filipino</p>
                                            <x-form.error name="nationality"/>
                                        </x-slot>
                                        <x-slot name="second">
                                            <x-form.label name="educational_attainment (College)"/>
                                            <select id="education" class="shadow-sm form-select form-control" name="educational_attainment">
                                                <option selected disabled>Select</option>
                                                <option {{ $applicant->educational_attainment == 'Yes' ? 'selected' : '' }} value="Yes">
                                                    Yes
                                                </option>
                                                <option {{ $applicant->educational_attainment == 'No' ? 'selected' : '' }} value="No">
                                                    No
                                                </option>
                                            </select>
                                            <p id="education-message" class="text-danger position-absolute" hidden>Must be incoming college or college level</p>
                                            <x-form.error name="educational_attainment"/>
                                        </x-slot>
                                    </x-form.row-col>

                                    <x-form.row-col>
                                        <x-slot name="first">
                                            <x-form.label name="registered_voter (Applicant or Guardian)"/>
                                            <select id="voter" class="shadow-sm form-select form-control" name="registered_voter">
                                                <option selected disabled>Select</option>
                                                <option
                                                    {{ $applicant->registered_voter == 'Yes' ? 'selected' : '' }}
                                                    value="Yes">Yes</option>
                                                <option
                                                    {{ $applicant->registered_voter == 'No' ? 'selected' : '' }}
                                                    value="No">No</option>
                                            </select>
                                            <p id="voter-message" class="text-danger position-absolute" hidden>Must be registered voter</p>
                                            <x-form.error name="registered_voter"/>
                                        </x-slot>
                                        <x-slot name="second">
                                            <x-form.label name="City (General Santos)"/>
                                            <select id="city" class="shadow-sm form-select form-control dynamic" name="city"
                                                id="city">
                                                <option selected disabled>Select</option>
                                                <option
                                                    {{ $applicant->address->city == 'Yes' ? 'selected' : '' }}
                                                    value="Yes">Yes</option>
                                                <option
                                                    {{ $applicant->address->city == 'No' ? 'selected' : '' }}
                                                    value="No">No</option>
                                            </select>
                                            <p id="city-message" class="text-danger position-absolute" hidden>Must be resident of General Santos</p>
                                            <x-form.error name="city"/>
                                        </x-slot>
                                    </x-form.row-col>
                                    <x-form.button id="next-step" type="button" class="float-end mt-3" disabled>
                                        Next
                                    </x-form.button>
                                </div>
                                {{-- SECOND STEP --}}
                                <div id="second-step" class="container" hidden>
                                    <x-form.row-col>
                                        <x-slot name="first">
                                            <x-form.input name="first_name" :value="old('first_name', $applicant->first_name)" />

                                            <x-form.label class="mt-4" name="middle_name (optional)"/>
                                            <input class="shadow-sm form-control" type="text" id="middle_name" name="middle_name"
                                            style="background-color: #fff;" value="{{ old('middle_name') ?? $applicant->middle_name }}">

                                            <x-form.row-col>
                                                <x-slot name="first">
                                                    <x-form.input name="last_name" :value="old('last_name', $applicant->last_name)" />
                                                </x-slot>
                                                <x-slot name="second">
                                                    <x-form.label name="gender"/>
                                                    <select class="shadow-sm form-select form-control" name="gender">
                                                        <option selected disabled>Select</option>
                                                        <option
                                                            {{ $applicant->gender === 'Male' ? 'selected' : '' }}
                                                            value="Male">Male</option>
                                                        <option
                                                            {{ $applicant->gender === 'Female' ? 'selected' : '' }}
                                                            value="Female">Female</option>
                                                    </select>
                                                    <x-form.error name="gender"/>
                                                </x-slot>
                                            </x-form.row-col>

                                            <x-form.row-col>
                                                <x-slot name="first">
                                                    <x-form.label name="civil_status"/>
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
                                                    </select>
                                                    <x-form.error name="civil_status"/>
                                                </x-slot>
                                                <x-slot name="second">
                                                    <x-form.input name="birth_date" type="date" id="birth_date" :value="old('birth_date', $applicant->birth_date)" />
                                                        <x-form.error name="birth_date"/>
                                                        <p id="16years" class="text-danger position-absolute" hidden>Must be 16 years old or above</p>
                                                        <p id="30years" class="text-danger position-absolute" hidden>Must not exceed 30 years old</p>
                                                </x-slot>
                                            </x-form.row-col>

                                            <x-form.input name="school_last_attended" class="mt-4"
                                            :value="old('school_last_attended', $applicant->school->school_last_attended)" />

                                            <x-form.label class="mt-4" name="desired_school"/>
                                            <select class="shadow-sm form-select form-control dynamic" name="desired_school"
                                                id="school" data-dependent="course">
                                                <option selected disabled>Select School</option>
                                                @foreach ($school_list as $schools)
                                                    <option value="{{ $schools->school }}">
                                                        {{ $schools->school }}</option>
                                                @endforeach
                                            </select>
                                            <x-form.error name="desired_school"/>

                                            <x-form.label class="mt-4" name="course_name"/>
                                            <select class="shadow-sm form-select form-control" name="course_name"
                                                id="course">
                                                <option selected disabled>Select</option>
                                            </select>
                                            <x-form.error name="course_name"/>

                                        </x-slot>

                                        <x-slot name="second">
                                            <x-form.label name="hei_type"/>
                                                <select class="shadow-sm form-select form-control" name="hei_type">
                                                    <option selected disabled>Select</option>
                                                    <option
                                                        {{ $applicant->school->hei_type === 'Public' ? 'selected' : '' }}
                                                        value="Public">Public</option>
                                                    <option
                                                        {{ $applicant->school->hei_type === 'Private' ? 'selected' : '' }}
                                                        value="Private">Private</option>
                                                </select>
                                            <x-form.error name="hei_type"/>

                                            <x-form.input class="mt-4" name="gwa" :value="old('gwa', $applicant->gwa)"
                                                onkeypress="return /[0-9.]/i.test(event.key)" maxlength="5" min="70" max="99"/>

                                            <x-form.input class="mt-4" name="contact_number" type="tel" :value="old('contact_number', $applicant->contact->contact_number)"
                                                onkeypress="return /[0-9]/i.test(event.key)" maxlength="11"/>

                                            <x-form.input class="mt-4" name="email" :value="old('email', $applicant->contact->email)"/>

                                            <x-form.row-col>
                                                <x-slot name="first">
                                                    <x-form.label name="years_in_city"/>
                                                    <select class="shadow-sm form-select form-control" name="years_in_city">
                                                        <option selected disabled>Select</option>
                                                        @for ($i = 1; $i <= 3; $i++)
                                                            <option
                                                                {{ $applicant->years_in_city == $i ? 'selected'
                                                                : (old('years_in_city') == $i ? 'selected' : '' )}}
                                                                value="{{ $i }}"> {{ $i }}@if($i == 3)+ @endif
                                                            </option>
                                                        @endfor
                                                    </select>
                                                    <x-form.error name="years_in_city"/>
                                                </x-slot>

                                                <x-slot name="second">
                                                    <x-form.label name="family_income (Monthly)"/>
                                                    <select class="shadow-sm form-select form-control" name="family_income">
                                                        <option selected disabled>Select</option>
                                                        <option
                                                            {{ $applicant->family_income == 'Less than ₱10,957' ? 'selected' : '' }}
                                                            value="Less than ₱10,957">Less than ₱10,957</option>
                                                        <option
                                                            {{ $applicant->family_income == '₱10,957 to ₱21,194' ? 'selected' : '' }}
                                                            value="₱10,957 to ₱21,194">₱10,957 to ₱21,194</option>
                                                        <option
                                                            {{ $applicant->family_income == '₱21,194 to ₱43,828' ? 'selected' : '' }}
                                                            value="₱21,194 to ₱43,828">₱21,194 to ₱43,828</option>
                                                        <option
                                                            {{ $applicant->family_income == '₱43,828 to ₱76,669' ? 'selected' : '' }}
                                                            value="₱43,828 to ₱76,669">₱43,828 to ₱76,669</option>
                                                        <option
                                                            {{ $applicant->family_income == '₱76,669 to ₱131,484' ? 'selected' : '' }}
                                                            value="₱76,669 to ₱131,484">₱76,669 to ₱131,484</option>
                                                        <option
                                                            {{ $applicant->family_income == '₱131,484 to ₱219,140' ? 'selected' : '' }}
                                                            value="₱131,484 to ₱219,140">₱131,484 to ₱219,140</option>
                                                        <option
                                                            {{ $applicant->family_income == '₱219,140 and above' ? 'selected' : '' }}
                                                            value="₱219,140 and above">₱219,140 and above</option>
                                                    </select>
                                                    <x-form.error name="family_income"/>
                                                </x-slot>
                                            </x-form.row-col>

                                            <x-form.label class="mt-4" name="barangay"/>
                                            <select class="shadow-sm form-select form-control" name="barangay"
                                                id="barangay">
                                                <option selected disabled>Select</option>
                                            </select>
                                            <x-form.error name="barangay"/>

                                            <x-form.input class="mt-4" name="street" :value="old('street', $applicant->address->street)"/>

                                        </x-slot>
                                    </x-form.row-col>

                                    <x-form.button class="float-end mt-3">
                                        Submit
                                    </x-form.button>
                                </div>
                            </form>

                        </x-card-primary-border>
                    </div>
                </div>
            @endif

        </x-container>
    </section>
</x-layout>

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
                    url: "{{ route('dynamicdropdowncontroller.fetch') }}",
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

    let nationality = ''
    let education = ''
    let voter = ''
    let city = ''

    document.querySelector('#nationality').addEventListener('change', (e) => {
        nationality = document.querySelector('#nationality').value
        if(nationality === 'No'){
            document.querySelector('#nationality-message').hidden = false
            document.querySelector('#nationality').classList = 'border-danger shadow-sm form-control'
        }else{
            document.querySelector('#nationality-message').hidden = true
            document.querySelector('#nationality').classList = 'shadow-sm form-control'
        }
        enableButton()
    })

    document.querySelector('#education').addEventListener('change', (e) => {
        education = document.querySelector('#education').value
        if(education === 'No'){
            document.querySelector('#education-message').hidden = false
            document.querySelector('#education').classList = 'border-danger shadow-sm form-control'
        }else{
            document.querySelector('#education-message').hidden = true
            document.querySelector('#education').classList = 'shadow-sm form-control'
        }
        enableButton()
    })

    document.querySelector('#voter').addEventListener('change', (e) => {
        voter = document.querySelector('#voter').value
        if(voter === 'No'){
            document.querySelector('#voter-message').hidden = false
            document.querySelector('#voter').classList = 'border-danger shadow-sm form-control'
        }else{
            document.querySelector('#voter-message').hidden = true
            document.querySelector('#voter').classList = 'shadow-sm form-control'
        }
        enableButton()
    })

    document.querySelector('#city').addEventListener('change', (e) => {
        city = document.querySelector('#city').value
        if(city === 'No'){
            document.querySelector('#city-message').hidden = false
            document.querySelector('#city').classList = 'border-danger shadow-sm form-control'
        }else{
            document.querySelector('#city-message').hidden = true
            document.querySelector('#city').classList = 'shadow-sm form-control'
        }
        enableButton()
    })

    function enableButton(){
        let nextButton = document.querySelector('#next-step')
        if(nationality == 'Yes' && education == 'Yes' && voter == 'Yes' && city == 'Yes' ){
            nextButton.disabled = false
            nextButton.addEventListener('click', (e) => {
                if(nationality == 'Yes' && education == 'Yes' && voter == 'Yes' && city == 'Yes' ){
                    document.querySelector('#first-step').hidden = true
                    document.querySelector('#second-step').hidden = false
                }

            })
        }else{
            nextButton.disabled = true
        }
    }

</script>
