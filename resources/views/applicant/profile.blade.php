<x-layout title="Profile | Settings">
    <section>
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

                <div class="col-lg-9 mt-4">
                    <div class="card shadow-sm">
                        <x-card-primary-border>
                            <div class="container d-flex justify-content-between mt-3">
                                <h2>Profile</h2>
                                <a href="/profiles/{{ $applicant->id }}/edit"
                                    style="font-size: 16px; text-decoration: none;">
                                    <i class="bi bi-pencil-square">&nbsp;</i>Edit Profile</a>
                            </div>
                            <div class="container mb-4 mt-4">
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
                                                <x-form.input name="age" disable="true" value="{{ $applicant->age }}"/>
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

                                        <x-form.input class="mt-2" name="educational_attainment" disable="true" value="{{ $applicant->educational_attainment }}"/>
                                        <x-form.input class="mt-2" name="school_last_attended" disable="true" value="{{ $applicant->school->school_last_attended }}"/>
                                        <x-form.input class="mt-2" name="desired_school" disable="true" value="{{ $applicant->school->desired_school }}"/>
                                        <x-form.input class="mt-2" name="course_name" disable="true" value="{{ $applicant->school->course_name }}"/>

                                        <x-form.row-col>
                                            <x-slot name="first">
                                                <x-form.input name="hei_type" disable="true" value="{{ $applicant->school->hei_type }}"/>
                                            </x-slot>
                                            <x-slot name="second">
                                                <x-form.input name="general_average" disable="true" value="{{ $applicant->gwa }}"/>
                                            </x-slot>
                                        </x-form.row-col>
                                    </x-slot>
                                    <x-slot name="second">
                                        <x-form.input name="registered_voter" disable="true" value="{{ $applicant->registered_voter }}"/>
                                        <x-form.input class="mt-2" name="contact_number" disable="true" value="{{ $applicant->contact->contact_number }}"/>
                                        <x-form.input class="mt-2" name="email" disable="true" value="{{ $applicant->contact->email }}"/>

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

                                        <x-form.input class="mt-2" name="city" disable="true" value="{{ $applicant->address->city }}"/>
                                        <x-form.input class="mt-2" name="barangay" disable="true" value="{{ $applicant->address->barangay }}"/>
                                        <x-form.input class="mt-2" name="street" disable="true" value="{{ $applicant->address->street }}"/>

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
                            </div>
                        </x-card-primary-border>
                    </div>
                </div>
            </div>
        </x-container>
    </section>
</x-layout>
