@extends('layouts.app')

@section('content')

<div class="wt-loginarea">
    <figure class="wt-userimg">
        <img src="images/user-login.png" alt="img description">
    </figure>
    <div class="wt-loginoption">
        <a href="javascript:void(0);" id="wt-loginbtn" class="wt-loginbtn">Login</a>
        <div class="wt-loginformhold">
            <div class="wt-loginheader">
                <span>Login</span>
                <a href="javascript:;"><i class="fa fa-times"></i></a>
            </div>
            <form class="wt-formtheme wt-loginform do-login-form">
                <fieldset>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="wt-logininfo">
                        <a href="javascript:;" class="wt-btn do-login-button">Login</a>
                        <span class="wt-checkbox">
                            <input id="wt-login" type="checkbox" name="rememberme">
                            <label for="wt-login">Keep me logged in</label>
                        </span>
                    </div>
                </fieldset>
                <div class="wt-loginfooterinfo">
                    <a href="javascript:;" class="wt-forgot-password">Forgot password?</a>
                    <a href="register.html">Create account</a>
                </div>
            </form>
            <form class="wt-formtheme wt-loginform do-forgot-password-form wt-hide-form">
                <fieldset>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control get_password" placeholder="Email">
                    </div>
                   
                    <div class="wt-logininfo">
                        <a href="javascript:;" class="wt-btn do-get-password">Get Pasword</a>
                    </div>     
                </fieldset>
                <div class="wt-loginfooterinfo">
                    <a href="javascript:void(0);" class="wt-show-login">Login</a>
                    <a href="register.html">Create account</a>
                </div>
            </form>
        </div>
    </div>
    <a href="register.html" class="wt-btn">Join Now</a>
</div>

@endsection
<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
           
            <ul class="navbar-nav mr-auto">

            </ul>

    
            <ul class="navbar-nav ml-auto">
              
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
