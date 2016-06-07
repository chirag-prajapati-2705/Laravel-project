@extends('admin.layouts.app')

@section('content')
 @if(!empty($users))
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
                                     <th>Email</th>
                                 </tr>
                                 </thead>
                                 <tbody>

     @foreach($users as $user)

         <tr class="odd gradeX">
             <td>{{$user->name}}</td>
                 <td>{{$user->email}}</td>
             </tr>

         @endforeach
                                 </tbody>
                             </table>
     </div>
                         <?php echo $users->links(); ?>

 @endif
@endsection


