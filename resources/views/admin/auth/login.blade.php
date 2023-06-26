@extends('layouts.auth-master')
@section('title','Login')
@section('content')
<div class="authincation-content">
    <div class="row no-gutters">
        <div class="col-xl-12">
            <div class="auth-form">
                <div class="text-center mb-3">
                    <a href="{{ url('/') }}"><img src="{{ asset('images/logo-kemenlu.png') }}" alt="Kementerian Luar Negeri Republik Indonesia"></a>
                </div>
                <h4 class="text-center mb-4">Sign in your account</h4>
                @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <form method="POST" action="{{ route('admin.login') }}" autocomplete="off">
                    @csrf
                    <div class="mb-3">
                        <label class="mb-1"><strong>{{ __('Username') }}</strong></label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" required>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="mb-1"><strong>Password</strong></label>
                        <input type="password" name="password" class="form-control" >
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row d-flex justify-content-between mt-4 mb-2">
                        <!-- <div class="mb-3">
                            <div class="form-check custom-checkbox ms-1">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="basic_checkbox_1">Remember my preference</label>
                            </div>
                        </div> -->
                        <!-- <div class="mb-3">
                            
                            @if (Route::has('password.request'))
                                <a  href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div> -->
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </form>
               <!--  <div class="new-account mt-3">
                    <p>Don't have an account? <a class="text-primary" href="./page-register.html">Sign up</a></p>
                </div> -->
            </div>
        </div>
    </div>
</div>

@endsection
