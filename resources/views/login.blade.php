@extends('layouts.master')

@section('title')
        <title> Blogify - Login Page</title>
@endsection

@section('css')
        <link rel="stylesheet" href="css/login.css" type="text/css">
@endsection

@section('content')

        <div class="row shadow-lg main">
            <div class="col left-login"> </div>
            
            <div class="col right-login">
                    <h1 class="title"> Blogify! </h1>
                    <h2 class="title"> "Connecting People, Inspiring Minds" </h2>

                <form method="POST" action="{{ route('login') }}">
                @csrf
                    <div class="row mb-2 mt-4">
                        <input id="email" type="email" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
            
                    <div class="row mb-2">
                        <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember"> Remember Me</label>
                        </div>
                    </div>

                    <div class="row">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>

                    <div class="row">
                        <div class="mb-4 mt-2 text-center">
                                @if (Route::has('password.request'))
                                        <a class="register-link" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
                                @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="text-center">Don't have an account? 
                            <a class="register-link" href="{{url ('/register') }}">Register here</a>
			     		</div>
                    </div>
                </form>
            </div>
        </div>
@endsection
