@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Shift</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Shift</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>

 <!-- Main content -->
 <section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-8 ">

        <div class="card">
         <div class="card-header">
           <h3>
            @if(isset($editData))Edit Student Shift
             @else
              Add Student Shift
             @endif

             <a href="{{route('setups.student.shift.view')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-list"></i> Student Shift</a>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <form method="POST" action=" {{ (@$editData)? route('setups.student.shift.update',$editData->id):route('setups.student.shift.store') }}" id="myForm">
                @csrf
                <div class="form-row">

                <div class="form-group col-md-12">
                 <label for="name">Student Shift</label>
                 <input type="text" name="name" class="form-control" value="{{@$editData->name}}">
                 <font style="color:red">{{($errors->has('name'))?($errors->first('name')):'' }}</font>
                </div>

               <div class="form-group col-md-6">
                <button type="submit" class="btn btn-primary">{{(@$editData)?'Update':'Submit'}}</button>
               </div>

              </div>
             </form>

        
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

    name: {
     required: true,
    },
     
    },
    messages: {
     name: {
        required: "Please enter name",
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