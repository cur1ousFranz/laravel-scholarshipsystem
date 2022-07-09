<x-navbar>
    <x-layout>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body border-bottom border-5 border-primary">
                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <h5 style="font-size: 17px">
                                                <i class="bi bi-person-fill"></i>
                                                Applicants
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mt-1">
                                            <h1 class="float-end">{{ $totalApplicants->count() }}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body border-bottom border-5 border-warning">
                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <h5 style="font-size: 17px">
                                                <i class="bi bi-journal-text"></i></i>
                                                Applications
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mt-1">
                                            <h1 class="float-end">{{ $totalApplications->count() }}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body border-bottom border-5 border-success">
                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <h5 style="font-size: 17px">
                                                <i class="bi bi-card-checklist"></i>
                                                Submissions
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mt-1">
                                            <h1 class="float-end">{{ $totalSubmissions->count() }}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body border-bottom border-5 border-danger">
                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <h5 style="font-size: 17px">
                                                <i class="bi bi-person-fill"></i>
                                                SampleText
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mt-1">
                                            <h1 class="float-end">0</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                    </div>
                </div>
                {{-- CHARTS --}}
                <div class="row mt-3">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Applied Applicants
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Qualified Applicants
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-pie me-1"></i>
                                Family Household Income
                            </div>
                            <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                        </div>
                    </div>
                    <div class="col-6"></div>
                </div>

            </div>
          </div>
    </x-layout>
</x-navbar>

{{-- CHART CDN AND LINK JS FILE --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

<script type="text/javascript">
    var appliedApplicant = JSON.parse('{!! json_encode($appliedApplicantYears) !!}');
    var appliedApplicantCount = JSON.parse('{!! json_encode($appliedApplicantYearCount) !!}');

    var qualifiedApplicant = JSON.parse('{!! json_encode($qualifiedApplicantYears) !!}');
    var qualifiedApplicantCount = JSON.parse('{!! json_encode($qualifiedApplicantYearCount) !!}');

    var applicantFamilyIncome = JSON.parse('{!! json_encode($applicantFamilyIncome) !!}');


</script>

<script src="{{ asset('js/chart-area-applied-applicant.js') }}"></script>
<script src="{{ asset('js/chart-bar-qualified-appplicant.js') }}"></script>
<script src="{{ asset('js/chart-pie-family-income.js') }}"></script>

