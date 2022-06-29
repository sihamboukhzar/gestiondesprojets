@extends('layouts.app')
@section('content')
<section class="vh-100">
 <img src="assets/img/logo_cms.png" width="70" height="60" margin-right ="5%" >
    <div class="row d-flex justify-content-center align-items-center h-95">
      <div class="col-md-9 col-lg-6 col-xl-5">
      
      <img  style="height: 450px" width="700px" src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h1 id="logo">Log In </h1><br><br>
                        <div class="row mb-3">
                            <label for="email"  class="col-md-4 col-form-label text-md-end"><h3>{{ __('Email Address') }}</h3></label>

                            <div class="col-md-8">
                                <input id="email" placeholder="your email" type="email" class="form-control btn-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end"><h3>{{ __('Password') }}</h3></label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control btn-lg @error('password') is-invalid @enderror"placeholder="Password" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input  " type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <div class="col-md-6">
                                    <label class="form-check-label col-md-4 col-form-label text-md-end " for="remember">
                                        <h4>{{ __('Remember Me') }}</h4>
                                    </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="  btn btn-primary btn-lg btn-block btn-rounded  "style="  background-color: #5E1731;  outline: none;font-family: 'georgia';font-size: 18px;
  padding: 1rem 1.3rem; touch-action: manipulation;  transform: scale(1.125);  box-shadow: #311B89 0 -10px 6px inset;transform: scale(1.025);;  border-radius: 40em;">
                                   <h5>{{ __('Login') }}</h5> 
                                </button>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link  offset-md-4" href="{{ route('password.request') }}">
                                        <h4>{{ __('Forgot Your Password?') }}</h4>
                                    </a>
                                    <br>
                                    <a class="btn btn-link  offset-md-4" href="{{ route('register') }}">
                                   <h4>{{ __('Sign Up') }}</h4>     
                                    </a>
                                @endif
                            
                        </div>
                    </form>
                </div>
            </div>
    
</div>
@endsection
