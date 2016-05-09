@extends('admin.layouts.app')

@section('content')

    <div id="page-wrapper">
        <div class="container">
            <div class="row">
                <div class="panel-heading">
                    Create New User
                </div>

                <?php echo Session::get('message'); ?>
                @if(Session::has('success'))
                    <div class="alert-box success">
                        <h2>{{ Session::get('success') }}</h2>
                    </div>
                @endif

                <?php var_dump(Session::get('message')); ?>
                @if (Session::has('message.arrayErrors'))
                    <div class="wrapper">
                        <div class="notification png_bg error-msg">
                            <div id="flash_error">
                                <span class="msg-icon-left fa fa-exclamation-triangle"></span>
                                @foreach (Session::get('message.arrayErrors') as $message)
                                    {!! $message !!}
                                    <span class="fa fa-times msg-close"></span>
                                @endforeach </div>
                        </div>
                    </div>
                @endif
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            {{Form::open(array('url' => 'admin/user/store')) }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Name</label>
                                {{Form::input('text','name','',['class'=>'form-control'])}}
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                {{Form::input('text','email','',['class'=>'form-control'])}}
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                {{Form::input('password','password','',['class'=>'form-control'])}}
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                {{Form::input('password','cconfirm_password','',['class'=>'form-control'])}}
                                <p class="help-block">Example block-level help text here.</p>
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
