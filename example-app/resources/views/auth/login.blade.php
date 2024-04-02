@extends('layout.app')

@section('content')
    <div class="container login">



        <div class="row d-flex align-items-center justify-content-center login-card login-margin">

            <div class="col-12 col-md-6 credss">
                <div class="creds">
                    <h1>Welcome Back!</h1>
                    <p class="text-center">Sign in to continue you journey. </p>
                    <form action="{{ route('login.auth') }}" method="POST" class="login-form">
                        @csrf
                        <div class="input">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" class="form-control"
                                placeholder="Enter your email" value="{{old('email')}}">
                        </div>
                        @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        @if (session()->has('error'))
                            <div class="text-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        <div class="input">

                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Enter your password">
                            @error('password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="submit" value="Login" class="submit-button btn btn-success border">
                    </form>
                    <div class="hr-container">
                        <hr class="hr1 align-self-start">
                        <p>or</p>
                        <hr class="hr2 align-self-start">
                    </div>
                    <p class="lead-1">Dont have an account? <a href="{{ route('signup') }}"><i class="create">Create
                                Account</i></a></p>
                </div>



            </div>
            <div class="col-md-6 d-none d-md-block">
                <img src="{{ asset('assets/van9.avif') }}" alt="" class="img-fluid shadow"
                    style="border-radius: 15px;">
                <!-- Button trigger modal -->
                <!-- Button trigger modal -->
               
            </div>

        </div>
    </div>
@endsection




