<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #fffcff">
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