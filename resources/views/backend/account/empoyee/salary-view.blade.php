@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  
  <div class="content-header">
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Employee Salary </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Salary</li>
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
          <h3>Employee Salary List
           <a href="{{route('account.salary.add')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-plus-circle"></i> Add/Edit Employee Salary</a>
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
             <th>Amount</th>
             <th>Date</th>
            </tr>
           </thead>
           <tbody>
            @foreach($alldata as $key => $value)
             <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value['user']['id_no'] }}</td>
              <td>{{ $value['user']['name'] }}</td>
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
