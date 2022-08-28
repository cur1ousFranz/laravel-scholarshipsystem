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

    <title>ESAMS</title>
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

    </style>

</head>

<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-light fixed-top border-bottom" style="background-color: #fffcff">
        <div class="container ">

            <a class="navbar-brand" href="/">Edukar Scholarship</a>

            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <i class="bi bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    {{-- CONDITION IF THE USER IS GUEST OR AUTHENTICATED --}}
                    @auth
                        @if (auth()->user()->role == 'applicant')
                            <li class="nav-item mt-lg-1">
                                <a class="btn nav-link text-dark" href="/">
                                    <i class="bi bi-house-door" style="font-size: 19px"></i>
                                </a>
                            </li>

                            <li class="nav-item mt-lg-1">

                                <div class="dropdown show">
                                    <a class="btn nav-link text-dark" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown">
                                        <i class="bi bi-bell" style="font-size: 19px"></i>
                                        @if (auth()->user()->unreadNotifications->count())
                                            <span class="badge bg-danger">
                                                {{ auth()->user()->unreadNotifications->count() }}
                                            </span>
                                        @endif
                                    </a>

                                    <div class="dropdown-menu text-center p-0" aria-labelledby="dropdownMenuLink">

                                        <ul class="list-group ">
                                            @if (auth()->user()->notifications->count() != 0)
                                                @foreach (auth()->user()->unreadNotifications as $notifications)
                                                    <li class="list-group-item" style="background-color: #B5CBF6">
                                                        <a class=" text-decoration-none text-dark" href="/notifications/{{ $notifications->id }}"
                                                            class="dropdown-item"> {{ $notifications->data['title'] }}
                                                        </a>
                                                        <p class="p-0 m-0 text-end" style="font-size: 11px">
                                                            {{ $notifications->created_at->format('d M') }}
                                                        </p>
                                                    </li>
                                                @endforeach
                                                @foreach ( auth()->user()->readNotifications as $notifications )
                                                    <li class="list-group-item">
                                                        <a  href="/notifications/{{ $notifications->id }}" class="dropdown-item">
                                                            {{ $notifications->data['title'] }}
                                                        </a>
                                                        <p class="p-0 m-0 text-end" style="font-size: 11px">
                                                            {{ $notifications->created_at->format('d M') }}
                                                        </p>
                                                    </li>

                                                @endforeach
                                            @else
                                                    <li class="list-group-item">No notification yet.</li>
                                            @endif

                                        </ul>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item mt-lg-2">

                                <div class="dropdown show">
                                    <a class="btn nav-link text-dark" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown">
                                        <?php
                                        // $applicant = Illuminate\Support\Facades\DB::table('applicants')
                                        //     ->where('users_id', auth()->user()->id)
                                        //     ->first();
                                        echo auth()->user()->username;
                                        ?><i class="ms-1 bi bi-caret-down-fill"></i>
                                    </a>

                                    <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="/profile">Profile</a>
                                        <div class="dropdown-divider"></div>
                                        <form action="/logout" method="post" class="dropdown-item">
                                            @csrf
                                            <button class="btn mb-0 pb-0 pt-0 text-danger" type="submit">Logout</button>
                                        </form>

                                    </div>
                                </div>
                            </li>
                        @elseif(auth()->user()->role == 'coordinator')
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="/dashboard">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="/applications">Application</a>
                            </li>
                            <li class="nav-item">
                                <div class="dropdown show">
                                    <a class="btn text-dark" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown">
                                        Applicant<i class="ms-1 bi bi-caret-down-fill"></i>
                                    </a>

                                    <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="/applicants/qualified">Qualified Applicants</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/applicants/rejected">Rejected Applicants</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="dropdown show">
                                    <a class="btn text-dark" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown">
                                        {{ auth()->user()->username }}<i class="ms-1 bi bi-caret-down-fill"></i>
                                    </a>

                                    <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#">Profile</a>
                                        <div class="dropdown-divider"></div>
                                        <form action="/logout" method="post" class="dropdown-item">
                                            @csrf
                                            <button class="btn mb-0 pb-0 pt-0 text-danger" type="submit">Logout</button>
                                        </form>

                                    </div>
                                </div>
                            </li>
                        @endif
                    @else
                        <li class="nav-item border border-2 border-warning">
                            <a class="nav-link text-dark" href="/signup">Sign up</a>
                        </li>
                        <li class="nav-item border border-2 border-warning ms-lg-2">
                            <a class="nav-link text-dark" data-bs-toggle="modal" data-bs-target="#signinModal"
                                href="">Sign in</a>
                        </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="signinModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border border-1 border-dark">
                <div class="modal-header d-flex justify-content-center">
                    <h2 class="modal-title" id="exampleModalCenterTitle">Sign in</h2>
                </div>
                <div class="modal-body">
                    <form action="/login" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="container">
                                    <div>
                                        <label for="username">
                                            <h6>Username</h6>
                                        </label>
                                        <input class="form-control form-control" type="text" id="username"
                                            name="username" value="{{ old('username') }}">

                                        @error('username')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label for="password">
                                            <h6>Password</h6>
                                        </label>
                                        <input class="form-control form-control" type="password" id="password"
                                            name="password" value="{{ old('password') }}">
                                    </div>

                                    <div class="row mt-4 ">
                                        <div class="col-12 d-flex justify-content-center">
                                            <h6 class="text-primary">Forgot Password?</h6>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="modal-foote">
                                            <div>
                                                <button type="submit"
                                                    class="btn btn-primary form-control form-control-lg mt-3">
                                                    Sign in
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        @if (session()->has('success'));
            <div class="d-flex justify-content-center ms-3 text-center" id="alertSuccess">
                <div style="margin-top: 80px" class="alert alert-success w-25" x-data="{show: true}" x-init="setTimeout(() => show = false, 1000)" x-show="show">
                    <p> {{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if (session()->has('error'));
            <div class="d-flex justify-content-center ms-3 text-center" id="alertError">
                <div style="margin-top: 80px" class="alert alert-danger w-25 top-0 position-static" x-data="{show: true}" x-init="setTimeout(() => show = false, 1000)" x-show="show">
                    <p> {{ session('error') }}</p>
                </div>
            </div>
        @endif
        {{ $slot }}

    <!-- Footer -->
    <footer class="page-footer font-small text-dark border-top border-top-4 border-secondary mt-auto" style="background-color: #fffcff">

        <div class="footer-copyright text-center py-3">
            © 2022 All rights reserved.
        </div>
    </footer>
    <!-- Footer -->
</body>

</html>
