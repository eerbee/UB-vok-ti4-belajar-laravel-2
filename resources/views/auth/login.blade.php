@extends('layouts.app')

@section('content')
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="{{ url('/') }}">
                            <h3>SIMPLE INVENTORY</h3>
                            <h4>ADMINISTRATOR LOGIN</h4>
                        </a>
                    </div>
                    <div class="login-form" style="margin-top: 15px;">
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="form-group">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="login-checkbox">                          
                                <label for="remember">
                                    <input type="checkbox" name="remember" id="remember" 
                                    {{ old('remember') ? 'checked' : '' }}>
                                    {{ __('Remember Me') }}
                                </label>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Lupa Password?') }}
                                </a>
                                @endif
                            </div>
                            <button type="submit" class="au-btn au-btn--block au-btn--green m-b-20">
                                {{ __('Sign In') }}
                            </button>
                            <div class="social-login-content">
                                <div class="social-button">
                                    <a href="{{ url('/') }}" class="au-btn au-btn--block au-btn--blue2"> 
                                        <center> Kembali ke Landingpage</center>
                                    </a>
                                </div>
                            </div>
                        </form>
                        <div class="register-link">
                            <p>
                                @if (Route::has('register'))
                                    Don't you have account? 
                                    <a href="{{ route('register') }}">{{ __('Sign Up Here') }}</a>  
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
