@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Assing Subject</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Assing Subject</li>
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
           Edit Assing Subject
           @else
           Add Assing Subject
           @endif
           <a href="{{route('setups.assing.subject.view')}}" class=" btn btn-success btn-sm float-right"> 
           <i class="fa fa-list"></i>Assing Subject List</a>
          </h3>
         </div>

         <!-- /.card-header -->
         <div class="card-body">
          <form method="POST" action="{{ (@$editData)? route('setups.assing.subject.update',$editData->id):route('setups.assing.subject.store') }}" id="myForm">
          @csrf

           <div class="add_item">
            
            <div class="form-row">
             <div class="form-group col-md-3">
              <label for="class_id">Class</label>
              <select name="class_id" class="form-control">
               <option value="">Select Class</option>
               @foreach($classes as $classe)
                <option value="{{ $classe->id }}">{{ $classe->name }}</option>
               @endforeach
              </select>
             </div>
            </div>

            <div class="form-row">
             <div class="form-group col-md-3">
              <label for="subject_id">subject</label>
              <select name="subject_id[]" class="form-control">
               <option value="">Select subject</option>
               @foreach($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
               @endforeach
              </select>
             </div>

             <div class="form-group col-md-2">
              <label for="class">Full Mark</label>
              <input type="text" name="full_mark[]" class="form-control" placeholder="Enter Amount..">
             </div>
             <div class="form-group col-md-2">
              <label for="class">pass Mark</label>
              <input type="text" name="pass_work[]" class="form-control" placeholder="Enter Amount..">
             </div>
              <div class="form-group col-md-2">
              <label for="class">Subjective Mark</label>
              <input type="text" name="get_work[]" class="form-control" placeholder="Enter Amount..">
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
     <div class="form-group col-md-3">
              <label for="subject_id">subject</label>
              <select name="subject_id[]" class="form-control">
               <option value="">Select subject</option>
               @foreach($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
               @endforeach
              </select>
             </div>

             <div class="form-group col-md-2">
              <label for="class">Full Mark</label>
              <input type="text" name="full_mark[]" class="form-control" placeholder="Enter Amount..">
             </div>
             <div class="form-group col-md-2">
              <label for="class">pass Mark</label>
              <input type="text" name="pass_work[]" class="form-control" placeholder="Enter Amount..">
             </div>
              <div class="form-group col-md-2">
              <label for="class">Subjective Mark</label>
              <input type="text" name="get_work[]" class="form-control" placeholder="Enter Amount..">
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
     "class_id": {
     required: true,
    },

    "subject_id[]": {
     required: true,
    },
     "full_mark[]": {
     required: true,
    },
    "pass_work[]": {
     required: true,
    },
    "get_work[]": {
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