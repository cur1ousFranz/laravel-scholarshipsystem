<x-layout>
    <section>
        <x-container>
            <div class="container-fluid mb-5">
                <div class="container m-auto w-75">

                    <div class="card shadow-sm">
                        <x-card-primary-border>
                            <form action="/applications/{{ $application->id }}/details" method="post">
                                @csrf
                                @method('PATCH')
                                <h2 class="text-center">Edit Application Details</h2>
                                <hr>
                                <div class="row mt-3">
                                    <div class="col-lg mt-1">
                                        <x-form.label name="slots"/>
                                        <select class="shadow-sm form-select form-control" name="slots">
                                            <option value="{{ old('slots') ?? $application->slots }}" selected>
                                                {{ old('slots') ?? $application->slots }}
                                            </option>
                                            <option value="100">100</option>
                                            <option value="200">200</option>
                                            <option value="300">300</option>
                                        </select>
                                        <x-form.error name="slots"/>
                                    </div>

                                    <x-form.input class="col-lg mt-1" name="start_date" :value="$application->start_date" readonly="true"/>
                                    <x-form.input class="col-lg mt-1" name="end_date" :value="$application->end_date" type="date"/>
                                    <x-form.input class="col-lg mt-1" name="batch" :value="$application->batch"/>
                                </div>

                                <hr>
                                <h5 class="mt-3">Description</h5>

                                    <textarea id="editor" name="description">
                                        {{ old('description') ?? $application->applicationDetail->description }}
                                    </textarea>
                                    <x-form.error name="description"/>

                                    <hr>
                                    <h5 class="mt-4">Pre-evaluation</h5>
                                    <div class="row">
                                        <div class="col-lg-6 mt-2">
                                            <x-form.label name="educational_attainment"/>
                                            <select class="shadow-sm form-select form-control"
                                                name="educational_attainment">
                                                <option value="Incoming College / College">Incoming College /
                                                    College
                                                </option>
                                            </select>
                                            <x-form.error name="educational_attainment"/>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mt-3">
                                                        <x-form.label name="family_income"/>
                                                        <select class="shadow-sm form-select form-control"
                                                            name="family_income">
                                                            <option
                                                                value="{{ old('family_income') ?? $application->applicationDetail->family_income }}">
                                                                {{ old('family_income') ?? $application->applicationDetail->family_income }}
                                                                PHP
                                                            </option>
                                                            <option value="8000">8,000 PHP</option>
                                                            <option value="12000">12,000 PHP</option>
                                                            <option value="16000">16,000 PHP</option>
                                                            <option value="20000">20,000 PHP</option>
                                                        </select>
                                                        <x-form.error name="family_income"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mt-3">
                                                        <x-form.label name="gwa"/>
                                                        <select class="shadow-sm form-select form-control" name="gwa">
                                                            <option value="{{ old('gwa') ?? $application->applicationDetail->gwa }}">
                                                                {{ old('gwa') ?? $application->applicationDetail->gwa }}
                                                            </option>
                                                            <option value="75">75</option>
                                                            <option value="80">80</option>
                                                            <option value="85">85</option>
                                                            <option value="90">90</option>
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
                                                        <option value="General Santos City">General Santos City
                                                        </option>
                                                    </select>
                                                    <x-form.error name="city"/>
                                                </div>
                                                <div class="col-lg-6">
                                                    <x-form.label name="registered_voter"/>
                                                    <select class="shadow-sm form-select form-control"
                                                        name="registered_voter">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                    <x-form.error name="registered_voter"/>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mt-3">
                                                        <x-form.label name="years_in_city"/>
                                                        <select class="shadow-sm form-select form-control"
                                                            name="years_in_city">
                                                            <option
                                                                value="{{ old('years_in_city') ?? $application->applicationDetail->years_in_city }}">
                                                                {{ old('years_in_city') ?? $application->applicationDetail->years_in_city }}
                                                                year
                                                            </option>
                                                            <option value="1">1 year</option>
                                                            <option value="2">2 year</option>
                                                            <option value="3">3 year</option>
                                                            <option value="4">4 year</option>
                                                        </select>
                                                        <x-form.error name="years_in_city"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mt-3">
                                                        <x-form.label name="nationality"/>
                                                        <select class="shadow-sm form-select form-control"
                                                            name="nationality">
                                                            <option value="Filipino">Filipino</option>
                                                        </select>
                                                        <x-form.error name="nationality"/>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <hr>
                                <div class="d-flex float-end">
                                    <a href="/applications" class="btn btn-outline-secondary me-2">
                                        Back
                                    </a>
                                    <x-form.button>Update</x-form.button>
                                </div>
                            </form>
                        </x-card-primary-border>
                    </div>

                    <div class="card shadow-sm mt-4">
                        <x-card-primary-border>
                            <form action="/applications/{{ $application->id }}/files" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <h2 class="text-center">Edit Application Files</h2>
                                <hr>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="row">
                                            <div class="col-lg mt-2">
                                                <h5 class="mt-2">Step 2: Documentary Requirements</h5>
                                            </div>
                                            <div class="col-lg mt-2">
                                                <x-form.input type="file" name="documentary_requirement" accept="application/pdf"/>
                                                <p class="mt-2"><i
                                                    class="bi bi-file-earmark-pdf-fill"></i>&nbsp;Current File:
                                                <a href="{{ asset('storage/' . $application->applicationDetail->documentary_requirement) }}"
                                                    target="_blank">
                                                    View
                                                </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="row">
                                            <div class="col-lg">
                                                <h5 class="mt-2">Step 3: Application Form</h5>
                                            </div>
                                            <div class="col-lg">
                                                <x-form.input type="file" name="application_form" accept="application/pdf"/>
                                                <p class="mt-2"><i class="bi bi-file-earmark-pdf-fill"></i>&nbsp;Current File:
                                                    <a href="{{ asset('storage/' . $application->applicationDetail->application_form) }}"
                                                        target="_blank">
                                                        View
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex float-end">
                                    <a href="/applications" class="btn btn-outline-secondary me-2">
                                        Back
                                    </a>
                                    <x-form.button>Update</x-form.button>
                                </div>
                            </form>
                        </x-card-primary-border>
                    </div>

                </div>
            </div>
        </x-container>
    </section>
</x-layout>
