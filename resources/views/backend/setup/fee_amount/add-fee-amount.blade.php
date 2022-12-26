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
          <h3>
           @if(isset($editData))
           Edit Fee Amount
           @else
           Add Fee Amount
           @endif
           <a href="{{route('fee.amount.view')}}" class=" btn btn-success btn-sm float-right"> 
           <i class="fa fa-list"></i> Fee Amount List</a>
          </h3>
         </div>

         <!-- /.card-header -->
         <div class="card-body">
          <form method="POST" action="{{ (@$editData)? route('fee.amount.update',$editData->id):route('fee.amount.store') }}" id="myForm">
          @csrf

           <div class="add_item">
            
            <div class="form-row">
             <div class="form-group col-md-5">
              <label for="fee_category_id">Fee Category</label>
              <select name="fee_category_id" class="form-control">
               <option value="">Select Fee category</option>
               @foreach($fee_categorys as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
     
               @endforeach
              </select>
             </div>
            </div>

            <div class="form-row">
             <div class="form-group col-md-5">
              <label for="class">Class</label>
              <select name="class[]" class="form-control">
               <option value="">Select Class</option>
               @foreach($classes as $class)
                <option value="{{ $class->id }}">{{ $class->name }}</option>
               @endforeach
              </select>
             </div>
             <div class="form-group col-md-5">
              <label for="class">amount</label>
              <input type="text" name="amount[]" class="form-control" placeholder="Enter Amount..">
             </div>
             <div class="form-group col-md-1" style="padding-top:30px;">
              <span class="btn btn-success addeventmore">
               <i class="fa fa-plus-circle"></i>
              </span>
             </div>
            </div>

           </div>
           <button type="submit" class="btn btn-primary">{{(@$editData)?'Update':'Submit'}}</button>
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



<div class="form-row"  style="visibility: hidden;">
 <div class="whole_extra_item_add" id="whole_extra_item_add">
  <div class="delete_whole_extra_add" id="delete_whole_extra_add">
    
    <div class="form-row">
     <div class="form-group col-md-5">
      <label for="class">Class</label>
      <select name="class[]" class="form-control">
       <option value="">Select Class</option>
       @foreach($classes as $class)
        <option value="{{ $class->id }}">{{ $class->name }}</option>
       @endforeach
      </select>
     </div>

     <div class="form-group col-md-5">
      <label for="class">amount</label>
      <input type="text" name="amount[]" class="form-control" placeholder="Enter Amount..">
    </div>

    <div class="form-group col-md-1" style="padding-top:30px;">
     <div class="form-row">
      <span class="btn btn-success addeventmore">
       <i class="fa fa-plus-circle"></i>
      </span>
      <span class="btn btn-danger removeeventmore">
       <i class="fa fa-minus-circle"></i>
      </span>
     </div>
    </div>
   
   </div>
  </div>
 </div>
</div>


<script type="text/javascript">
 $(document).ready(function (){
  var counter = 0;
  $(document).on("click",".addeventmore", function() {
   var whole_extra_item_add = $("#whole_extra_item_add").html();
   $(this).closest(".add_item").append(whole_extra_item_add);
   counter++;
  });
  $(document).on("click", ".removeeventmore", function (event){
   $(this).closest(".delete_whole_extra_add").remove();
   counter -=1
  });
 });
</script>



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