@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Employee</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee</li>
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
            Edit Employee 
           @else
            Add Employee
           @endif
           <a href="{{route('employees.reg.view')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-list"></i> Employee List</a>
          </h3>
         </div>
              
         <!-- /.card-header -->
         <div class="card-body">
          <form method="POST" action=" {{ (@$editdata)? route('employees.reg.update',$editdata->id):route('employees.reg.store') }}" id="myForm" enctype="multipart/form-data">
           @csrf

           <div class="form-row">
            
            <div class="form-group col-md-4">
             <label for="name">Employee Name <font style="color:red">*</font> </label>
             <input type="text" name="name" class="form-control form-control-sm" value="{{ @$editdata->name }}">
             <font style="color:red">{{($errors->has('name'))?($errors->first('name')):'' }}</font>
            </div>

            <div class="form-group col-md-4">
             <label for="fname">Father's Name <font style="color:red">*</font> </label>
             <input type="text" name="fname" class="form-control form-control-sm" value="{{ @$editdata->fname }}">
             <font style="color:red">{{($errors->has('fname'))?($errors->first('fname')):'' }}</font>
            </div>

            <div class="form-group col-md-4">
             <label for="mname">Mother's Name <font style="color:red">*</font> </label>
             <input type="text" name="mname" class="form-control form-control-sm" value="{{ @$editdata->mname }}">
             <font style="color:red">{{($errors->has('mname'))?($errors->first('mname')):'' }}</font>
            </div>
            
            <div class="form-group col-md-4">
             <label for="mobile">Mobile Number <font style="color:red">*</font> </label>
             <input type="text" name="mobile" class="form-control form-control-sm" value="{{ @$editdata->mobile }}">
             <font style="color:red">{{($errors->has('mobile'))?($errors->first('mobile')):'' }}</font>
            </div>

            <div class="form-group col-md-4">
             <label for="mobile">Email</label>
             <input type="email" name="email" class="form-control form-control-sm" value="{{ @$editdata->email }}">
             <font style="color:red">{{($errors->has('email'))?($errors->first('email')):'' }}</font>
            </div>

            <div class="form-group col-md-4">
             <label for="address">Address <font style="color:red">*</font> </label>
             <input type="text" name="address" class="form-control form-control-sm" value="{{ @$editdata->address }}">
             <font style="color:red">{{($errors->has('address'))?($errors->first('address')):'' }}</font>
            </div>

            <div class="form-group col-md-4">
             <label for="gender">Gender <font style="color:red">*</font> </label>
             <select name="gender" class="form-control form-control-sm">
               <option value="">Select Gender</option>
               <option value="Male" {{ @($editdata->gender == 'Male')?'selected':'' }} >Male</option>
               <option value="Female" {{ @($editdata->gender == 'Female')?'selected':'' }}>Female</option>
             </select>
             <font style="color:red">{{($errors->has('gender'))?($errors->first('gender')):'' }}</font>
            </div>

            <div class="form-group col-md-4">
             <label for="religion">Religion <font style="color:red">*</font> </label>
             <select name="religion" class="form-control form-control-sm">
               <option value="">Select Religion</option>
               <option value="Islam"  {{ @($editdata->religion == 'Islam')?'selected':'' }} >Islam</option>
               <option value="Humdu" {{ @($editdata->religion == 'Humdu')?'selected':'' }}>Humdu</option>
               <option value="Other" {{ @($editdata->religion == 'Other')?'selected':'' }}>Other</option>
             </select>
             <font style="color:red">{{($errors->has('religion'))?($errors->first('religion')):'' }}</font>
            </div>

            <div class="form-group col-md-4">
             <label for="dob">Date Of Birth <font style="color:red">*</font> </label>
             <input type="text" name="dob" class="form-control form-control-sm" value="{{ @$editdata->dob }}" id="datepicker" autocomplete="off">
             <font style="color:red">{{($errors->has('dob'))?($errors->first('dob')):'' }}</font>
            </div>

            <div class="form-group col-md-4">
             <label for="designation_id">Designation <font style="color:red">*</font> </label>
             <select name="designation_id" class="form-control form-control-sm">
              <option value="">Select Designation</option>
              @foreach($designation as $designations)
               <option value="{{ $designations->id }}" {{(@$editdata->designation_id==$designations->id)?'selected':'' }}>{{ $designations->name }}</option>
               @endforeach
             </select>
             <font style="color:red">{{($errors->has('designation_id'))?($errors->first('designation_id')):'' }}</font>
            </div>

            <div class="form-group col-md-4">
             <label for="join_date">Join Date <font style="color:red">*</font> </label>
             <input type="date" name="join_date" class="form-control form-control-sm" value="{{ @$editdata->join_date }}" id="datepicker" autocomplete="off">
             <font style="color:red">{{($errors->has('join_date'))?($errors->first('join_date')):'' }}</font>
            </div>

            <div class="form-group col-md-4">
             <label for="salary">Salary <font style="color:red">*</font> </label>
             <input type="text" name="salary" class="form-control form-control-sm" value="{{@$editdata->salary }}">
             <font style="color:red">{{($errors->has('salary'))?($errors->first('salary')):'' }}</font>
            </div>

             <div class="form-group col-md-2">
              <label for="image">Image</label>
              <input type="file" name="image" class="form-control form-control-sm" id="image">
              <font style="color:red">{{($errors->has('image'))?($errors->first('image')):'' }}</font>
             </div>

             <div class="form-group col-md-2">
              <img id="showImage" src="{{ (!empty($editdata->image))?url('upload/student_images/'.$editdata->image):url('upload/No-image.jpg')}}" style="width:100px; height:100px; border:1px solid #ccc;">
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

    salary: {
     required: true,
    },

    dob: {
     required: true,
    },

    designation_id: {
     required: true,
    },

    join_date: {
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
      salary: {
        required: "Please Enter  Salary",
      },


      designation_id: {
        required: "Please Select designation",
      },
      join_date: {
        required: "Please Enter join date",
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