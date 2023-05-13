@extends('layouts.app-master')

@section('content')

    <div class="text-center" style="width: 100%; max-width: 400px; padding: 15px; margin: auto;">
        <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" >

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="text-center">
                <div class="profile-pic">
                    <label class="-label" for="file">
                      <span class="glyphicon glyphicon-camera"></span>
                      <span>Change Image</span>
                    </label>
                    <input id="file" name="profile_picture"  type="file" onchange="loadFile(event)"/>
                    <img src="{{ asset('images/' . Auth::user()->profile_picture) }}" onerror="this.onerror=null; this.src='{{ asset('images/profile.png') }}'"  id="output" width="200" />
                  </div>
                <img width="100" class="rounded-circle">
            </div>

            @if ($errors->has('profile_picture'))
                <span class="text-danger text-left">{{ $errors->first('profile_picture') }}</span>
            @endif
            <h1 class="h3 mb-3 fw-normal">Profile</h1>

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="first_name" value="{{ Auth::user()->first_name }}" placeholder="First name" required="required" autofocus >
                <label for="floatingName">First Name</label>
                @if ($errors->has('first_name'))
                    <span class="text-danger text-left">{{ $errors->first('first_name') }}</span>
                @endif
            </div>
            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="last_name" value="{{ Auth::user()->last_name}}" placeholder="Last name" required="required" autofocus>
                <label for="floatingName">Last Name</label>
                @if ($errors->has('last_name'))
                    <span class="text-danger text-left">{{ $errors->first('last_name') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="email" class="form-control" name="email" value="{{ Auth::user()->email}}" placeholder="name@example.com" required="required" disabled>
                <label for="floatingEmail">Email address</label>
                @if ($errors->has('email'))
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

            <div class="form-group form-floating mb-3">
                <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">
                <label for="floatingConfirmPassword">Confirm Password</label>
                @if ($errors->has('password_confirmation'))
                    <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Update</button>
            
        </form>
    </div>
    <script src="{!! url('assets/js/profile.js') !!}"></script>
@endsection