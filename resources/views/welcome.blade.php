<x-navbar>
    <x-layout class="bg-primary" style="height: 100vh">
        <div class="container" style="margin-top: 180px;">
            <div class="row">
                <div class="col-6 mt-5">

                    <div class="mt-2 text-white">
                        <h4 style="font-size: 40px;"><strong>SEARCH <span
                                    style="color: yellow; font-size: 50px">SCHOLARSHIP</span> <br> OPPORTUNITIES AROUND
                                <br> YOUR CITY</strong></h4>
                    </div>
                    <div class="text-white">
                        <h4><i>Pursue your dreams and make your dreams come true!</i></h4>
                    </div>
                    @if (Auth::user())
                        <div class="d-flex justify-content-center">
                            <div>
                                <a href="/apply" class="btn mt-4" style="background-color: yellow;">
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
                                echo "<p class='fw-bold text-light text-decoration-none mt-4'>"."Open: " . date('F j, Y', strtotime($application->start_date))
                                    ."<br>Until: ". date('F j, Y', strtotime($application->end_date )). "</p>";
                                }else {
                                    echo "<p class='fw-bold text-light text-decoration-none mt-4 me-3'>Closed</p>";
                                }
                            @endphp
                        </div>

                    @else
                        <div class="d-flex justify-content-center">
                            <div>
                                <a href="" class="btn mt-4" data-bs-toggle="modal" data-bs-target="#signinModal" style="background-color: yellow;">
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
                                echo "<p class='fw-bold text-light text-decoration-none mt-4'>"."Open: " . date('F j, Y', strtotime($application->start_date))
                                    ."<br>Until: ". date('F j, Y', strtotime($application->end_date )). "</p>";
                                }else {
                                    echo "<p class='fw-bold text-light text-decoration-none mt-4 me-3'>Closed</p>";
                                }
                            @endphp
                        </div>
                    @endif

                </div>
                <div class="col-6">

                    <div class="d-flex justify-content-center ms-3" style="width: 100%; height: 100%;">
                        <img src="{{ asset('storage/img/banner-img.png') }}" alt="">
                    </div>

                </div>
            </div>
        </div>
    </x-layout>
    <div class="container-fluid mt-5 h-100">
        <div class="row">
            <div class="col-6">

            </div>
            <div class="col-6">
                <div class="container">
                    <p style="font-size: 20px">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex perferendis
                        tempore molestiae minima? Corrupti vel odio tempore ipsam ipsum quasi cum culpa. Omnis optio
                        porro enim eos cumque iste dolorem velit, fugit quis delectus inventore aspernatur ratione quasi
                        aut cum. Labore inventore nemo minima nam laboriosam numquam magni assumenda. Ipsa. Lorem ipsum,
                        dolor sit amet consectetur adipisicing elit. Veritatis, fugiat?</p>
                </div>

            </div>
        </div>
        <div class="row" style="margin-top: 100px">
            <div class="col-6">
                <div class="container">
                    <p style="font-size: 20px">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex perferendis
                        tempore molestiae minima? Corrupti vel odio tempore ipsam ipsum quasi cum culpa. Omnis optio
                        porro enim eos cumque iste dolorem velit, fugit quis delectus inventore aspernatur ratione quasi
                        aut cum. Labore inventore nemo minima nam laboriosam numquam magni assumenda. Ipsa.</p>
                </div>
            </div>
            <div class="col-6">


            </div>
        </div>
        <div class="row">
            <div class="col-6">

            </div>
            <div class="col-6">
                <div class="container">
                    <p style="font-size: 20px">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex perferendis
                        tempore molestiae minima? Corrupti vel odio tempore ipsam ipsum quasi cum culpa. Omnis optio
                        porro enim eos cumque iste dolorem velit, fugit quis delectus inventore aspernatur ratione quasi
                        aut cum. Labore inventore nemo minima nam laboriosam numquam magni assumenda. Ipsa. Lorem ipsum,
                        dolor sit amet consectetur adipisicing elit. Veritatis, fugiat?</p>
                </div>

            </div>
        </div>
    </div>
    <div class="container-fluid mt-5">
        {{-- ANOTHER SECTION --}}
    </div>
</x-navbar>
<x-footer/>
