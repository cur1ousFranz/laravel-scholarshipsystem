<x-navbar>
    <section>
        <x-layout>
            <div class="container-fluid d-flex justify-content-center mb-5">
                <div class="card w-75 shadow-sm">
                    <div class="card-body border-top border-top-4 border-primary">
                        <form action="/applications/store" method="post" enctype="multipart/form-data">
                            @csrf

                            <h2 class="text-center">Create Application</h2>
                            <h5 class="mt-5">Application Details</h5>
                            <div class="d-flex justify-content-around mt-3">
                                <div>
                                    <label for="slots">
                                        <h6>Slots</h6>
                                    </label>
                                    <select class="shadow-sm form-select form-control" name="slots">
                                        <option selected disabled>Select</option>
                                        <option value="100">100</option>
                                        <option value="200">200</option>
                                        <option value="300">300</option>
                                    </select>

                                    @error('slots')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="start_date">
                                        <h6>Start Date</h6>
                                    </label>
                                    <input class="shadow-sm form-control form-control" type="text" id="start_date"
                                        name="start_date" value="{{ date('Y-m-d', time()) }}" readonly="true">

                                    @error('start_date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="end_date">
                                        <h6>End Date</h6>
                                    </label>
                                    <input class="shadow-sm form-control form-control" type="date" id="end_date" name="end_date"
                                        value="{{ old('end_date') }}">

                                    @error('end_date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="batch">
                                        <h6>Batch</h6>
                                    </label>
                                    <input class="shadow-sm form-control form-control" type="text" id="batch" name="batch"
                                        value="{{ old('batch') }}">

                                    @error('batch')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <hr>
                            <h5 class="mt-3">Description</h5>
                            <textarea id="editor" name="description">{{ old('description') }}</textarea>

                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <hr>
                            <h5 class="mt-4">Pre-evaluation</h5>
                            <div class="row">
                                <div class="col-6 mt-2">
                                    <div>
                                        <label for="educational_attainment">
                                            <h6>Educational Attainment</h6>
                                        </label>
                                        <select class="shadow-sm form-select form-control" name="educational_attainment">
                                            <option selected disabled>Select</option>
                                            <option value="Incoming College / College">Incoming College / College</option>
                                        </select>
                                        @error('educational_attainment')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mt-3">
                                                <label for="family_income">
                                                    <h6>Family Income</h6>
                                                </label>
                                                <select class="shadow-sm form-select form-control" name="family_income">
                                                    <option selected disabled>Select</option>
                                                    <option value="8000">8,000 PHP</option>
                                                    <option value="12000">12,000 PHP</option>
                                                    <option value="16000">16,000 PHP</option>
                                                    <option value="20000">20,000 PHP</option>
                                                    <option value="20000">25,000 PHP</option>
                                                </select>

                                                @error('family_income')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mt-3">
                                                <label for="gwa">
                                                    <h6>General Weighted Average</h6>
                                                </label>
                                                <select class="shadow-sm form-select form-control" name="gwa">
                                                    <option selected disabled>Select</option>
                                                    <option value="75">75</option>
                                                    <option value="80">80</option>
                                                    <option value="85">85</option>
                                                    <option value="90">90</option>
                                                    <option value="95">95</option>
                                                </select>

                                                @error('gwa')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-6 mt-2">
                                    <div class="row">
                                        <div class="col-6">
                                            <div>
                                                <label for="city">
                                                    <h6>City</h6>
                                                </label>
                                                <select class="shadow-sm form-select form-control" name="city">
                                                    <option selected disabled>Select</option>
                                                    <option value="General Santos City">General Santos City</option>
                                                </select>

                                                @error('city')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <label for="registered_voter">
                                                    <h6>Registered Voter</h6>
                                                </label>
                                                <select class="shadow-sm form-select form-control" name="registered_voter">
                                                    <option selected disabled>Select</option>
                                                    <option value="Yes">Yes</option>
                                                </select>

                                                @error('registered_voter')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mt-3">
                                                <label for="years_in_city">
                                                    <h6>No. of year resident in City</h6>
                                                </label>
                                                <select class="shadow-sm form-select form-control" name="years_in_city">
                                                    <option selected disabled>Select</option>
                                                    <option value="1">1 year</option>
                                                    <option value="2">2 years</option>
                                                    <option value="3">3 years</option>
                                                    <option value="4">4 years</option>
                                                    <option value="5">5 years</option>
                                                </select>

                                                @error('years_in_city')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mt-3">
                                                <label for="nationality">
                                                    <h6>Nationality</h6>
                                                </label>
                                                <select class="shadow-sm form-select form-control" name="nationality">
                                                    <option selected disabled>Select</option>
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
                            <h5 class="mt-4">Step 1: Pre-registration</h5>
                            <p>Pre-registration will automatically read by the system based on applicant basic information.
                            </p>
                            <hr>
                            <div class="d-flex mt-4 justify-content-between">
                                <h5 class="mt-2">Step 2: Documentary Requirements</h5>
                                <div>
                                    <input type="file" name="documentary_requirement" class="shadow-sm form-control" accept="application/pdf" value="{{ old('documentary_requirement') }}">
                                </div>
                            </div>
                            @error('documentary_requirement')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <hr>
                            <div class="d-flex mt-4 justify-content-between">
                                <h5 class="mt-2">Step 3: Application Form</h5>
                                <div>
                                    <input type="file" name="application_form" class="shadow-sm form-control" accept="application/pdf" value="{{ old('application_form') }}">
                                </div>

                            </div>
                            @error('application_form')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <hr>
                            <div>
                                <button type="submit" class="btn btn-outline-primary float-end form-control">
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </x-layout>
    </section>
</x-navbar>

