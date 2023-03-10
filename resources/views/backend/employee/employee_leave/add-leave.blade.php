@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Employee Leave</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Leave</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>

 <!-- Main content -->
 <section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 ">

        <div class="card">
         <div class="card-header">
           <h3>
            @if(isset($editdata))Edit Employee Leave
             @else
              Add Employee Leave
             @endif

             <a href="{{route('employees.leave.view')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-list"></i> Employee Leave List</a>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <form method="POST" action="{{ (@$editdata)? route('employees.leave.update',$editdata->id):route('employees.leave.store') }}" id="myForm">
                @csrf
                <div class="form-row">

                <div class="form-group col-md-4">
                 <label for="employee_id">Employee Name</label>
                 <select name="employee_id" class="form-control form-control-sm">
                 <option value="">Select Employee</option>
                 @foreach($employees as $employee)
                  <option value="{{ $employee->id }}" {{(@$editdata->employee_id==$employee->id)?'selected':'' }}>{{ $employee->name }}</option>
                  @endforeach
                </select>
                 <font style="color:red">{{($errors->has('name'))?($errors->first('name')):'' }}</font>
                </div>

                <div class="form-group col-md-4">
                 <label for="start_date">Start Date</label>
                 <input type="text" name="start_date" class="form-control form-control-sm" value="{{ @$editdata->start_date }}" id="datepicker" autocomplete="off">
                 <font style="color:red">{{($errors->has('start_date'))?($errors->first('start_date')):'' }}</font>
                </div>

                <div class="form-group col-md-4">
                 <label for="end_date">End Date</label>
                 <input type="date" name="end_date" class="form-control form-control-sm" value="{{ @$editdata->end_date }}" id="datepicker" autocomplete="off">
                 <font style="color:red">{{($errors->has('end_date'))?($errors->first('end_date')):'' }}</font>
                </div>

                <div class="form-group col-md-4">
                 <label for="leave_parpose_id">Employee Parpose</label>
                 <select name="leave_parpose_id" id="leave_parpose_id" class="form-control form-control-sm">
                 <option value="">Select Parpose</option>
                 @foreach($parpose as $parpose)
                  <option value="{{ $parpose->id }}" {{(@$editdata->leave_parpose_id==$parpose->id)?'selected':'' }}>{{ $parpose->name }}</option>
                  @endforeach
                  <option value="0" >New Purpase</option>
                </select>
                <input type="text" name="name" class="form-control form-control-sm" placeholder="Write Purpase" id="add_others" style="display: none;">
                 <font style="color:red">{{($errors->has('name'))?($errors->first('name')):'' }}</font>
                </div>
                
               <div class="form-group col-md-6">
                <button type="submit" class="btn btn-primary">{{(@$editdata)?'Update':'Submit'}}</button>
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


  <script type="text/javascript">
   $(document).ready(function(){
    $(document).on('change','#leave_parpose_id',function(){
     var leave_parpose_id = $(this).val();
     if(leave_parpose_id== '0'){
      $('#add_others').show();
     }else{
      $('#add_others').hide();
     }
    });
   });
  </script>



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