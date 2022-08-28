<x-layout>
    <section>
        <div class="container-fluid" style="margin-top: 60px; height: 100vh;">

            <div class="row">
                <div class="col-lg-6" style="margin-top: 100px">

                    <div class="mt-5 text-center" style="color: #2f4550">
                        <div class="h2"><strong>SEARCH <span
                            style="color: #ffc53a;" class="h1"><strong>SCHOLARSHIP</strong></span> <br> OPPORTUNITIES AROUND
                        <br> YOUR CITY</strong></div>
                    </div>
                    <div class="text-dark text-center">
                        <p class="lead"><i>Pursue your dreams and make your dreams come true!</i></p>
                    </div>
                    @if (Auth::user())
                        <div class="d-flex justify-content-center">
                            <div>
                                <a href="/apply" class="btn mt-4" style="background-color: #ffc53a;">
                                    <b>Apply Now!</b>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center ms-3 mt-2">
                            @php
                                    $application = Illuminate\Support\Facades\DB::table('applications')
                                ->where('status', 'On-going')
                                ->first();
                                if (!$application == null) {
                                echo "<p class='fw-bold text-dark text-decoration-none mt-4'>"."Open: " . date('F j, Y', strtotime($application->start_date))
                                    ."<br>Until: ". date('F j, Y', strtotime($application->end_date )). "</p>";
                                }else {
                                    echo "<p class='fw-bold text-danger text-decoration-none mt-4 me-3'>Closed</p>";
                                }
                            @endphp
                        </div>

                    @else
                        <div class="d-flex justify-content-center">
                            <div>
                                <a href="" class="btn mt-4" data-bs-toggle="modal" data-bs-target="#signinModal" style="background-color: #ffc53a;">
                                    <b>Apply Now!</b>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center ms-3 mt-2">
                            @php
                                    $application = Illuminate\Support\Facades\DB::table('applications')
                                ->where('status', 'On-going')
                                ->first();
                                if (!$application == null) {
                                echo "<p class='fw-bold text-dark text-decoration-none mt-4'>"."Open: " . date('F j, Y', strtotime($application->start_date))
                                    ."<br>Until: ". date('F j, Y', strtotime($application->end_date )). "</p>";
                                }else {
                                    echo "<p class='fw-bold text-danger text-decoration-none mt-4 me-3'>Closed</p>";
                                }
                            @endphp
                        </div>
                    @endif

                </div>
                <div class="col-md-6" style="margin-top: 100px">

                    <div>
                        <img class="float-end ms-3 img-fluid d-none d-lg-block" src="{{ asset('storage/img/banner-img.png') }}" alt="">
                    </div>

                </div>
            </div>
        </div>
    </section>
{{--
    <section>
        <div class="container-fluid mt-5 h-100">
            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">
                    <div class="container">
                        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex perferendis
                            tempore molestiae minima? Corrupti vel odio tempore ipsam ipsum quasi cum culpa. Omnis optio
                            porro enim eos cumque iste dolorem velit, fugit quis delectus inventore aspernatur ratione quasi
                            aut cum. Labore inventore nemo minima nam laboriosam numquam magni assumenda. Ipsa. Lorem ipsum,
                            dolor sit amet consectetur adipisicing elit. Veritatis, fugiat?</p>
                    </div>

                </div>
            </div>
            <div class="row" style="margin-top: 100px">
                <div class="col-md-6">
                    <div class="container">
                        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex perferendis
                            tempore molestiae minima? Corrupti vel odio tempore ipsam ipsum quasi cum culpa. Omnis optio
                            porro enim eos cumque iste dolorem velit, fugit quis delectus inventore aspernatur ratione quasi
                            aut cum. Labore inventore nemo minima nam laboriosam numquam magni assumenda. Ipsa.</p>
                    </div>
                </div>
                <div class="col-md-6">


                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">
                    <div class="container">
                        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex perferendis
                            tempore molestiae minima? Corrupti vel odio tempore ipsam ipsum quasi cum culpa. Omnis optio
                            porro enim eos cumque iste dolorem velit, fugit quis delectus inventore aspernatur ratione quasi
                            aut cum. Labore inventore nemo minima nam laboriosam numquam magni assumenda. Ipsa. Lorem ipsum,
                            dolor sit amet consectetur adipisicing elit. Veritatis, fugiat?</p>
                    </div>

                </div>
            </div>
        </div>
    </section> --}}
</x-layout>
