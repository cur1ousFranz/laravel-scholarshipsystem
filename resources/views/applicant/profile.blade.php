<x-layout title="Profile | Settings">
    <section>
        <x-container>
            @if ($applicant->first_name)
                <div class="col-lg-9 mt-4 mx-auto">
                    <div class="card shadow-sm">
                        <x-card-primary-border>
                            <div class="d-flex justify-content-between">
                                <h2>Basic Info</h2>
                                @if ($application != null)
                                    <a href="{{route('apply')}}" class="btn btn-outline-primary shadow-sm h-100">
                                        Apply Now
                                        <i class="bi bi-arrow-right-circle ms-1"></i>
                                    </a>
                                @else
                                    <button class="btn btn-outline-secondary shadow-sm h-100" disabled>
                                        Apply Now
                                        <i class="bi bi-arrow-right-circle ms-1"></i>
                                    </button>
                                @endif
                                {{-- <a href="{{ $application != null ? route('apply') : '' }}"
                                 class="{{ $application != null ? 'btn btn-outline-primary shadow-sm h-100'
                                 : 'btn btn-outline-secondary shadow-sm h-100' }}" {{ $application != null ? '' : 'disabled' }}>
                                    Apply Now
                                    <i class="bi bi-arrow-right-circle ms-1"></i>
                                </a> --}}
                            </div>
                            <x-form.row-col>
                                <x-slot name="first">
                                    <x-form.input name="first_name" disable="true" value="{{ $applicant->first_name }}"/>

                                    <x-form.input class="mt-4" name="middle_name" disable="true" value="{{ $applicant->middle_name }}"/>

                                    <x-form.row-col>
                                        <x-slot name="first">
                                            <x-form.input name="last_name" disable="true" value="{{ $applicant->last_name }}"/>
                                        </x-slot>
                                        <x-slot name="second">
                                            <x-form.input name="birth_date" disable="true" value="{{ $applicant->birth_date }}"/>
                                        </x-slot>
                                    </x-form.row-col>

                                    <x-form.row-col>
                                        <x-slot name="first">
                                            <x-form.input name="gender" disable="true" value="{{ $applicant->gender }}"/>
                                        </x-slot>
                                        <x-slot name="second">
                                            <x-form.input name="civil_status" disable="true" value="{{ $applicant->civil_status }}"/>
                                        </x-slot>
                                    </x-form.row-col>

                                    <x-form.input class="mt-4" name="nationality" disable="true" value="{{ $applicant->nationality }}"/>

                                    <x-form.input class="mt-4" name="educational_attainment" disable="true" value="{{ $applicant->educational_attainment }}"/>

                                    <x-form.input class="mt-4" name="desired_school" disable="true" value="{{ $applicant->school->desired_school }}"/>
                                    <x-form.input class="mt-4" name="course_name" disable="true" value="{{ $applicant->school->course_name }}"/>

                                </x-slot>

                                <x-slot name="second">

                                    <x-form.input name="general_average" disable="true" value="{{ $applicant->gwa }}"/>

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
                            <form action="/profile/{{ $applicant->id }}/contact" method="POST">
                                <div class="container">
                                    @csrf
                                    @method('PUT')
                                    <x-form.row-col>
                                        <x-slot name="first">
                                            <x-form.input class="mt-2" name="contact_number"
                                            value="{{ old('contact_number') ?? $applicant->contact->contact_number }}"
                                            onkeypress="return /[0-9]/i.test(event.key)" maxlength="11"/>
                                        </x-slot>
                                        <x-slot name="second">

                                            <x-form.input class="mt-2" name="email" value="{{ old('email') ?? $applicant->contact->email }}"/>
                                        </x-slot>
                                    </x-form.row-col>
                                </div>
                                <x-form.button class="float-end me-3 mt-3">
                                    Save
                                </x-form.button>
                            </form>
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
                            <form action="/profile/{{ $applicant->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                {{-- FIRST STEP --}}
                                <div id="first-step" class="container">
                                    <x-form.row-col>
                                        <x-slot name="first">
                                            <x-form.label name="nationality (Filipino)"/>
                                            <select id="nationality" class="shadow-sm form-select form-control" name="nationality">
                                                <option selected disabled>Select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                            <p id="nationality-message" class="text-danger position-absolute" hidden>Must be Filipino</p>
                                            <x-form.error name="nationality"/>
                                        </x-slot>
                                        <x-slot name="second">
                                            <x-form.label name="educational_attainment (College)"/>
                                            <select id="education" class="shadow-sm form-select form-control" name="educational_attainment">
                                                <option selected disabled>Select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
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
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                            <p id="voter-message" class="text-danger position-absolute" hidden>Must be registered voter</p>
                                            <x-form.error name="registered_voter"/>
                                        </x-slot>
                                        <x-slot name="second">
                                            <x-form.label name="City (General Santos)"/>
                                            <select id="city" class="shadow-sm form-select form-control" name="city"
                                                id="city">
                                                <option selected disabled>Select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
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
                                            <x-form.input id="first_name" name="first_name" :value="old('first_name', $applicant->first_name)" />

                                            <x-form.label class="mt-4" name="middle_name (optional)"/>
                                            <input class="shadow-sm form-control" type="text" id="middle_name" name="middle_name"
                                            style="background-color: #fff;" value="{{ old('middle_name') ?? $applicant->middle_name }}">

                                            <x-form.row-col>
                                                <x-slot name="first">
                                                    <x-form.input id="last_name" name="last_name" :value="old('last_name', $applicant->last_name)" />
                                                </x-slot>
                                                <x-slot name="second">
                                                    <x-form.label name="gender"/>
                                                    <select id="gender" class="shadow-sm form-select form-control" name="gender">
                                                        <option selected disabled>Select</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                    <x-form.error name="gender"/>
                                                </x-slot>
                                            </x-form.row-col>

                                            <x-form.row-col>
                                                <x-slot name="first">
                                                    <x-form.label name="civil_status"/>
                                                    <select id="civil_status" class="shadow-sm form-select form-control" name="civil_status">
                                                        <option selected disabled>Select</option>
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Widowed">Widowed </option>
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

                                            <x-form.input id="gwa" name="gwa" :value="old('gwa', $applicant->gwa)"
                                                onkeypress="return /[0-9.]/i.test(event.key)" maxlength="5" min="70" max="99"/>

                                            <x-form.input id="contact_number" class="mt-4" name="contact_number" type="tel" :value="old('contact_number', $applicant->contact->contact_number)"
                                                onkeypress="return /[0-9]/i.test(event.key)" maxlength="11"/>

                                            <x-form.input id="email" class="mt-4" name="email" :value="old('email', $applicant->contact->email)"/>

                                            <x-form.row-col>
                                                <x-slot name="first">
                                                    <x-form.label name="years_in_city"/>
                                                    <select id="years_in_city" class="shadow-sm form-select form-control" name="years_in_city">
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
                                                    @php
                                                        $range = json_decode($family_incomes->range, true);

                                                        $bracket2 = explode('-', $range['bracket2']);
                                                        $bracket3 = explode('-', $range['bracket3']);
                                                        $bracket4 = explode('-', $range['bracket4']);
                                                        $bracket5 = explode('-', $range['bracket5']);
                                                        $bracket6 = explode('-', $range['bracket6']);
                                                        $bracket7 = explode('-', $range['bracket7']);

                                                    @endphp
                                                    <x-form.label name="family_income (Monthly)"/>
                                                    <select id="family_income" class="shadow-sm form-select form-control" name="family_income">
                                                        <option value="{{ $range['bracket1'] }}" selected>{{ 'Less than ₱' . number_format($range['bracket1']) }}</option>
                                                        <option value="{{ $range['bracket2'] }}">
                                                            {{ '₱'.number_format($bracket2[0]) . ' to ' . '₱'.number_format($bracket2[1]) }}
                                                        </option>
                                                        <option value="{{ $range['bracket3'] }}">
                                                            {{ '₱'.number_format($bracket3[0]) . ' to ' . '₱'.number_format($bracket3[1]) }}
                                                        </option>
                                                        <option value="{{ $range['bracket4'] }}">
                                                            {{ '₱'.number_format($bracket4[0]) . ' to ' . '₱'.number_format($bracket4[1]) }}
                                                        </option>
                                                        <option value="{{ $range['bracket5'] }}">
                                                            {{ '₱'.number_format($bracket5[0]) . ' to ' . '₱'.number_format($bracket5[1]) }}
                                                        </option>
                                                        <option value="{{ $range['bracket6'] }}">
                                                            {{ '₱'.number_format($bracket6[0]) . ' to ' . '₱'.number_format($bracket6[1]) }}
                                                        </option>
                                                        <option value="{{ $range['bracket7'] }}">
                                                            {{ '₱'.number_format($range['bracket7']) . ' and above' }}
                                                        </option>
                                                    </select>
                                                    <x-form.error name="family_income"/>
                                                </x-slot>
                                            </x-form.row-col>

                                            <x-form.label class="mt-4" name="barangay"/>
                                            <select id="barangay" class="shadow-sm form-select form-control" name="barangay"
                                                id="barangay">
                                                <option selected disabled>Select</option>
                                                @foreach ($barangays as $barangay)
                                                    <option value="{{ $barangay->barangay }}">{{ $barangay->barangay }}</option>
                                                @endforeach
                                            </select>
                                            <x-form.error name="barangay"/>

                                            <x-form.input id="street" id="street" class="mt-4" name="street" :value="old('street', $applicant->address->street)"/>

                                        </x-slot>
                                    </x-form.row-col>
                                    <x-form.button id="submit-btn" class="float-end mt-3" disabled>
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

    // STEP 1 MAIN PROFILE COMPLETION
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

    // STEP 2 BASIC PROFILE COMPLETION
    let first_name = ''
    let last_name = ''
    let gender = ''
    let civil_status = ''
    let birth_date = ''
    let desired_school = ''
    let course_name = ''
    let gwa = ''
    let contact_number = ''
    let email = document.querySelector('#email').getElementsByTagName('input')[0].value
    let years_in_city = ''
    let family_income = ''
    let barangay = ''
    let street = ''

    document.querySelector('#first_name').addEventListener('change', (e) => {
        let element = document.querySelector('#first_name')
        first_name = element.getElementsByTagName('input')[0].value
        enableSubmit()
    })
    document.querySelector('#last_name').addEventListener('change', (e) => {
        let element = document.querySelector('#last_name')
        last_name = element.getElementsByTagName('input')[0].value
        enableSubmit()
    })
    document.querySelector('#gender').addEventListener('change', (e) => {
        let element = document.querySelector('#gender')
        gender = element.value
        enableSubmit()
    })
    document.querySelector('#civil_status').addEventListener('change', (e) => {
        let element = document.querySelector('#civil_status')
        civil_status = element.value
        enableSubmit()
    })
    document.querySelector('#school').addEventListener('change', (e) => {
        let element = document.querySelector('#school')
        desired_school = element.value
        enableSubmit()
    })
    document.querySelector('#course').addEventListener('change', (e) => {
        let element = document.querySelector('#course')
        course_name = element.value
        enableSubmit()
    })
    document.querySelector('#gwa').addEventListener('change', (e) => {
        let element = document.querySelector('#gwa')
        gwa = element.getElementsByTagName('input')[0].value
        enableSubmit()
    })
    document.querySelector('#contact_number').addEventListener('change', (e) => {
        let element = document.querySelector('#contact_number')
        contact_number = element.getElementsByTagName('input')[0].value
        enableSubmit()
    })
    document.querySelector('#email').addEventListener('change', (e) => {
        let element = document.querySelector('#email')
        email = element.getElementsByTagName('input')[0].value
        enableSubmit()
    })
    document.querySelector('#years_in_city').addEventListener('change', (e) => {
        let element = document.querySelector('#years_in_city')
        years_in_city = element.value
        enableSubmit()
    })
    document.querySelector('#family_income').addEventListener('change', (e) => {
        let element = document.querySelector('#family_income')
        family_income = element.value
        enableSubmit()
    })
    document.querySelector('#barangay').addEventListener('change', (e) => {
        let element = document.querySelector('#barangay')
        barangay = element.value
        enableSubmit()
    })
    document.querySelector('#street').addEventListener('change', (e) => {
        let element = document.querySelector('#street')
        street = element.getElementsByTagName('input')[0].value
        enableSubmit()
    })

    // Birth date validation
    const div = document.getElementById('birth_date')
    div.addEventListener('change', (e) => {

        let birthDate = div.getElementsByTagName('input')[0]
        let diff_ms = Date.now() - new Date(birthDate.value)
        let age_dt = new Date(diff_ms);
        const year = Math.abs(age_dt.getUTCFullYear() - 1970)

        if(year < 16){
            birthDate.classList = 'border-danger shadow-sm form-control'
            document.getElementById('16years').hidden = false
            document.getElementById('30years').hidden = true
            document.querySelector('#submit-btn').disabled = true
        }

        if(year > 30){
            birthDate.classList = 'border-danger shadow-sm form-control'
            document.getElementById('30years').hidden = false
            document.getElementById('16years').hidden = true
            document.querySelector('#submit-btn').disabled = true
        }

        if(year > 15 && year <= 30){
            birthDate.classList = 'shadow-sm form-control'
            document.getElementById('16years').hidden = true
            document.getElementById('30years').hidden = true
            birth_date = birthDate.value
            enableSubmit()
        }
    })

    function enableSubmit(){
        if(first_name && last_name && gender && civil_status && birth_date && desired_school && course_name
         && gwa && contact_number && email && years_in_city && family_income && barangay && street){
            document.querySelector('#submit-btn').disabled = false
         }else{
            document.querySelector('#submit-btn').disabled = true
         }
    }

</script>
