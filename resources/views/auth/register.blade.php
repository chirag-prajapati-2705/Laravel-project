@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="register">
            <h1>Register</h1>

            <form class="form-horizontal" role="form" method="POST" action="{{ url('register') }}">
                {!! csrf_field() !!}
                <div class="col-md-6  register-top-grid">

                    <div class="mation">
                        <span>First Name</span>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif

                      {{--  <span>Last Name</span>
                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">--}}

                        <span>Email Address</span>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class=" col-md-6 register-bottom-grid">
                    <div class="mation">
                        <span>Password</span>
                        <input type="password" class="form-control" name="password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                        <span>Confirm Password</span>
                        <input type="password" class="form-control" name="password_confirmation">
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="clearfix"></div>


                <div class="register-but">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i>Register
                    </button>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
@endsection
