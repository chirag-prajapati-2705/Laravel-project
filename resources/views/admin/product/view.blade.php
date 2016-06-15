@extends('admin.layouts.app')

@section('content')
 @if(!empty($products))
     <div id="page-wrapper">
         <div class="row">
             <div class="col-lg-12">
                 <h1 class="page-header">Tables</h1>
             </div>
             <!-- /.col-lg-12 -->
         </div>
         <!-- /.row -->
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
                                     <th>Name</th>
                                     <th>Sku</th>
                                     <th>Status</th>
                                     <th>Action</th>
                                 </tr>
                                 </thead>
                                 <tbody>

     @foreach($products as $product)

         <tr class="odd gradeX">
             <td>{{$product->name}}</td>
                 <td>{{$product->sku}}</td>
             <td>{{($product->sku==1)?'Active':"Inactive"}}</td>
             <td> <a class="btn btn-danger btn-xs btn btn-xs btn-danger delete-btn"
                     href="{!! URL('admin/product/edit/'.$product->id) !!}">
                     <i class="fa fa-trash" title="" data-placement="top" data-toggle="tooltip"
                        data-original-title="Delete"></i>Edit
                 </a> <a class="btn btn-danger btn-xs btn btn-xs btn-danger delete-btn"
                     href="{!! URL('admin/product/destroy', $product->id) !!}">
                     <i class="fa fa-trash" title="" data-placement="top" data-toggle="tooltip"
                        data-original-title="Delete"></i>Delete
                 </a></td>
             </tr>

         @endforeach
                                 </tbody>
                             </table>
     </div>
                         <?php echo $products->links(); ?>

 @endif
@endsection


