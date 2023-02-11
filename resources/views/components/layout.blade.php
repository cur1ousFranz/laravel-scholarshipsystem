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
        
        body {
            font-family:Arial, Helvetica, sans-serif
        }

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
            background-color: #f7f7f7;
        }

        /* This is for qualified applicant and rejected list table */
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

        .scroll2 th:nth-child(2),
        .scroll2 td:nth-child(2){
            position: sticky;
            left: 59.9px;
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

        ::-webkit-scrollbar {
            width: 0.4em;
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #c2bdbd;
        }

        .hide-background {
            background-color: transparent;
        }
    </style>

</head>

<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-light fixed-top"
    style="background-color: #fffcff">
        <div class="container ">
            @if (Auth::check() || Auth::guest())
                @if (Auth::check() && auth()->user()->role === 'coordinator')
                    <a class="navbar-brand fw-bolder" href="/home"
                    style="letter-spacing: 3px">
                    <img style="width: 100px; height: 40px" src="{{ asset('storage/img/aklat_logo.png') }}" alt="">
                    </a>
                @else
                    <a class="navbar-brand fw-bolder" href="/"
                    style="letter-spacing: 3px">
                    <img style="width: 100px; height: 40px" src="{{ asset('storage/img/aklat_logo.png') }}" alt="">
                    </a>
                @endif
            @endif

            <button type="button" class="navbar-toggler"
            data-bs-toggle="collapse" data-bs-target="#navmenu">
                <i class="bi bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    @auth
                        @if (auth()->user()->role == 'applicant')
                            <li class="nav-item d-lg-none">
                                <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                            </li>
                            <li class="nav-item d-none d-lg-block">
                                <div class="dropdown show">
                                    <a class="btn nav-link text-dark position-relative"
                                    role="button" id="dropdownMenuLink" data-bs-toggle="dropdown">
                                        <i class="bi bi-bell" style="font-size: 18px">
                                        </i>
                                        @if (auth()->user()->unreadNotifications->count())
                                            <span class="position-absolute mt-3 translate-middle badge rounded-pill bg-danger">
                                                {{ auth()->user()->unreadNotifications->count() }}
                                            </span>
                                        @endif
                                    </a>

                                    <div class="dropdown-menu p-0 position-absolute"
                                    style="max-height: 275px; width: 200px; overflow-y: auto">
                                        <h5 class="fw-bold mt-2 px-3">Notifications</h5>
                                        <ul class="list-group">
                                            @if (auth()->user()->notifications->count() != 0)
                                                @foreach (auth()->user()->unreadNotifications as $notification)
                                                    <li class="list-group-item border-0">
                                                        <a class="text-decoration-none text-dark dropdown-item"
                                                        href="{{ route('notification', $notification->id) }}">
                                                            <div class="row">
                                                                <div class="col-6 text-end">
                                                                    {{ $notification->data['title'] }}
                                                                </div>
                                                                <div class="col-6">
                                                                    <span class="badge rounded-pill ms-5 bg-primary">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <p class="p-0 m-0 text-end" style="font-size: 11px">
                                                                {{ $notification->created_at->diffForHumans() }}
                                                            </p>
                                                        </a>
                                                    </li>
                                                @endforeach
                                                @foreach ( auth()->user()->readNotifications as $notification )
                                                    <li class="list-group-item border-0 @if($loop->last) mb-2 @endif">
                                                        <a  href="{{ route('notification', $notification->id) }}" class="dropdown-item text-secondary">
                                                            {{ $notification->data['title'] }}
                                                            <p class="p-0 m-0 text-end" style="font-size: 11px">
                                                                {{ $notification->created_at->diffForHumans() }}
                                                            </p>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            @else
                                                <hr class="mt-1 mb-1">
                                                <li class="list-group-item border-0 text-muted text-center">Nothing to show</li>
                                            @endif

                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item d-lg-none">
                                <a href="{{ route('notifications') }}" class="dropdown-item">
                                    Notifications
                                    @if (auth()->user()->unreadNotifications->count())
                                        <span class="badge rounded-pill bg-danger mt-1">
                                            {{ auth()->user()->unreadNotifications->count() }}
                                        </span>
                                    @endif
                                </a>
                            </li>
                            <li class="nav-item d-none d-lg-block">
                                <div class="dropdown show">
                                    <a class="btn nav-link text-dark" data-bs-toggle="dropdown">
                                        {{ auth()->user()->username }}
                                        <i class="ms-1 bi bi-caret-down-fill"></i>
                                    </a>
                                    <div class="dropdown-menu text-center">
                                        <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="{{ route('logout') }}" class="dropdown-item">
                                            Logout
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item d-lg-none">
                                <a href="{{ route('logout') }}" class="dropdown-item">
                                    Logout
                                </a>
                            </li>
                        @elseif(auth()->user()->role == 'coordinator')
                            <li class="{{ Route::current()->getName() === 'home' ? 'border-bottom border-2 border-primary' : '' }} nav-item">
                                <a class="nav-link text-dark text-center" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="{{ Route::current()->getName() === 'report' ? 'border-bottom border-2 border-primary' : '' }} nav-item">
                                <a class="nav-link text-dark text-center" href="{{ route('report') }}">Report</a>
                            </li>
                            <li class="{{ Route::current()->getName() === 'applications' ? 'border-bottom border-2 border-primary' : '' }} nav-item">
                                <a class="nav-link text-dark text-center" href="{{ route('applications') }}">Application</a>
                            </li>
                            <li class="{{ (Route::current()->getName() === 'qualified') ? 'border-bottom border-2 border-primary' : ((Route::current()->getName() === 'rejected') ? 'border-bottom border-2 border-primary' : '') }} nav-item">
                                <div class="dropdown show text-center">
                                    <a class="btn text-dark" data-bs-toggle="dropdown">
                                        Applicant
                                    </a>
                                    <div class="dropdown-menu text-center">
                                        <a class="dropdown-item" href="{{ route('qualified') }}">Qualified Applicants</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('rejected') }}">Rejected Applicants</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="dropdown show text-center">
                                    <a class="btn text-dark" data-bs-toggle="dropdown">
                                        {{ auth()->user()->username }}
                                    </a>
                                    <div class="dropdown-menu text-center">
                                        <a  class="btn dropdown-item mb-0 py-1" href="{{ route('changes') }}">
                                            Changes
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a  class="btn dropdown-item mb-0 py-1 text-danger" href="{{ route('logout') }}">
                                            Logout
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @else
                        <li class="nav-item  border-warning">
                            <a class="nav-link text-dark text-center" href="{{ route('signup') }}">Sign up</a>
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

    <div class="modal fade" id="signinModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border" style="max-width: 450px">
                <div class="modal-header">
                    <h2 class="modal-title px-2">Sign in</h2>
                </div>
                <div class="modal-body">
                    <form action="/authenticate" method="POST">
                        @csrf

                        <div class="container">
                            <x-form.input name="username"/>
                            <x-form.input class="mt-4" name="password" type="password"/>
                            <div class="mt-4 d-flex justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label" for="remember">
                                      Remember me
                                    </label>
                                  </div>
                                <h6 class="text-end"><a href="{{ route('forgot-password') }}" class="text-black">
                                    Forgot Password</a>
                                </h6>
                            </div>
                            <hr>
                            <h6 class="text-center">Don't have an account? <a href="{{ route('signup') }}">Sign up</a></h6>
                            <x-form.button class="mt-2 mb-3 form-control">Sign in</x-form.button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('success'));
        <div class="d-flex justify-content-center ms-3 text-center" id="alertSuccess">
            <div style="margin-top: 80px"
            class="alert bg-success text-white"
            x-data="{show: true}"
            x-init="setTimeout(() => show = false, 2000)"
            x-show="show">
                <h6 class="py-1 fw-bold"> {{ session('success') }}</h6>
            </div>
        </div>
    @endif

    @if (session()->has('error'));
        <div class="d-flex justify-content-center ms-3 text-center" id="alertError">
            <div style="margin-top: 80px"
            class="alert  bg-danger text-white top-0 position-static"
            x-data="{show: true}"
            x-init="setTimeout(() => show = false, 2000)"
            x-show="show">
                <h6 class="py-1 fw-bold"> {{ session('error') }}</h6>
            </div>
        </div>
    @endif

    {{ $slot }}

    <!-- Footer -->
    <footer class="page-footer font-small text-dark border-top border-top-4 border-secondary mt-auto"
    style="background-color: #fffcff">

        <div class="footer-copyright text-center py-3">
           © {{ now()->year }} All rights reserved.
        </div>
    </footer>
    <!-- Footer -->

</body>

</html>
