@extends('layouts.auth-master')

@section('content')
    <form method="post" action="{{ route('login.perform') }}">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <img class="mb-4" src="{!! url('images/bootstrap-logo.svg') !!}" alt="" width="72" height="57">
        
        <h1 class="h3 mb-3 fw-normal">Login</h1>

        @include('layouts.partials.messages')

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Username" required="required" autofocus>
            <label for="floatingName">Email</label>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
        </div>
        
        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>
        
        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
        <div class="form-group row">
            <div class="d-flex justify-content-center">
                <div class="checkbox">
                    <label>
                        if u don't have an account <a href="{{ route('register.show') }}">Sign up</a>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="d-flex justify-content-center">
                <div class="checkbox">
                    <label>
                        <a href="{{ route('forget.password.get') }}">Reset Password</a>
                    </label>
                </div>
            </div>
        </div>
        @include('auth.partials.copy')
        <div class="form-group row">
            <div class="d-flex justify-content-center">
                <div class="checkbox">
                    <label>
                        <a href="{{ route('home.index') }}">Go Home</a>
                    </label>
                </div>
            </div>
        </div>
    </form>
@endsection