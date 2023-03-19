@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  
  <div class="content-header">
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Other Cost </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Other Cost</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
     </div><!-- /.container-fluid -->
  </div>

 <!-- Main content -->
 <section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="card">

         <div class="card-header">
          <h3>Other Cost List
           <a href="{{route('account.cost.add')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-plus-circle"></i> Add Other Cost</a>
          </h3>
         </div>

         <!-- /.card-header -->
         <div class="card-body">

          <table id="example1" class="table table-bordered table-striped">    
           <thead>
            <tr>
             <th>SL</th>
             <th>Date</th>
             <th>Amount</th>
             <th>Description</th>
             <th>Image</th>
             <th>Action</th>
            </tr>
           </thead>
           <tbody>
            @foreach($alldata as $key => $value)
             <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ date('d-m-Y',strtotime($value->date)) }}</td>
              <td>{{ $value->amount }}</td>
              <td>{{ $value->description }}</td>
              <td>
               <img src="{{!empty($value->image)?url('upload/cost_images/'.$value->image):url('upload/No-image.jpg')}}"  width="90px" height="60px">
              </td>
              <td>
               <a title="Edit" href="{{route('account.cost.edit',$value->id)}}" class="btn btn-sm btn-primary" ><i class="fa fa-edit"></i></a>
              </td>
             </tr>
            @endforeach
           </tbody>
          </table>

         </div>

        </div>
        <!-- /.card -->

      </div>
     <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
 </section>
    
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->


  @endsection
