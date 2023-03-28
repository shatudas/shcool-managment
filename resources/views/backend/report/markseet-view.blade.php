@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  
  <div class="content-header">
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Markseet Ganarate </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Markseet Ganarate </li>
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
        <form method="GET" action="{{ route('report.marksheet.get') }}" id="myForm" target="_blank">

	        <div class="form-row">
	         
          <div class="form-group col-md-3">
	          <label for="start_date">Year</label>
	          <select name="year_id" id="year_id" class="form-control">
            <option value="">Select Year</option>
            @foreach($years as $year)
             <option value="{{ $year->id }}">{{ $year->name }}</option>
            @endforeach
           </select>
	         </div>

          <div class="form-group col-md-3">
           <label for="class_id">Class</label>
           <select name="class_id" id="class_id" class="form-control">
            <option value="">Select Class</option>
            @foreach($classes as $class)
             <option value="{{ $class->id }}">{{ $class->name }}</option>
            @endforeach
           </select>
          </div>

          <div class="form-group col-md-3">
           <label for="exam_type_id">Exam Type</label>
           <select name="exam_type_id" id="exam_type_id" class="form-control">
            <option value="">Select Exam</option>
            @foreach($exam_types as $exam)
             <option value="{{ $exam->id }}">{{ $exam->name }}</option>
            @endforeach
           </select>
          </div>

	         <div class="form-group col-md-3">
	          <label for="id_no">ID No</label>
	          <input type="text" id="id_no" name="id_no"  class="form-control form-control-sm" >
	         </div>

	         <div class="form-group col-md-3">
           <button type="submit" class="btn btn-success" name="search">Search</button>
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

    year_id: {
     required: true,
    },
    class_id: {
     required: true,
    },
    exam_type_id: {
     required: true,
    },
    id_no: {
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
