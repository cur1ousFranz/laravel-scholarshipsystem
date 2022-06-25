<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.tiny.cloud/1/t6ma4oxtlblgdc5mskjxpxgs6ham551qbxdkw09lip31ej1k/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#editor',
            skin: 'bootstrap',
            plugins: 'lists, link, image, media',
            toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
            menubar: false,
        });
    </script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top border-bottom">
        <div class="container ">

            <a class="navbar-brand" href="/">Edukar Scholarship Applicant Management System</a>
            <ul class="navbar-nav">
                {{-- CONDITION IF THE USER IS GUEST OR AUTHENTICATED --}}
                @auth
                    @if (auth()->user()->role == 'applicant')

                        <li class="nav-item">
                            <a class="btn nav-link text-white" href="/">
                                <i class="bi bi-house-door" style="font-size: 20px"></i></a>
                        </li>

                        <li class="nav-item mt-1">

                            <div class="dropdown show">
                                <a class="btn text-white" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown">
                                    <i class="bi bi-bell" style="font-size: 19px"></i>
                                </a>

                                <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuLink">
                                    ...
                                </div>
                            </div>
                        </li>

                        <li class="nav-item mt-2">

                            <div class="dropdown show">
                                <a class="btn text-white" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown">
                                    <?php
                                    $applicant = Illuminate\Support\Facades\DB::table('applicants')
                                        ->where('users_id', auth()->user()->id)
                                        ->first();
                                    echo $applicant->first_name;
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
                            <a class="nav-link text-white" href="/dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/applications">Application</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/submissions">Submission</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/applicants">Applicant</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown show">
                                <a class="btn text-white" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown">
                                    Coordinator<i class="ms-1 bi bi-caret-down-fill"></i>
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
                    <li class="nav-item border border-2 border-warning ms-3">
                        <a class="nav-link text-white" href="/signup">Sign up</a>
                    </li>
                    <li class="nav-item border border-2 border-warning ms-2">
                        <a class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#signinModal"
                            href="">Sign in</a>
                    </li>
                @endauth

            </ul>

        </div>
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="signinModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border border-3 border-primary">
                <div class="modal-header d-flex justify-content-center">
                    <h2 class="modal-title" id="exampleModalCenterTitle">Sign in</h2>
                </div>
                <div class="modal-body">
                    <form action="/login" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-12">

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

                            </div>

                        </div>
                        <div class="row mt-4 ">
                            <div class="col-12 d-flex justify-content-center">
                                <h6 class="text-primary">Forgot Password?</h6>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="modal-foote">
                                <div>
                                    <button type="submit" class="btn btn-primary form-control form-control-lg mt-3">
                                        Sign in
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <main>
        {{ $slot }}
    </main>
    <!-- Footer -->
    <footer class="page-footer font-small bg-primary text-white">


        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">
            © 2022 All rights reserved.
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
</body>

</html>
