<x-navbar>

    <div class="container-fluid border-top" style="height: 610px; margin-top: 60px">
        <div class="container mt-4" style="width: 500px">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h2>Sign up</h2>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form action="/coordinator/create" method="post">
                                @csrf

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

                                <div>
                                    <label for="password">
                                        <h6>Password</h6>
                                    </label>
                                    <input class="form-control form-control" type="password" id="password"
                                        name="password" value="{{ old('password') }}">

                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="password_confirmation">
                                        <h6>Confirm Password</h6>
                                    </label>
                                    <input class="form-control form-control" type="password" id="password_confirmation"
                                        name="password_confirmation" value="{{ old('password_confirmation') }}">

                                    @error('password_confirmation')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="password_confirmation">
                                        <h6>Code</h6>
                                    </label>
                                    <input class="form-control form-control" type="text" id="code"
                                        name="code" value="{{ old('code') }}">

                                    @error('code')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <hr>
                                <div class="row mb-3">
                                    <div>
                                        <button type="submit" class="btn btn-primary form-control form-control-lg mt-3">
                                            Sign up
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-navbar>
