<x-navbar>
    <x-layout>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body">
                              This is some text within a card body.
                            </div>
                          </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body">
                              This is some text within a card body.
                            </div>
                          </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body">
                              This is some text within a card body.
                            </div>
                          </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body">
                              This is some text within a card body.
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
                                Area Chart Example
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Bar Chart Example
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </div>

            </div>
          </div>
    </x-layout>
</x-navbar>

<script type="text/javascript">
    var _ydata = JSON.parse('{!! json_encode($months) !!}');
    var _xdata = JSON.parse('{!! json_encode($monthCount) !!}');
</script>
