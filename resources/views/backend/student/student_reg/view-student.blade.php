@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Student</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student</li>
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
          <h3>Student List
           <a href="{{route('student.registration.add')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-plus-circle"></i> Add Student </a>
          </h3>
         </div>

         <div  class="card-body">

           <form method="GET" action="{{ Route('student.year.class') }}" id="myForm">
             <div class="form-row">

            <div class="form-group col-md-4">
             <label for="yesr_id">Year <font style="color:red">*</font> </label>
             <select name="yesr_id" class="form-control form-control-sm">
              <option value=""> Select Year</option>
              @foreach($years as $year)
               <option value="{{ $year->id }}" {{(@$yesr_id==$year->id)?"selected":""}}>{{ $year->name }}</option>
               @endforeach
             </select>
             <font style="color:red">{{($errors->has('name'))?($errors->first('name')):'' }}</font>
            </div>

            <div class="form-group col-md-4">
             <label for="class_id">Class <font style="color:red">*</font> </label>
             <select name="class_id" class="form-control form-control-sm">
              <option value="">Select Class</option>
              @foreach($classs as $class)
               <option value="{{ $class->id }}" {{(@$class_id==$class->id)?"selected":""}}>{{ $class->name }}</option>
               @endforeach
             </select>
             <font style="color:red">{{($errors->has('class_id'))?($errors->first('class_id')):'' }}</font>
            </div>


            <div class="form-group col-md-4" style="padding-top:30px;">
             <button type="submit" class="btn btn-primary" name="search">Search</button>
            </div>

             </div>
           </form>

         </div>

        <!-- /.card-header -->
        <div class="card-body">
         @if(!@search)
         <table id="example1" class="table table-bordered table-striped">
          <thead>
           <tr>
            <th width="7%">SL</th>
            <th>Name</th>
            <th>ID No</th>
            <th>Roll</th>
            <th>Year</th>
            <th>Class</th>
            @if(Auth::user()->role=="Admin")
             <th>Code</th>
            @endif
            <th>Image</th>
            <th width="12%">Action</th>
           </tr>
          </thead>
          <tbody>
           @foreach($alldata as $key => $value)
           <tr class="{{$value->id}}">
            <td>{{ $key+1 }}</td>
            <td>{{ $value['student']['name'] }}</td>
            <td>{{ $value['student']['id_no'] }}</td>
            <td>{{ $value->roll }}</td>
            <td>{{ $value['year']['name'] }}</td>
            <td>{{ $value['student_class']['name'] }}</td>
            @if(Auth::user()->role=="Admin")
             <th>{{ $value['student_class']['code'] }}</th>
            @endif
            <td>
             <img class="img-fluid" src="{{ (!empty($value['student']['image']))?url('upload/student_images/'.$value['student']['image']):url('upload/No-image.jpg')}}" style="height:70px; width:80px;"></td>
            <td width="15%">
             <a title="Edit" href="{{route('student.registration.edit',$value->student_id)}}" class="btn btn-sm btn-primary" ><i class="fa fa-edit"></i></a>

             <a title="promotion" href="{{route('student.registration.promotion',$value->student_id)}}" class="btn btn-sm btn-success" ><i class="fa fa-check"></i></a>

             <a title="detalis" target="_blank" href="{{route('student.registration.detallis',$value->student_id)}}" class="btn btn-sm btn-info" ><i class="fa fa-eye"></i></a>

             </a>
            </td>
           </tr>
           @endforeach
          </tbody>
         </table>
         @else

        <table id="example1" class="table table-bordered table-striped">
          <thead>
           <tr>
            <th width="7%">SL</th>
            <th>Name</th>
            <th>ID No</th>
            <th>Roll</th>
            <th>Year</th>
            <th>Class</th>
            @if(Auth::user()->role=="Admin")
             <th>Code</th>
            @endif
            <th>Image</th>
            <th width="12%">Action</th>
           </tr>
          </thead>
          <tbody>
           @foreach($alldata as $key => $value)
           <tr class="{{$value->id}}">
            <td>{{ $key+1 }}</td>
            <td>{{ $value['student']['name'] }}</td>
            <td>{{ $value['student']['id_no'] }}</td>
            <td>{{ $value->roll }}</td>
            <td>{{ $value['year']['name'] }}</td>
            <td>{{ $value['student_class']['name'] }}</td>
            @if(Auth::user()->role=="Admin")
             <th>{{ $value['student_class']['code'] }}</th>
            @endif
            <td>
             <img class="img-fluid" src="{{ (!empty($value['student']['image']))?url('upload/student_images/'.$value['student']['image']):url('upload/No-image.jpg')}}" style="height:70px; width:80px;"></td>
            <td width="15%">
             <a title="Edit" href="{{route('student.registration.edit',$value->student_id)}}" class="btn btn-sm btn-primary" ><i class="fa fa-edit"></i></a>

             <a title="promotion" href="{{route('student.registration.promotion',$value->student_id)}}" class="btn btn-sm btn-success" ><i class="fa fa-check"></i></a>

             <a title="detalis" target="_blank" href="{{route('student.registration.detallis',$value->student_id)}}" class="btn btn-sm btn-info" ><i class="fa fa-eye"></i></a>
             
             </a>
            </td>
           </tr>
           @endforeach
          </tbody>
         </table>

         @endif
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



    <script>
$(function () {
  $('#myForm').validate({
    rules: {

    yesr_id: {
     required: true,
    },

    class_id: {
     required: true,
    },
     
     
    },
    messages: {
       yesr_id: {
        required: "Please Select year",
      },
      class_id: {
        required: "Please Select Class",
      },
   





    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>


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
                      url: "{{ route('setups.student.year.delete') }}",
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
