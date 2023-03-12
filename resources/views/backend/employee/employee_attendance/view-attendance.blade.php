@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  
  <div class="content-header">
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Employee Attendance</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Attendance</li>
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
          <h3>Employee Attendance List
           <a href="{{route('employees.attendance.add')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-plus-circle"></i> Add Employee Attendance</a>
          </h3>
         </div>

         <!-- /.card-header -->
         <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
                  
           <thead>
            <tr>
             <th>SL</th>
             <th>ID</th>
             <th>Name</th>
             <th>Date</th>
             <th>Attend Status</th>
             <th>Action</th>
            </tr>
           </thead>
            <tbody>
              @foreach($alldata as $key => $value)
               <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value['user']['id_no'] }}</td>
                <td>{{ $value['user']['name'] }}</td>
                <td>{{ date('d-m-Y',strtotime($value->date)) }}</td>
                <td>{{ $value->attend_status }}</td>
                
                <td>
                 <a title="Edit" href="{{route('employees.attendance.edit',$value->id)}}" class="btn btn-sm btn-primary" ><i class="fa fa-edit"></i></a>
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

  @push('js')
    <script>

      $(document).ready(function () {
   
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
      $(document).on('click', '#deleteButton', function (e) {
        
          e.preventDefault();
          var id = $(this).data('id');

          // alert(id);
          swal({
                  title: "Are you sure!",
                  type: "error",
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "Yes!",
                  showCancelButton: true,
              },
              function() {
                  $.ajax({
                      type: "POST",
                      url: "{{ route('setups.designation.delete') }}",
                      data: {id:id},
                      success: function (data) {
                            swal({
                                title: "deleted!",
                                type: "success"
                              },
                              function(isConfirm){
                                if (isConfirm){
                                  $('.'+id).fadeOut();
                                }
                              });
                          }         
                  });
          });
      });

      });
    </script>
  @endpush