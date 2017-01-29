@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tables</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    DataTables Advanced Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($banners) && count($banners)>0)
                                @foreach($banners as $banner)
                                    <tr class="odd gradeX">
                                        <td>{{$banner->banner_id}}</td>
                                        <td>{{$banner->image}}</td>
                                        <td><a class="btn btn-danger btn-xs btn btn-xs btn-danger delete-btn"
                                               href="{{ URL::to('admin/banner/' . $banner->banner_id . '/edit') }}">

                                                <i class="fa fa-pencil" title="" data-placement="top"
                                                   data-toggle="tooltip"
                                                   data-original-title="Delete"></i>
                                            </a> <a class="btn btn-danger btn-xs btn btn-xs btn-danger delete-btn"
                                                    href="{!! URL('admin/banner/destroy', $banner->banner_id) !!}">
                                                <i class="fa fa-trash" title="" data-placement="top"
                                                   data-toggle="tooltip"
                                                   data-original-title="Delete"></i>
                                            </a></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">
                                        <center>No Result Found!</center>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


