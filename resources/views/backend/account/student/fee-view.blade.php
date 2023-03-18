@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  
  <div class="content-header">
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Student Fee</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student Fee</li>
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
          <h3>Student Fee List
           <a href="{{route('student.fee.add')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-plus-circle"></i> Add/Edit Student Fee</a>
          </h3>
         </div>

         <!-- /.card-header -->
         <div class="card-body">

          <table id="example1" class="table table-bordered table-striped">    
           <thead>
            <tr>
             <th>SL</th>
             <th>Id No</th>
             <th>Name</th>
             <th>Year</th>
             <th>Class</th>
             <th>Fee Type </th>
             <th>Amount</th>
             <th>Date</th>
            </tr>
           </thead>
           <tbody>
            @foreach($alldata as $key => $value)
             <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value['student']['id_no'] }}</td>
              <td>{{ $value['student']['name'] }}</td>
              <td>{{ @$value['year']['name'] }}</td>
              <td>{{ $value['class']['name'] }}</td>
              <td>{{ $value['fee_category']['name'] }}</td>
              <td>{{ $value->amount }}</td>
              <td>{{ date('M-Y',strtotime($value->date)) }}</td>
             
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
