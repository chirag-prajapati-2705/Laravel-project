@extends('admin.layouts.app')

@section('content')

    <div id="page-wrapper">
        <div class="container">
            <div class="row">
                <div class="panel-heading">
                  <h1>Create New User</h1>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            {{Form::open(array('url' => 'admin/user/store')) }}
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label>Name</label>
                                {{Form::input('text','name','',['class'=>'form-control'])}}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label>Email</label>
                                {{Form::input('text','email','',['class'=>'form-control'])}}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label>Password</label>
                                {{Form::input('password','password','',['class'=>'form-control'])}}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('cconfirm_password') ? ' has-error' : '' }}">
                                <label>Confirm Password</label>
                                {{Form::input('password','cconfirm_password','',['class'=>'form-control'])}}
                                @if ($errors->has('cconfirm_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cconfirm_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-default">Submit Button</button>
                            <button type="reset" class="btn btn-default">Reset Button</button>
                            {{Form::close()}}
                        </div>
                    </div>
                    <!-- /.row (nested) -->

                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>


    </div>
@endsection
