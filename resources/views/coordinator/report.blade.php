<x-layout title="Report | Edukar Scholarship">
    <section>
        <x-container>
            <h4 class="mt-2">Data Report</h4>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 mt-2">
                            <x-card-row-col class="border-primary">
                                <x-slot name="first">
                                    <h5 style="font-size: 17px">
                                        <i class="bi bi-person-fill"></i>
                                        Applicants
                                    </h5>
                                </x-slot>
                                <x-slot name="second">
                                    <div class="mt-1">
                                        <h1 class="float-end">{{ $totalApplicants->count() }}</h1>
                                    </div>
                                </x-slot>
                            </x-card-row-col>
                        </div>

                        <div class="col-lg-3 mt-2">
                            <x-card-row-col class="border-danger">
                                <x-slot name="first">
                                    <h5 style="font-size: 17px">
                                        <i class="bi bi-journal-text"></i>
                                        Applications
                                    </h5>
                                </x-slot>
                                <x-slot name="second">
                                    <div class="mt-1">
                                        <h1 class="float-end">{{ $totalApplications->count() }}</h1>
                                    </div>
                                </x-slot>
                            </x-card-row-col>
                        </div>

                        <div class="col-lg-3 mt-2">
                            <x-card-row-col class="border-warning">
                                <x-slot name="first">
                                    <h5 style="font-size: 17px">
                                        <i class="bi bi-card-checklist"></i>
                                        Submissions
                                    </h5>
                                </x-slot>
                                <x-slot name="second">
                                    <div class="mt-1">
                                        <h1 class="float-end">{{ $totalSubmissions->count() }}</h1>
                                    </div>
                                </x-slot>
                            </x-card-row-col>
                        </div>

                        <div class="col-lg-3 mt-2">
                            <x-card-row-col class="border-success">
                                <x-slot name="first">
                                    <h5 style="font-size: 17px">
                                        <i class="bi bi-person-fill"></i>
                                        SampleText
                                    </h5>
                                </x-slot>
                                <x-slot name="second">
                                    <div class="mt-1">
                                        <h1 class="float-end">0</h1>
                                    </div>
                                </x-slot>
                            </x-card-row-col>
                        </div>
                    </div>
                    {{-- CHARTS --}}
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
{{--
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-pie me-1"></i>
                                    Family Household Income
                                </div>
                                <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                            </div>
                        </div>
                        <div class="col-lg-6"></div>
                    </div> --}}

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
{{-- <script src="{{ asset('chart/chart-pie-family-income.js') }}"></script> --}}
{{-- // var applicantFamilyIncome = JSON.parse('{!! json_encode($applicantFamilyIncome) !!}'); --}}

