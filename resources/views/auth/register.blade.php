@extends('layouts.master')

@section('title')
        <title> Blogify - Register Page</title>
@endsection

@section('css')
        <link rel="stylesheet" href="css/register.css" type="text/css">
@endsection

@section('content')
<div class="row shadow-lg main">
            
            <div class="col left-login">
                    <h1 class="title"> Blogify! </h1>
                    <h2 class="title"> "Connecting People, Inspiring Minds" </h2>

                <form method="POST" action="{{ route('register') }}">
                @csrf

                    <div class="row mb-3 mt-3">
                        <input id="name" placeholder="Full Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <input id="email" placeholder="Email Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
            
                    <div class="row mb-3">
                        <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="row mb-3">
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </div>

                    <div class="row">
                        <div class="text-center">Already have an account? 
                            <a class="register-link" href="{{url ('/') }}">Login here</a>
			     		</div>
                    </div>
                </form>
            </div>

            <div class="col right-login"></div>

        </div>
@endsection