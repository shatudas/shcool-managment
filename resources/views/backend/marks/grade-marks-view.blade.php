@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  
  <div class="content-header">
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Grade Point</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Grade Point</li>
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
          <h3>Employee Grade Point List
           <a href="{{route('grade.add')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-plus-circle"></i> Add Grade Point</a>
          </h3>
         </div>

         <!-- /.card-header -->
         <div class="card-body">

          <table id="example1" class="table table-bordered table-striped">    
           <thead>
            <tr>
             <th>SL</th>
             <th>Grade Name</th>
             <th>Grade Point</th>
             <th>Start Marks</th>
             <th>End Marks</th>
             <th>Point Range</th>
             <th>Remarks</th>
             <th>Action</th>
            </tr>
           </thead>
           <tbody>
            @foreach($alldata as $key => $value)
             <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->grade_name }}</td>
              <td>{{ $value->grade_point }}</td>
              <td>{{ $value->start_marks }}</td>
              <td>{{ $value->end_marks }}</td>
              <td>{{ $value->start_point }} - {{ $value->end_point }}</td>
              <td>{{ $value->remarks }}</td>
             
                
              <td>
               <a title="Edit" href="{{route('grade.edit',$value->id)}}" class="btn btn-sm btn-primary" ><i class="fa fa-edit"></i></a>
               
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
