@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  
  <div class="content-header">
    <div class="container-fluid">
     <div class="row mb-2">
      <div class="col-sm-6">
       <h1 class="m-0">Manage Other Cost</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
       <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Other Cost</li>
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
        <h3>
         @if(isset($editdata))
          Edit Other Cost 
         @else
          Add Other Cost 
         @endif
        </h3>

        <a href="{{route('account.cost.view')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-list"></i> Other Cost List</a>
       </div>


       <div class="card-body">
        <form method="POST" action=" {{ (@$editdata)? route('account.cost.update',$editdata->id):route('account.cost.store') }}" id="myForm" enctype="multipart/form-data">
         @csrf
         
         <div class="form-row">

          <div class="form-group col-md-3">
           <label for="date">Date</label>
           <input type="text" id="datepicker" name="date" class="form-control" value="{{@$editdata->date}}">
           <font style="color:red">{{($errors->has('date'))?($errors->first('date')):'' }}</font>
          </div>

          <div class="form-group col-md-3">
           <label for="amount">Amount</label>
           <input type="text" name="amount" class="form-control" value="{{@$editdata->amount}}">
           <font style="color:red">{{($errors->has('amount'))?($errors->first('amount')):'' }}</font>
          </div>

          <div class="form-group col-md-2">
           <label for="image">Image</label>
           <input type="file" name="image" class="form-control" id="image">
          </div>

          <div class="form-group col-md-4">
           <img id="showImage" src="{{!empty($editdata->image)?url('upload/cost_images/'.$editdata->image):url('public/upload/No-image.jpg')}}" style="width:80px; height:60px; border:1px solid #ccc;">
          </div>

          <div class="form-group col-md-12">
           <label for="image">Description</label>
           <textarea name="description" class="form-control" rows="4">{{ @$editdata->description }}</textarea>
          </div>

          <div class="form-group col-md-4">
           <button type="submit" class="btn btn-primary">{{(@$editdata)?'Update':'Submit'}}</button>
          </div>

         </div>
        </form>
        
       </div>
      </div>

  
    

      </div>  
     </div>
    </div>
  </section>
  
 </div>
 <!-- /.content-wrapper -->


 <script>
$(function () {
  $('#myForm').validate({
    rules: {

    date: {
     required: true,
    },
    amount: {
     required: true,
    },
    description: {
     required: true,
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
















