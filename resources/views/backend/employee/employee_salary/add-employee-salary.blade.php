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
          <h3> InCrement Employee Salary
            <a href="{{route('employees.salary.view')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-list"></i> Employee List</a>
          </h3>
         </div>

         <!-- /.card-header -->
         <div class="card-body">
          <form method="POST" action=" {{ route('employees.salary.store',$editData->id) }}" id="myForm">
           @csrf
            <div class="form-row">
             <div class="form-group col-md-4">
              <label for="name">Salary Amount</label>
              <input type="number" name="increment_salary" class="form-control"  placeholder="Salary Amount">
              <font style="color:red">{{($errors->has('increment_salary'))?($errors->first('increment_salary')):'' }}</font>
             </div>


             <div class="form-group col-md-4">
              <label for="effected_date">Effected Date</label>
              <input type="text" name="effected_date" class="form-control " id="datepicker" placeholder="Date" >
              <font style="color:red">{{($errors->has('effected_date'))?($errors->first('effected_date')):'' }}</font>
             </div>

             <div class="form-group col-md-6">
              <button type="submit" class="btn btn-primary"> Submit </button>
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

       increment_salary: {
        required: true,
       },

        effected_date: {
        required: true,
       },
        
       },
       messages: {
        increment_salary: {
           required: "Please Increment Salary",
         },
        effected_date: {
           required: "Please Effected Datee",
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