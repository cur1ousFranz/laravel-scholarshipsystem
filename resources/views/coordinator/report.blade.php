<x-layout title="Report | Edukar Scholarship">
    <section>
        <x-container>
            <div class="row">
                <div class="col-9">
                    <div class="card">
                        <x-card-primary-border>
                            <div class="h5">Data Report</div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-4 mt-2">
                                    <x-card-row-col class="border-primary">
                                        <x-slot name="first">
                                            <h5 style="font-size: 18px">
                                                <i class="bi bi-person-fill"></i>
                                            </h5>
                                            Applicants
                                        </x-slot>
                                        <x-slot name="second">
                                            <div class="mt-1">
                                                <h1 class="float-end">{{ $totalApplicants->count() }}</h1>
                                            </div>
                                        </x-slot>
                                    </x-card-row-col>
                                </div>

                                <div class="col-lg-4 mt-2">
                                    <x-card-row-col class="border-danger">
                                        <x-slot name="first">
                                            <h5 style="font-size: 18px">
                                                <i class="bi bi-journal-text"></i>
                                            </h5>
                                            Applications
                                        </x-slot>
                                        <x-slot name="second">
                                            <div class="mt-1">
                                                <h1 class="float-end">{{ $totalApplications->count() }}</h1>
                                            </div>
                                        </x-slot>
                                    </x-card-row-col>
                                </div>

                                <div class="col-lg-4 mt-2">
                                    <x-card-row-col class="border-warning">
                                        <x-slot name="first">
                                            <h5 style="font-size: 18px">
                                                <i class="bi bi-card-checklist"></i>
                                            </h5>
                                            Submissions
                                        </x-slot>
                                        <x-slot name="second">
                                            <div class="mt-1">
                                                <h1 class="float-end">{{ $totalSubmissions->count() }}</h1>
                                            </div>
                                        </x-slot>
                                    </x-card-row-col>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <i class="fas fa-chart-area me-1"></i>
                                            Applied Applicants
                                        </div>
                                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <i class="fas fa-chart-bar me-1"></i>
                                            Rejected Applicants
                                        </div>
                                        <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                    </div>
                                </div>
                            </div>
                        </x-card-primary-border>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <x-card-primary-border>
                            <div class="h5">Export Data</div>
                            <hr>
                            <form action="/report/export" method="post">
                                @csrf

                                <x-form.label name="school_year"/>
                                <select class="shadow-sm form-select form-control" name="school_year">
                                    <option selected disabled>Select</option>
                                    @foreach ($appliedApplicantYears as $years)
                                        <option value="{{ $years }}">{{ $years }} - {{ $years + 1 }}</option>
                                    @endforeach
                                </select>
                                <x-form.error name="school_year"/>

                                {{-- <x-form.label name="data" class="mt-2"/>
                                <select class="shadow-sm form-select form-control" name="data">
                                    <option selected disabled>Select</option>
                                    <option value="Applicant">Applicant</option>
                                    <option value="Schools">Schools</option>
                                    <option value="Family Income">Family Income</option>
                                    <option value="GWA">GWA</option>
                                </select>
                                <x-form.error name="data"/> --}}

                                <div class="d-flex justify-center mt-3">
                                    <button type="submit" class="btn btn-warning form-control btn-sm me-1"
                                    name="action" value="preview">
                                       Preview
                                       <i class="bi bi-eye ms-1"></i>
                                    </button>
                                    <button type="submit" class="btn btn-success form-control btn-sm"
                                    name="action" value="download">
                                       Download
                                       <i class="bi bi-download ms-1"></i>
                                    </button>
                                </div>

                            </form>
                        </x-card-primary-border>
                    </div>
                </div>
        </x-container>
    </section>
</x-layout>

{{-- CHART CDN AND LINK JS FILE --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

<script type="text/javascript">
    var appliedApplicant = JSON.parse('{!! json_encode($appliedApplicantYears) !!}');
    var appliedApplicantCount = JSON.parse('{!! json_encode($appliedApplicantYearCount) !!}');

    var rejectedApplicant = JSON.parse('{!! json_encode($rejectedApplicantYears) !!}');
    var rejectedApplicantCount = JSON.parse('{!! json_encode($rejectedApplicantYearCount) !!}');
</script>

<script src="{{ asset('chart/chart-area-applied-applicant.js') }}"></script>
<script src="{{ asset('chart/chart-bar-rejected-appplicant.js') }}"></script>

