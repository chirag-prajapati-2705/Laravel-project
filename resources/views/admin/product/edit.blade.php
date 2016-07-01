@extends('admin.layouts.app')

@section('content')

        <div class="container">
            <div class="row">
                <div class="panel-heading">
                    <h1>Create New Product</h1>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Form::model($product, array('method' => 'PATCH', 'route' => array('product.update', $product->id),'files' => true)) }}
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label>Name</label>
                                {{Form::input('text','name',Input::old('name'),['class'=>'form-control'])}}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('sku') ? ' has-error' : '' }}">
                                <label>Sku</label>
                                {{Form::input('text','sku',Input::old('sku'),['class'=>'form-control'])}}
                                @if ($errors->has('sku'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sku') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                <label>Image</label>
                                {{ Form::file('image') }}
                                @if(isset($product->image))
                                   {{ Form::image('uploads/'.$product->image->image_name, null, ['class' => 'product-image'])}}
                                    {{Form::hidden('image_id',$product->image->id)}}
                                @endif
                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
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
