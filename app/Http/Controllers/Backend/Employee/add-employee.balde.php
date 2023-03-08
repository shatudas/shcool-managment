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
          <h3>
           @if(isset($editdata))
            Edit Student 
           @else
            Add Student
           @endif
           <a href="{{route('student.registration.view')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-list"></i> Student List</a>
          </h3>
         </div>
              
         <!-- /.card-header -->
         <div class="card-body">
          <form method="POST" action=" {{ (@$editdata)? route('student.registration.update',$editdata->student_id):route('student.registration.store') }}" id="myForm" enctype="multipart/form-data">
           @csrf
           <input type="hidden" name="id" value="{{ @$editdata->id }}">
           <div class="form-row">
            
            <div class="form-group col-md-4">
             <label for="name">Student Name <font style="color:red">*</font> </label>
             <input type="text" name="name" class="form-control form-control-sm" value="{{@$editdata['student']['name']}}">
             <font style="color:red">{{($errors->has('name'))?($errors->first('name')):'' }}</font>
            </div>

            <div class="form-group col-md-4">
             <label for="fname">Father's Name <font style="color:red">*</font> </label>
             <input type="text" name="fname" class="form-control form-control-sm" value="{{@$editdata['student']['fname']}}">
             <font style="color:red">{{($errors->has('fname'))?($errors->first('fname')):'' }}</font>
            </div>

            <div class="form-group col-md-4">
             <label for="mname">Mother's Name <font style="color:red">*</font> </label>
             <input type="text" name="mname" class="form-control form-control-sm" value="{{@$editdata['student']['mname']}}">
             <font style="color:red">{{($errors->has('mname'))?($errors->first('mname')):'' }}</font>
            </div>
            
            <div class="form-group col-md-4">
             <label for="mobile">Mobile Number <font style="color:red">*</font> </label>
             <input type="text" name="mobile" class="form-control form-control-sm" value="{{@$editdata['student']['mobile']}}">
             <font style="color:red">{{($errors->has('mobile'))?($errors->first('mobile')):'' }}</font>
            </div>

            <div class="form-group col-md-4">
             <label for="address">Address <font style="color:red">*</font> </label>
             <input type="text" name="address" class="form-control form-control-sm" value="{{@$editdata['student']['address']}}">
             <font style="color:red">{{($errors->has('address'))?($errors->first('address')):'' }}</font>
            </div>

            <div class="form-group col-md-4">
             <label for="gender">Gender <font style="color:red">*</font> </label>
             <select name="gender" class="form-control form-control-sm">
               <option value="">Select Gender</option>
               <option value="Male" {{ @($editdata['student']['gender']=='Male')?'selected':'' }} >Male</option>
               <option value="Female" {{ @($editdata['student']['gender']=='Female')?'selected':'' }}>Female</option>
             </select>
             <font style="color:red">{{($errors->has('gender'))?($errors->first('gender')):'' }}</font>
            </div>

            <div class="form-group col-md-4">
             <label for="religion">Religion <font style="color:red">*</font> </label>
             <select name="religion" class="form-control form-control-sm">
               <option value="">Select Religion</option>
               <option value="Islam"  {{ @($editdata['student']['religion']=='Islam')?'selected':'' }} >Islam</option>
               <option value="Humdu" {{ @($editdata['student']['religion']=='Humdu')?'selected':'' }}>Humdu</option>
               <option value="Other" {{ @($editdata['student']['religion']=='Other')?'selected':'' }}>Other</option>
             </select>
             <font style="color:red">{{($errors->has('religion'))?($errors->first('religion')):'' }}</font>
            </div>

            <div class="form-group col-md-4">
             <label for="dob">Date Of Birth <font style="color:red">*</font> </label>
             <input type="text" name="dob" class="form-control form-control-sm" value="{{@$editdata['student']['dob']}}" id="datepicker" autocomplete="off">
             <font style="color:red">{{($errors->has('dob'))?($errors->first('dob')):'' }}</font>
            </div>

            <div class="form-group col-md-4">
             <label for="discount">Discount </label>
             <input type="text" name="discount" class="form-control form-control-sm" value="{{@$editdata['discount']['discount']}}">
            </div>

            <div class="form-group col-md-4">
             <label for="yesr_id">Year <font style="color:red">*</font> </label>
             <select name="yesr_id" class="form-control form-control-sm">
              <option value="">Year</option>
              @foreach($years as $year)
               <option value="{{ $year->id }}" {{(@$editdata->yesr_id==$year->id)?'selected':'' }}>{{ $year->name }}</option>
               @endforeach
             </select>
             <font style="color:red">{{($errors->has('name'))?($errors->first('name')):'' }}</font>
            </div>

            <div class="form-group col-md-4">
             <label for="class_id">Class <font style="color:red">*</font> </label>
             <select name="class_id" class="form-control form-control-sm">
              <option value="">Select Class</option>
              @foreach($classs as $class)
               <option value="{{ $class->id }}" {{(@$editdata->class_id==$class->id)?'selected':'' }}>{{ $class->name }}</option>
               @endforeach
             </select>
             <font style="color:red">{{($errors->has('class_id'))?($errors->first('class_id')):'' }}</font>
            </div>

            <div class="form-group col-md-4">
             <label for="group_id">Group</label>
             <select name="group_id" class="form-control form-control-sm">
              <option value="">Select Group</option>
              @foreach($groups as $group)
               <option value="{{ $group->id }}" {{(@$editdata->group_id==$group->id)?'selected':'' }}>{{ $group->name }}</option>
               @endforeach
             </select>
            </div>

            <div class="form-group col-md-4">
             <label for="shift_id">Shift</label>
             <select name="shift_id" class="form-control form-control-sm">
              <option value="">Select Shift</option>
              @foreach($shifts as $Shift)
               <option value="{{ $Shift->id }}" {{(@$editdata->shift_id==$Shift->id)?'selected':'' }}>{{ $Shift->name }}</option>
               @endforeach
             </select>
            </div>

             <div class="form-group col-md-4">
              <label for="image">Image</label>
              <input type="file" name="image" class="form-control form-control-sm" id="image">
              <font style="color:red">{{($errors->has('image'))?($errors->first('image')):'' }}</font>
             </div>

             <div class="form-group col-md-2">
              <img id="showImage" src="{{ (!empty($editdata['student']['image']))?url('upload/student_images/'.$editdata['student']['image']):url('upload/No-image.jpg')}}" style="width:100px; height:120px; border:1px solid #ccc;">
             </div>
           </div>
             <button type="submit" class="btn btn-primary">{{(@$editdata)?'Update':'Submit'}}</button>


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

    fname: {
     required: true,
    },

    mname: {
     required: true,
    },

    mobile: {
     required: true,
    },

    address: {
     required: true,
    },

    gender: {
     required: true,
    },

     religion: {
     required: true,
    },

    dob: {
     required: true,
    },

    yesr_id: {
     required: true,
    },

    class_id: {
     required: true,
    },
 


    
     
    },
    messages: {
     name: {
        required: "Please Enter Student name",
      },
       fname: {
        required: "Please Enter Father's name",
      },
       mname: {
        required: "Please Enter Mother's name",
      },
       mobile: {
        required: "Please Enter  Mobile Number",
      },
      address: {
        required: "Please Enter  Address",
      },
      gender: {
        required: "Please Select Gander",
      },
      religion: {
        required: "Please Select Religion",
      },
      dob: {
        required: "Please Enter  date Of Birth",
      },
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