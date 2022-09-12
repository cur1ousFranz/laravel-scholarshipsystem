<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- BOOTSTRAP Link -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>@isset($title){{ $title }}@endisset</title>
    {{-- This is to resolve passive events problem in console --}}
    <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>

    <!-- ALPINE JS -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- AJAX CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- BOOTSTRAP CDN -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Decription Box CDN -->
    <script src="https://cdn.tiny.cloud/1/t6ma4oxtlblgdc5mskjxpxgs6ham551qbxdkw09lip31ej1k/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#editor',
            skin: 'bootstrap',
            plugins: 'lists, link, image, media',
            toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
            menubar: false,
            max_height: 300
        });
    </script>

    <style>

        /* This is for submissions table */
        .scroll {
            overflow-x: auto;
            max-width: auto;

        }

        #applicantListHeader{
            white-space: nowrap;
        }

        .scroll th:nth-child(1),
        .scroll td:nth-child(1){
            position: sticky;
            left: 0px;
        }

        .scroll th:nth-child(2),
        .scroll td:nth-child(2){
            position: sticky;
            left: 32px;
        }

        .scroll th:nth-child(3),
        .scroll td:nth-child(3){
            position: sticky;
            left: 91px;
        }

        .scroll td:nth-child(1),
        .scroll td:nth-child(2),
        .scroll td:nth-child(3){
            background-color: white;
        }

        /* This is for qualified applicant list table */
        .scroll2 {
            overflow-x: auto;
            max-width: auto;

        }

        .scroll2 th:nth-child(1),
        .scroll2 td:nth-child(1){
            position: sticky;
            left: 0px;
            background-color: white;
        }

        #alertSuccess,
        #alertError{

            position:fixed;
            top: 0px;
            left: 0px;
            width: 100%;
            z-index:9999;
            border-radius:0px

        }

        /* Slide Show */


      /* Slideshow container */
      .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        /* Hide the images by default */
        .mySlides {
            display: none;
        }

        /*Style for ">" next and "<" previous buttons */
        .slider-btn{
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 8px 16px;
            margin-top: -22px;
            color: rgb(0, 0, 0);
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
        }

        /* setting the position of the previous button towards left */
        .previous {
            left: 2%;
        }
        /* setting the position of the next button towards right */
        .next {
            right: 2%;
        }


        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
            background-color: rgba(0,0,0,0.8);
        }

        /* Fading animation */
        .fading {
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
        }

        /* CUT TEXT */
        .cut-text {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2; /* after 3 line show ... */
            -webkit-box-orient: vertical;
        }
    </style>

</head>

<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-light fixed-top border-bottom" style="background-color: #fffcff">
        <div class="container ">
            @if (Auth::check() || Auth::guest())
                @if (Auth::check() && auth()->user()->role === 'coordinator')
                    <a class="navbar-brand lead" href="/home" style="font-family: Arial, Helvetica, sans-serif">
                        EDUKAR SCHOLARSHIP
                    </a>
                @else
                    <a class="navbar-brand lead" href="/" style="font-family: Arial, Helvetica, sans-serif">
                        EDUKAR SCHOLARSHIP
                    </a>
                @endif
            @endif

            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <i class="bi bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    @auth
                        @if (auth()->user()->role == 'applicant')
                            <li class="nav-item mt-lg-1">
                                <a class="nav-link text-dark d-flex justify-content-center" href="/">
                                    <i class="bi bi-house-door" style="font-size: 18px"></i>
                                </a>
                            </li>

                            <li class="nav-item mt-lg-1">

                                <div class="dropdown show">
                                    <a class="btn nav-link text-dark position-relative" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown">
                                        <i class="bi bi-bell" style="font-size: 18px">
                                        </i>
                                        @if (auth()->user()->unreadNotifications->count())
                                            <span class="position-absolute mt-3 translate-middle badge rounded-pill bg-danger">
                                                {{ auth()->user()->unreadNotifications->count() }}
                                            </span>
                                        @endif
                                    </a>

                                    <div class="dropdown-menu text-center p-0" aria-labelledby="dropdownMenuLink">
                                        <h5 class="fw-bold mt-2">Notifications</h5>
                                        <ul class="list-group ">
                                            @if (auth()->user()->notifications->count() != 0)
                                                @foreach (auth()->user()->unreadNotifications as $notifications)
                                                    <li class="list-group-item border-0">
                                                        <a class="text-decoration-none text-dark dropdown-item" href="/notifications/{{ $notifications->id }}">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    {{ $notifications->data['title'] }}
                                                                </div>
                                                                <div class="col-6">
                                                                    <span class="badge rounded-pill ms-5 bg-primary">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <p class="p-0 m-0 text-end" style="font-size: 11px">
                                                                {{ $notifications->created_at->diffForHumans() }}
                                                            </p>
                                                        </a>
                                                    </li>
                                                @endforeach
                                                @foreach ( auth()->user()->readNotifications as $notifications )
                                                    <li class="list-group-item border-0">
                                                        <a  href="/notifications/{{ $notifications->id }}" class="dropdown-item">
                                                            {{ $notifications->data['title'] }}
                                                        </a>
                                                        <p class="p-0 m-0 text-end" style="font-size: 11px">
                                                            {{ $notifications->created_at->diffForHumans() }}
                                                        </p>
                                                    </li>
                                                @endforeach
                                            @else
                                                <hr class="mt-1 mb-1">
                                                <li class="list-group-item border-0 text-muted">Nothing to show</li>
                                            @endif

                                        </ul>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item mt-lg-1">

                                <div class="dropdown show">
                                    <a class="btn nav-link text-dark" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown">
                                        {{ auth()->user()->username }}
                                        <i class="ms-1 bi bi-caret-down-fill"></i>
                                    </a>
                                    <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="/profile">Profile</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="/logout" class="btn mb-0 pb-0 pt-0 text-danger">
                                            Logout
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @elseif(auth()->user()->role == 'coordinator')
                            <li class="nav-item">
                                <a class="nav-link text-dark text-center" href="/home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark text-center" href="/report">Report</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark text-center" href="/applications">Application</a>
                            </li>
                            <li class="nav-item">
                                <div class="dropdown show text-center">
                                    <a class="btn text-dark" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown">
                                        Applicant
                                    </a>
                                    <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="/qualified">Qualified Applicants</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/rejected">Rejected Applicants</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="dropdown show text-center">
                                    <a class="btn text-dark" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown">
                                        {{ auth()->user()->username }}
                                    </a>
                                    <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuLink">
                                        {{-- <a class="dropdown-item" href="#">Profile</a>
                                        <div class="dropdown-divider"></div> --}}
                                        <a  class="btn dropdown-item mb-0 pb-0 pt-0 text-danger" href="/logout">
                                            Logout
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @else
                        <li class="nav-item  border-warning">
                            <a class="nav-link text-dark text-center" href="/signup">Sign up</a>
                        </li>
                        <li class="nav-item border-warning ms-lg-2">
                            <a class="nav-link text-dark text-center" data-bs-toggle="modal" data-bs-target="#signinModal"
                                href="">Sign in</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="modal fade" id="signinModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border" style="max-width: 450px">
                <div class="modal-header d-flex justify-content-center">
                    <h2 class="modal-title" id="exampleModalCenterTitle">Sign in</h2>
                </div>
                <div class="modal-body">
                    <form action="authenticate" method="POST">
                        @csrf

                        <div class="container">
                            <x-form.input name="username"/>
                            <x-form.input class="mt-2" name="password" type="password"/>
                            <hr>
                            <x-form.button class="mt-3 mb-3 form-control">Sign in</x-form.button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('success'));
        <div class="d-flex justify-content-center ms-3 text-center" id="alertSuccess">
            <div style="margin-top: 80px"
            class="alert alert-success w-25"
            x-data="{show: true}"
            x-init="setTimeout(() => show = false, 3000)"
            x-show="show">
                <p> {{ session('success') }}</p>
            </div>
        </div>
    @endif

    @if (session()->has('error'));
        <div class="d-flex justify-content-center ms-3 text-center" id="alertError">
            <div style="margin-top: 80px"
            class="alert alert-danger w-25 top-0 position-static"
            x-data="{show: true}"
            x-init="setTimeout(() => show = false, 3000)"
            x-show="show">
                <p> {{ session('error') }}</p>
            </div>
        </div>
    @endif

    {{ $slot }}

    <!-- Footer -->
    <footer class="page-footer font-small text-dark border-top border-top-4 border-secondary mt-auto"
    style="background-color: #fffcff">

        <div class="footer-copyright text-center py-3">
            © 2022 All rights reserved.
        </div>
    </footer>
    <!-- Footer -->
</body>

</html>
