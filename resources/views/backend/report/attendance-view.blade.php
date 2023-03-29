@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  
  <div class="content-header">
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Employee Attendance Report </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Attendance Report </li>
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
	        <h3>search Critetia</h3>
	       </div>

	      <div class="card-body">
        <form method="GET" action="{{ route('report.attendance.get') }}" id="myForm" target="_blank">

	        <div class="form-row">
	         
          <div class="form-group col-md-3">
	          <label for="employee_id">Employee Name</label>
	          <select name="employee_id" id="employee_id" class="form-control">
            <option value="">Select Employee</option>
            @foreach($employee as $emp)
             <option value="{{ $emp->id }}">{{ $emp->name }}</option>
            @endforeach
           </select>
	         </div>

	         <div class="form-group col-md-3">
	          <label for="date">Date</label>
	          <input type="date" id="date" name="date"  class="form-control form-control-sm" placeholder="DD-MM-YYYY">
	         </div>

	         <div class="form-group col-md-3" style="padding-top:30px;">
           <button type="submit" class="btn btn-success" >Search</button>
	         </div>

	        </div>
        </form>
	      </div>

      </div>
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

    employee_id: {
     required: true,
    },

    date: {
     required: true,
    },


    },
    messages: {
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
