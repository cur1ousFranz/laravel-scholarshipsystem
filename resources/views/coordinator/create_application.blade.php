<x-layout title="Create Application">
    <section>
        <x-container>
            <div class="container-fluid d-flex justify-content-center mb-5">
                <div class="card w-75 shadow-sm">
                    <div class="card-body border-top border-top-4 border-primary">
                        <form action="/applications/create" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h2 class="text-center">Create Application</h2>
                            <hr>
                            <h5 class="mt-5">Application Details</h5>
                            <div class="d-flex justify-content-around mt-3">
                                <div class="row">
                                    <div class="col-lg">
                                        <x-form.label name="slots"/>
                                        <select class="shadow-sm form-select form-control" name="slots">
                                            <option selected disabled>Select</option>
                                            <option value="100" {{ old('slots') == 100 ? 'selected' : '' }}>100</option>
                                            <option value="200" {{ old('slots') == 200 ? 'selected' : '' }}>200</option>
                                            <option value="300" {{ old('slots') == 300 ? 'selected' : '' }}>300</option>
                                        </select>
                                        <x-form.error name="slots"/>
                                    </div>

                                    <div class="col-lg">
                                        <x-form.input name="start_date" readonly="true" :value="date('Y-m-d', time())"/>
                                    </div>

                                    <div class="col-lg">
                                        <x-form.input name="end_date" type="date" :value="old('end_date')"/>
                                    </div>

                                    <div class="col-lg">
                                        <x-form.input name="batch" :value="old('batch')"/>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <h5 class="mt-3">Description</h5>
                            <textarea id="editor" name="description">{{ old('description') }}</textarea>
                            <x-form.error name="description"/>

                            <hr>
                            <h5 class="mt-4">Pre-evaluation</h5>
                            <div class="row">
                                <div class="col-lg-6 mt-2">
                                    <x-form.label name="educational_attainement"/>
                                    <select class="shadow-sm form-select form-control" name="educational_attainment">
                                        <option selected disabled>Select</option>
                                        <option {{ old('educational_attainment') == 'Incoming College / College' ? 'selected' : '' }} value="Incoming College / College">Incoming College / College
                                        </option>
                                    </select>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mt-3">
                                                <x-form.label name="family_income"/>
                                                <select class="shadow-sm form-select form-control" name="family_income">
                                                    <option selected disabled>Select</option>
                                                    <option {{ old('family_income') == 8000 ? 'selected' : '' }} value="8000">8,000 PHP</option>
                                                    <option {{ old('family_income') == 12000 ? 'selected' : '' }} value="12000">12,000 PHP</option>
                                                    <option {{ old('family_income') == 16000 ? 'selected' : '' }} value="16000">16,000 PHP</option>
                                                    <option {{ old('family_income') == 20000 ? 'selected' : '' }} value="20000">20,000 PHP</option>
                                                    <option {{ old('family_income') == 20000 ? 'selected' : '' }} value="20000">25,000 PHP</option>
                                                </select>
                                                <x-form.error name="family_income"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mt-3">
                                                <x-form.label name="general_average"/>
                                                <select class="shadow-sm form-select form-control" name="gwa">
                                                    <option selected disabled>Select</option>
                                                    <option {{ old('gwa') == 75 ? 'selected' : '' }} value="75">75</option>
                                                    <option {{ old('gwa') == 80 ? 'selected' : '' }} value="80">80</option>
                                                    <option {{ old('gwa') == 85 ? 'selected' : '' }} value="85">85</option>
                                                    <option {{ old('gwa') == 90 ? 'selected' : '' }} value="90">90</option>
                                                    <option {{ old('gwa') == 95 ? 'selected' : '' }} value="95">95</option>
                                                </select>
                                                <x-form.error name="gwa"/>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6 mt-2">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <x-form.label name="city"/>
                                            <select class="shadow-sm form-select form-control" name="city">
                                                <option selected disabled>Select</option>
                                                <option {{ old('city') == "General Santos City" ? 'selected' : '' }}
                                                value="General Santos City">General Santos City</option>
                                            </select>
                                            <x-form.error name="city"/>
                                        </div>
                                        <div class="col-lg-6">
                                            <x-form.label name="registered_voter"/>
                                            <select class="shadow-sm form-select form-control" name="registered_voter">
                                                <option selected disabled>Select</option>
                                                <option {{ old('registered_voter') == "Yes" ? 'selected' : '' }} value="Yes">Yes</option>
                                            </select>
                                            <x-form.error name="registered_voter"/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mt-3">
                                                <x-form.label name="years_in_city"/>
                                                <select class="shadow-sm form-select form-control" name="years_in_city">
                                                    <option selected disabled>Select</option>
                                                    <option {{ old('years_in_city') == "1" ? 'selected' : '' }} value="1">1 year</option>
                                                    <option {{ old('years_in_city') == "2" ? 'selected' : '' }} value="2">2 years</option>
                                                    <option {{ old('years_in_city') == "3" ? 'selected' : '' }} value="3">3 years</option>
                                                    <option {{ old('years_in_city') == "4" ? 'selected' : '' }} value="4">4 years</option>
                                                    <option {{ old('years_in_city') == "5" ? 'selected' : '' }} value="5">5 years</option>
                                                </select>
                                                <x-form.error name="years_in_city"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mt-3">
                                                <x-form.label name="nationality"/>
                                                <select class="shadow-sm form-select form-control" name="nationality">
                                                    <option selected disabled>Select</option>
                                                    <option {{ old('nationality') == "Filipino" ? 'selected' : '' }} value="Filipino">Filipino</option>
                                                </select>
                                                <x-form.error name="nationality"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h5 class="mt-4">Step 1: Pre-registration</h5>
                            <p>Pre-registration will automatically read by the system based on applicant basic information.
                            </p>
                            <hr>
                            <div class="row mt-4">
                                <div class="col-lg">
                                    <h5 class="mt-2">Step 2: Documentary Requirements</h5>
                                </div>
                                <div class="col-lg">
                                    <input type="file" name="documentary_requirement" class="shadow-sm form-control" accept="application/pdf" value="{{ old('documentary_requirement') }}">
                                    <x-form.error name="documentary_requirement"/>
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-4">
                                <div class="col-lg">
                                    <h5 class="mt-2">Step 3: Application Form</h5>
                                </div>
                                <div class="col-lg">
                                    <input type="file" name="application_form" class="shadow-sm form-control" accept="application/pdf" value="{{ old('application_form') }}">
                                    <x-form.error name="application_form"/>
                                </div>
                            </div>
                            <hr>
                            <x-form.button class="form-control">Create</x-form.button>
                        </form>
                    </div>
                </div>
            </div>
        </x-container>
    </section>
</x-layout>


