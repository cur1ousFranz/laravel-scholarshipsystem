<x-layout>
    <x-container>
        <div class="row">
            <div class="col-lg-3">
                <div class="card shadow-sm mt-4">
                    <x-card-primary-border>
                        <div class="d-flex flex-column align-items-center text-center py-3">
                            <img src="{{ asset('storage/img/profile-img.jpg') }}" alt=""
                            class="rounded-circle mb-2 img-fluid" width="150px">
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
                    </x-card-primary-border>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card shadow-sm mt-4">
                    <x-card-primary-border>
                        <form action="/profiles/{{ $applicant->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="container mt-3">
                                <h2>Edit Profile</h2>
                            </div>
                            <div class="container mb-4 mt-4">
                                <x-form.row-col>
                                    <x-slot name="first">
                                        <x-form.input name="first_name" :value="old('first_name', $applicant->first_name)" />

                                        <x-form.row-col>
                                            <x-slot name="first">
                                                <x-form.input name="middle_name" :value="old('middle_name', $applicant->middle_name)" />
                                            </x-slot>
                                            <x-slot name="second">
                                                <x-form.input name="last_name" :value="old('middle_name', $applicant->last_name)" />
                                            </x-slot>
                                        </x-form.row-col>

                                        <x-form.row-col>
                                            <x-slot name="first">
                                                <x-form.input name="age" :value="old('age', $applicant->age)" />
                                            </x-slot>
                                            <x-slot name="second">
                                                <x-form.input name="gender" :value="old('gender', $applicant->gender)" />
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
                                                    <option
                                                        {{ $applicant->civil_status === 'Divorced' ? 'selected' : '' }}
                                                        value="Divorced">Divorced</option>
                                                </select>
                                                <x-form.error name="civil_status"/>
                                            </x-slot>
                                            <x-slot name="second">
                                                <x-form.label name="nationality"/>
                                                <select class="shadow-sm form-select form-control" name="nationality">
                                                    <option selected disabled>Select</option>
                                                    @foreach ($nationalities as $nationality)
                                                        <option {{ ($nationality->name === $applicant->nationality) ? 'selected'
                                                        : ($nationality->name === old('nationality') ? 'selected' : '') }}
                                                            value="{{  $nationality->name }}">
                                                            {{  $nationality->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <x-form.error name="nationality"/>
                                            </x-slot>
                                        </x-form.row-col>

                                        <x-form.label class="mt-2" name="educational_attainment"/>
                                        <select class="shadow-sm form-select form-control" name="educational_attainment">
                                            <option selected disabled>Select</option>
                                            @foreach ($educational as $education)
                                            <option  {{ $applicant->educational_attainment === $education->name ? 'selected'
                                            : (old('educational_attainment') === $education->name ? 'selected' : '') }}
                                                value="{{ $education->name }}">{{ $education->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-form.error name="educational_attainment"/>

                                        <x-form.input name="school_last_attended" class="mt-2"
                                        :value="old('school_last_attended', $applicant->school->school_last_attended)" />

                                        <x-form.label class="mt-2" name="desired_school"/>
                                        <select class="shadow-sm form-select form-control dynamic" name="desired_school"
                                            id="school" data-dependent="course">
                                            <option selected disabled>Select School</option>
                                            @foreach ($school_list as $schools)
                                                <option value="{{ $schools->school }}">
                                                    {{ $schools->school }}</option>
                                            @endforeach
                                        </select>
                                        <x-form.error name="desired_school"/>

                                        <x-form.label class="mt-2" name="course_name"/>
                                        <select class="shadow-sm form-select form-control" name="course_name"
                                            id="course">
                                            <option selected disabled>Select</option>
                                        </select>
                                        <x-form.error name="course_name"/>

                                        <x-form.row-col>
                                            <x-slot name="first">
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
                                            </x-slot>
                                            <x-slot name="second">
                                                <x-form.input name="gwa" :value="old('gwa', $applicant->gwa)" type="number"
                                                    onkeypress="return /[0-9.]/i.test(event.key)" maxlength="5" min="70" max="99"/>
                                            </x-slot>
                                        </x-form.row-col>
                                    </x-slot>

                                    <x-slot name="second">
                                        <x-form.label name="registered_voter"/>
                                        <select class="shadow-sm form-select form-control" name="registered_voter">
                                            <option selected disabled>Select</option>
                                            <option
                                                {{ $applicant->registered_voter == 'Yes' ? 'selected' : '' }}
                                                value="Yes">Yes</option>
                                            <option
                                                {{ $applicant->registered_voter == 'No' ? 'selected' : '' }}
                                                value="No">No</option>
                                        </select>
                                        <x-form.error name="registered_voter"/>

                                        <x-form.input class="mt-2" name="contact_number" type="tel" :value="old('contact_number', $applicant->contact->contact_number)"
                                            onkeypress="return /[0-9]/i.test(event.key)" maxlength="11"/>

                                        <x-form.input class="mt-2" name="email" :value="old('email', $applicant->contact->email)"/>

                                        <x-form.row-col>
                                            <x-slot name="first">
                                                <x-form.label name="years_in_city"/>
                                                <select class="shadow-sm form-select form-control" name="years_in_city">
                                                    <option selected disabled>Select</option>
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <option
                                                            {{ $applicant->years_in_city == $i ? 'selected'
                                                            : (old('years_in_city') == $i ? 'selected' : '' )}}
                                                            value="{{ $i }}"> {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                                <x-form.error name="years_in_city"/>
                                            </x-slot>
                                            <x-slot name="second">
                                                <x-form.label name="family_income"/>
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
                                                        {{ $applicant->family_income == 24000 ? 'selected' : '' }}
                                                        value="24000">24,000 PHP</option>
                                                </select>
                                                <x-form.error name="family_income"/>
                                            </x-slot>
                                        </x-form.row-col>

                                        {{-- DYNAMIC DROPDOWNS OF ADDRESS --}}
                                        <x-form.row-col>
                                            <x-slot name="first">
                                                <x-form.label name="country"/>
                                                <select class="shadow-sm form-select form-control dynamic" name="country"
                                                    id="country" data-dependent="province">
                                                    <option selected disabled>Select</option>

                                                    @foreach ($dynamic_address as $country)
                                                    <option value="{{ $country->country }}">
                                                        {{ $country->country }}</option>
                                                    @endforeach
                                                </select>
                                                <x-form.error name="country"/>
                                            </x-slot>
                                            <x-slot name="second">
                                                <x-form.label name="province"/>
                                                <select class="shadow-sm form-select form-control dynamic" name="province"
                                                    id="province" data-dependent="city">
                                                    <option selected disabled>Select</option>

                                                </select>
                                                <x-form.error name="province"/>
                                            </x-slot>
                                        </x-form.row-col>

                                        <x-form.label class="mt-2" class="mt-2" name="city"/>
                                        <select class="shadow-sm form-select form-control dynamic" name="city"
                                            id="city" data-dependent="barangay">
                                            <option selected disabled>Select</option>
                                        </select>
                                        <x-form.error name="city"/>

                                        <x-form.label class="mt-2" name="barangay"/>
                                        <select class="shadow-sm form-select form-control" name="barangay"
                                            id="barangay">
                                            <option selected disabled>Select</option>
                                        </select>
                                        <x-form.error name="barangay"/>

                                        <x-form.input class="mt-2" name="street" :value="old('street', $applicant->address->street)"/>

                                        <x-form.row-col>
                                            <x-slot name="first">
                                                <x-form.label name="region"/>
                                                <select class="shadow-sm form-select form-control" name="region">
                                                    <option selected disabled>Select</option>
                                                    @for ($i = 1; $i <= 12; $i++)
                                                        <option
                                                            {{ $applicant->address->region == $i ? 'selected' : '' }}
                                                            value="{{ $i }}">
                                                            {{ $i }}</option>
                                                    @endfor
                                                </select>
                                                <x-form.error name="region"/>
                                            </x-slot>
                                            <x-slot name="second">
                                                <x-form.input name="zipcode" :value="old('zipcode', $applicant->address->zipcode)"
                                                    onkeypress="return /[0-9]/i.test(event.key)" maxlength="4"/>
                                            </x-slot>
                                        </x-form.row-col>
                                    </x-slot>
                                </x-form.row-col>
                            </div>
                            <x-form.button class="float-end">
                                Save
                            </x-form.button>
                        </form>
                    </x-card-primary-border>
                </div>
            </div>
        </div>
    </x-container>
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
                url: "{{ route('dynamicdropdowncontroller.fetchAddress') }}",
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
