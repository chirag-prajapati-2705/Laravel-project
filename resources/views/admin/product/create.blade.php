@extends('admin.layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Create Product</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    {{Form::open(array('url' => 'admin/product/store','files' => true)) }}
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label>Name</label>
                        {{Form::input('text','name',Input::old('name'),['class'=>'form-control'])}}
                    </div>
                    <div class="form-group{{ $errors->has('sku') ? ' has-error' : '' }}">
                        <label>Sku</label>
                        {{Form::input('text','sku',Input::old('sku'),['class'=>'form-control'])}}
                    </div>
                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <label>Image</label>
                        {{ Form::file('image') }}
                    </div>
                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <label>price</label>
                        {{Form::input('text','price',Input::old('price'),['class'=>'form-control'])}}
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        {{Form::select('status',array('1'=>'Active','2'=>'InActive'),'',['class'=>'form-control'])}}

                    </div>

                    <button type="submit" class="btn btn-primary">Submit Button</button>
                    <button type="reset" class="btn btn-primary">Reset Button</button>
                    {{Form::close()}}
                </div>
            </div>
            <!-- /.row (nested) -->

            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    </div>



@endsection
