<x-layout>
    <section>
        <x-container>
            <div class="container-fluid mb-5">
                <div class="container m-auto w-75">

                    <div class="card shadow-sm">
                        <div class="card-body border-top border-top-4 border-primary">
                            <form action="/applications/{{ $application->id }}/details" method="post">
                                @csrf
                                @method('PATCH')
                                <h2 class="text-center">Edit Application Details</h2>
                                <hr>
                                <div class="row mt-3">
                                    <div class="col-lg mt-1">
                                        <label for="slots">
                                            <h6>Slots</h6>
                                        </label>
                                        <select class="shadow-sm form-select form-control" name="slots">
                                            <option value="{{ old('slots') ?? $application->slots }}" selected>
                                                {{ old('slots') ?? $application->slots }}
                                            </option>
                                            <option value="100">100</option>
                                            <option value="200">200</option>
                                            <option value="300">300</option>
                                        </select>

                                        @error('slots')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-lg mt-1">
                                        <label for="start_date">
                                            <h6>Start Date</h6>
                                        </label>
                                        <input class="shadow-sm form-control form-control" type="text" id="start_date"
                                            name="start_date" value="{{ $application->start_date }}"
                                            readonly="true">

                                        @error('start_date')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-lg mt-1">
                                        <label for="end_date">
                                            <h6>End Date</h6>
                                        </label>
                                        <input class="shadow-sm form-control form-control" type="date" id="end_date"
                                            name="end_date"
                                            value="{{ $application->end_date }}">

                                        @error('end_date')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-lg mt-1">
                                        <label for="batch">
                                            <h6>Batch</h6>
                                        </label>
                                        <input class="shadow-sm form-control form-control" type="text" id="batch" name="batch"
                                            value="{{ old('batch') ?? $application->batch}}">

                                        @error('batch')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <hr>
                                <h5 class="mt-3">Description</h5>

                                    <textarea id="editor" name="description">
                                    {{ old('description') ?? $application->applicationDetail->description }}
                            </textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                    <hr>
                                    <h5 class="mt-4">Pre-evaluation</h5>
                                    <div class="row">
                                        <div class="col-lg-6 mt-2">
                                            <div>
                                                <label for="educational_attainment">
                                                    <h6>Educational Attainment</h6>
                                                </label>
                                                <select class="shadow-sm form-select form-control"
                                                    name="educational_attainment">
                                                    <option value="Incoming College / College">Incoming College /
                                                        College
                                                    </option>
                                                </select>
                                                @error('educational_attainment')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mt-3">
                                                        <label for="family_income">
                                                            <h6>Family Income</h6>
                                                        </label>
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

                                                        @error('family_income')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mt-3">
                                                        <label for="gwa">
                                                            <h6>GWA</h6>
                                                        </label>
                                                        <select class="shadow-sm form-select form-control" name="gwa">
                                                            <option value="{{ old('gwa') ?? $application->applicationDetail->gwa }}">
                                                                {{ old('gwa') ?? $application->applicationDetail->gwa }}
                                                            </option>
                                                            <option value="75">75</option>
                                                            <option value="80">80</option>
                                                            <option value="85">85</option>
                                                            <option value="90">90</option>
                                                        </select>

                                                        @error('gwa')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-6 mt-2">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div>
                                                        <label for="city">
                                                            <h6>City</h6>
                                                        </label>
                                                        <select class="shadow-sm form-select form-control" name="city">
                                                            <option value="General Santos City">General Santos City
                                                            </option>
                                                        </select>

                                                        @error('city')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div>
                                                        <label for="registered_voter">
                                                            <h6>Registered Voter</h6>
                                                        </label>
                                                        <select class="shadow-sm form-select form-control"
                                                            name="registered_voter">
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>

                                                        @error('registered_voter')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mt-3">
                                                        <label for="years_in_city">
                                                            <h6>No. of year resident in City</h6>
                                                        </label>
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

                                                        @error('years_in_city')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mt-3">
                                                        <label for="nationality">
                                                            <h6>Nationality</h6>
                                                        </label>
                                                        <select class="shadow-sm form-select form-control"
                                                            name="nationality">
                                                            <option value="Filipino">Filipino</option>
                                                        </select>

                                                        @error('nationality')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
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
                                    <button type="submit" class="btn btn-outline-primary">
                                        Update
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card shadow-sm mt-4">
                        <div class="card-body border-top border-top-4 border-primary">
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
                                                    <input type="file" name="documentary_requirement"
                                                        class="shadow-sm form-control" accept="application/pdf">
                                                    <p class="mt-2"><i
                                                        class="bi bi-file-earmark-pdf-fill"></i>&nbsp;Current File:
                                                    <a href="{{ asset('storage/' . $application->applicationDetail->documentary_requirement) }}"
                                                        target="_blank">
                                                        View
                                                    </a>
                                                    </p>
                                                </div>
                                            </div>

                                        @error('documentary_requirement')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="row">
                                            <div class="col-lg">
                                                <h5 class="mt-2">Step 3: Application Form</h5>
                                            </div>
                                            <div class="col-lg">
                                                <input type="file" name="application_form" class="shadow-sm form-control"
                                                    accept="application/pdf">
                                                <p class="mt-2"><i class="bi bi-file-earmark-pdf-fill"></i>&nbsp;Current File:
                                                    <a href="{{ asset('storage/' . $application->applicationDetail->application_form) }}"
                                                        target="_blank">
                                                        View
                                                    </a>
                                                </p>
                                            </div>
                                        </div>

                                        @error('application_form')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex float-end">
                                    <a href="/applications" class="btn btn-outline-secondary me-2">
                                        Back
                                    </a>
                                    <button type="submit" class="btn btn-outline-primary float-end">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </x-container>
    </section>
</x-layout>
