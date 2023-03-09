@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Employee Salary</h1>
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
          <h3>Employee Salary Detalis Info
            <a href="{{route('employees.salary.view')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-list"></i> Employee List</a>
          </h3>
         </div>

         <!-- /.card-header -->
         <div class="card-body">
          <strong>Employee Name</strong> {{ $detalis->name }},
          <strong>ID NO</strong> {{ $detalis->if_no }},
          <table class="table table-bordered table-striped">
           <thead>
            <tr>
             <th>SL</th>
             <th>Previous Salary</th>
             <th>Incerment Salary</th>
             <th>Persent Salary</th>
             <th>Effected Date</th>
            </tr>
           </thead>
           
           <tbody>
            @foreach($salarylog as $key => $value)
               <tr>
                @if($key=='0')
                <td class="text-center" colspan="5"><strong>Joining Salary: {{ $value->previous_salary }}</strong></td>
                @else
                <td>{{ $key+1 }}</td>
                <td>{{ $value->previous_salary }}</td>
                <td>{{ $value->increment_salary }}</td>
                <td>{{ $value->present_salary }}</td>
                <td>{{ date('d-m-Y',strtotime($value->effected_date)) }}</td>
               @endif
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