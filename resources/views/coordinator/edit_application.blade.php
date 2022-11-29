<x-layout title="Application | Edukar Scholarship">
    <section>
        <x-container>
            <div class="container-fluid mb-5">
                <div class="container m-auto w-75">

                    <div class="card shadow-sm">
                        <x-card-primary-border>
                            <form action="/applications/{{ $application->id }}/details" method="post">
                                @csrf
                                @method('PATCH')
                                <h4>Edit Application Details</h4>
                                <hr>
                                <div class="row mt-3">
                                    <x-form.input class="col-lg mt-1" name="slots" :value="$application->slots" readonly="true"/>

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
{{--
                                    <hr>
                                    <h5 class="mt-4">Pre-evaluation</h5>
                                    <div class="row">
                                        <div class="col-lg-6 mt-2">
                                            <x-form.input name="educational_attainement" disable="true" value="Incoming College / College Level"/>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mt-3">
                                                        <x-form.input name="family_income" disable="true" value="Less than ₱10,957"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mt-3">
                                                        <x-form.input name="general_average" disable="true" value="80"/>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-6 mt-2">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <x-form.input name="city" disable="true" value="General Santos"/>
                                                </div>
                                                <div class="col-lg-6">
                                                    <x-form.input name="registered_voter" disable="true" value="Yes"/>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mt-3">
                                                        <x-form.input name="years_in_city" disable="true" value="3"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mt-3">
                                                        <x-form.input name="nationality" disable="true" value="Filipino"/>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div> --}}
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
                                <h4>Edit Application Documents</h4>
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
                                                <a href="{{ $application->applicationDetail->documentary_requirement }}"
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
                                                    <a href="{{ $application->applicationDetail->application_form }}"
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
