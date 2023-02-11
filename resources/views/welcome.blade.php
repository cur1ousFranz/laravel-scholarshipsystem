<x-layout title="Edukar Scholarship">
    <section style="height: 100vh;
    background-image: url('{{ asset('storage/img/banner1.png'); }}');
    background-size: contain;
    background-size: cover;
    min-width: 100%;
    background-position:center;">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-lg-6" style="margin-top: 100px">

                    <div class="mt-5 text-center" style="color: #2f4550">
                        <div class="h1 text-white fw-bold" style="font-family: Arial, sans-serif;">
                            <strong>EDUKAR <span><strong>GENSAN</strong></span> <br> <span
                            style="color: #fff01e;">SCHOLARSHIP</span>
                        </div>
                    </div>
                    <div class="text-dark text-center d-none d-sm-block">
                        <p class="h5 text-white fw-bold" style="font-family: Arial, sans-serif;"><i>
                            Pursue your dreams and make your dreams come true!</i>
                        </p>
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
                            @if ($application !== null)
                                <p class='fw-bold text-white text-decoration-none'>Open:
                                    {{ date('F j, Y', strtotime($application->start_date))}}
                                    <br>Until: {{ date('F j, Y', strtotime($application->end_date )) }}
                                </p>
                            @else
                                <p class="fw-bold text-danger text-decoration-none mt-3 me-3">Closed</p>
                            @endif
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
                            @if ($application != null)
                                <p class='fw-bold text-white text-decoration-none'>Open:
                                    {{ date('F j, Y', strtotime($application->start_date))}}
                                    <br>Until: {{ date('F j, Y', strtotime($application->end_date )) }}
                                </p>
                            @else
                             <p class="fw-bold text-danger text-decoration-none mt-4 me-3">Closed</p>
                            @endif
                        </div>
                    @endif

                </div>
                <div class="col-md-6" style="margin-top: 100px">

                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="h1 text-center mt-5 fw-bold" style="font-family: Fantasy;">Scholars</div>
        <div class="container slideshow-container">
            @forelse ($scholars as $scholar)
                <div class="mySlides fading">
                    <div class="card mb-5">
                        <div class="card-body">
                            <img style="" src="{{ $scholar->image }}"
                            class="shadow img-fluid" >
                        </div>
                    </div>
                </div>
                <a class="slider-btn previous" onclick="plusSlides(-1)">❮</a>
                <a class="slider-btn next" onclick="plusSlides(1)">❯</a>
            @empty
                <div class="h4 text-center mt-5">
                    Nothing to show. Please come back later.
                </div>
            @endforelse
        </div>
    </section>

    <section class="mb-5">
        <div class="h2 text-center mt-5 fw-bold" style="font-family: Fantasy;">Activities</div>
        <div class="container-fluid mt-4">
            <div class="row d-flex">
                @if (!$activities->isEmpty())
                    @foreach ($activities as $activity)
                        <div class="col-lg-4 d-flex justify-content-center @if(!$loop->first) mt-5 mt-lg-0 @endif">
                            <div class="card position-relative border-0 shadow" style="width: 350px">
                                <a href="/activity/{{ $activity->slug }}">
                                    <img class="card-img-top" src="{{ $activity->url }}" alt="Card image cap">
                                </a>
                                <div class="card-body">
                                    <div class="card-title">
                                        <div class="h6">{{ strtoupper(date('F j, Y', strtotime($activity->created_at ))) }}</div>
                                        <div class="h5">
                                            <a class="fw-bold text-muted text-decoration-none" href="/activity/{{ $activity->slug }}">
                                                {{ $activity->title }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="cut-text">
                                        <p class="card-text">{!! $activity->body !!}</p>
                                    </div>
                                </div>
                                <div class="container mb-3">
                                    <a href="/activity/{{ $activity->slug }}" class="btn btn-secondary float-end">Read more</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="d-flex justify-content-center mt-5">
                            <a href="/activity" class="btn btn-secondary">View All</a>
                        </div>
                    </div>
                @else
                    <div class="h4 text-center mt-5">
                        Nothing to show. Please come back later.
                    </div>
                @endif
            </div>
        </div>
    </section>

    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
        showSlides(slideIndex += n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            slides[slideIndex-1].style.display = "block";
        }
    </script>
</x-layout>


