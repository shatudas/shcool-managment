@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <div class="content-header">
  <div class="container-fluid">
   <div class="row mb-2">
    <div class="col-sm-6">
     <h1 class="m-0">Manage Fee Category Amount</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
     <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Fee Amount</li>
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
       <h3>Fee Fee Amount Detalis
        <a href="{{ route('fee.amount.view') }}" class=" btn btn-success btn-sm float-right"> 
        <i class="fa fa-list"></i> Fee Amount List</a>
       </h3>
      </div>

      <!-- /.card-header -->
      <div class="card-body">
       <h4><strong>Fee category :{{ $editData['0']['fee_category']['name'] }} </strong></h4>
      
       <table  class="table table-bordered table-striped">
        <thead>
         <tr>
          <th>SL</th>
          <th>Class </th>
          <th>Amount</th>
         </tr>
        </thead>
        <tbody>
         @foreach($editData as $key => $value)
          <tr>
           <td>{{ $key+1 }}</td>
           <td>{{ $value['student_class']['name'] }}</td>
           <td>{{ $value->amount }}</td>
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



<script>
 $(function () {
  $('#myForm').validate({
    rules: {
     "fee_category_id": {
     required: true,
    },

    "class[]": {
     required: true,
    },
     "amount[]": {
     required: true,
    }
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