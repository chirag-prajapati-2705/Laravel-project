@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel">
                <a class="logo-block" href="{!! url('/admin') !!}">
                    {!! Html::image(asset('images/logo.png'), 'WordArt', ['class' => 'img-responsive center-block']) !!}
                </a>

                @include('admin.notification')
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'post-admin-login', 'method' => 'post', 'role' => 'form']) !!}

                        <fieldset>
                            <div class="form-group">
                                {!! Form::input('email', 'email', '', ['class' => 'form-control', 'placeholder' => 'Enter Email Address', 'autocomplete' => 'off','']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::input('password', 'password', '', ['class' => 'form-control', 'placeholder' => 'Enter Password', 'autocomplete' => 'off','']) !!}
                            </div>
                            <div class="checkbox">
                                <label>
                                    {!! Form::input('checkbox', 'remember', 1, null, ['class' => 'form-control']) !!}
                                    Remember Me
                                </label>
                               {{-- <a class="pull-right" href="{{ route('auth.password.reset.request') }}">Forgot password?</a>--}}

                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            {!! Form::input('submit', 'login', 'Login', ['class' => 'btn btn-lg btn-success btn-block']) !!}
                        </fieldset>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
