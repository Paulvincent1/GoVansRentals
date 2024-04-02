@extends('layout.app')

@section('content')
    <div class="container login">



        <div class="row d-flex align-items-center justify-content-center login-card login-margin g-5">

            <div class="col-md-6 d-none d-md-block">
                <img src="{{ asset('assets/van2.avif') }}" alt="" class="img-fluid shadow"
                    style="border-radius: 15px;
                height: 600px;">

            </div>

            <div class="col-12 col-md-6 credss-signup">
                <div class="creds">
                    <h1 class="title-register">Register new account!</h1>
                    <p class="text-center">Sign in to continue you journey. </p>
                    <form action="{{ route('signup.store') }}" class="login-form" method="POST">
                        @csrf
                        <div class="input">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control" name="name"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="input">
                            <label for="email">Email</label>
                            <input type="text" id="email" class="form-control" name="email"
                                value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input">

                            <label for="password">Password</label>
                            <input type="password" id="password" class="form-control" name="password">
                            @error('password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input">
                            <label for="password">Confirm Password</label>
                            <input type="password" id="password" class="form-control" name="password_confirmation">

                        </div>
                        <input type="submit" value="Signup" class="submit-button btn btn-success border">
                    </form>
                    <div class="hr-container">
                        <hr class="hr1 align-self-start">
                        <p>or</p>
                        <hr class="hr2 align-self-start">
                    </div>
                    <p class="lead-1">Have an account? <a href="{{ route('login') }}"><i class="create">Log in</i></a></p>
                </div>



            </div>

        </div>
    </div>
@endsection
