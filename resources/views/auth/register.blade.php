@extends('layouts.app')
@section('content')
<img src="assets/img/logo_cms.png" width="70" height="60" >
                              
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-95">
      <div class="col-md-9 col-lg-6 col-xl-5">
          
        <img src="https://d329jirxh7znrd.cloudfront.net/seo/wp-content/uploads/sites/436/2020/06/about-illustrator1.png"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-8 col-xl-4 offset-xl-1">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <h1 id="logo">Register </h1>
                        <br><br> <br>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end"><h3>{{ __('Name') }}</h3></label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control btn-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end"><h3>{{ __('Email Address') }}</h3></label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control btn-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control btn-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end"><h3>{{ __('Confirm Password') }}</h3></label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control btn-lg" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4 ">
                                <button type="submit" style="  background-color: #ab2121;  outline: none; color: white;font-family: 'georgia';font-size: 18px;
  padding: 1rem 1.3rem; touch-action: manipulation;  transform: scale(1.125);  box-shadow: #000080 0 -10px 6px inset;transform: scale(1.025);;  border-radius: 40em;width: 250px;">
                                    {{ __('Register') }}
                                </button>
                                <a class="btn btn-link link-primary" href="{{ route('login') }}">
                                        {{ __('Log IN') }}
                                    </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
