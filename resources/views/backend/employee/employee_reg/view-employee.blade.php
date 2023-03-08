@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  
  <div class="content-header">
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Employee</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee</li>
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
          <h3>Employee List
           <a href="{{route('employees.reg.add')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-plus-circle"></i> Add Employee</a>
          </h3>
         </div>

         <!-- /.card-header -->
         <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
                  
           <thead>
            <tr>
             <th>SL</th>
             <th>ID No</th>
             <th>Name</th>
             <th>Mobile Number</th>
             <th>Email</th>
             <th>Address</th>
             <th>Genger</th>
             <th>Join Date</th>
             <th>Salary</th>
             @if(Auth::user()->role=="Admin")
              <th>Code</th>
             @endif
             <th>Action</th>
            </tr>
           </thead>
            <tbody>
              @foreach($alldata as $key => $value)
               <tr class="{{$value->id}}">
                <td>{{$key+1}}</td>
                <td>{{$value->id_no}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->mobile}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->address}}</td>
                <td>{{$value->gender}}</td>
                <td>{{date('d-m-Y',strtotime($value->join_date))}}</td>
                <td>{{$value->salary}}</td>
                @if(Auth::user()->role=="Admin")
                 <td>{{ $value->code }}</td>
                @endif
                <td>
                 <a title="Edit" href="{{route('employees.reg.edit',$value->id)}}" class="btn btn-sm btn-primary" ><i class="fa fa-edit"></i></a>
                 <a title="Detalis" target="_blank" href="{{route('employees.reg.detalis',$value->id)}}" class="btn btn-sm btn-success" ><i class="fa fa-eye"></i></a>
                 {{-- <a href="" id="deleteButton" class="btn btn-sm btn-danger" data-id="{{$value->id}}"><i class="fa fa-trash"></i></a> --}}
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