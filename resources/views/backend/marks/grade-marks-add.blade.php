@extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Grade Point</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Grade Point</li>
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
            @if(isset($editdata))
             Edit Grade Point
             @else
              Add Grade Point
             @endif

             <a href="{{route('grade.view')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-list"></i> Grade Point List</a>
                </h3>
              </div>
              <!-- /.card-header -->

              <form method="POST" action="{{ (@$editdata)? route('grade.update',$editdata->id):route('grade.store') }}" id="myForm">
              @csrf

              <div class="card-body">
               <div class="form-row">
                <div class="form-group col-md-4">
                 <label>Grade Name</label>
                 <input type="text" name="grade_name" value="{{ @$editdata->grade_name }}" class="form-control">
                </div>
                <div class="form-group col-md-4">
                 <label>Grade Point</label>
                 <input type="text" name="grade_point" value="{{ @$editdata->grade_point }}" class="form-control">
                </div>
                <div class="form-group col-md-4">
                 <label>Start Marks</label>
                 <input type="text" name="start_marks" value="{{ @$editdata->start_marks }}" class="form-control">
                </div>
                <div class="form-group col-md-4">
                 <label>End Marks</label>
                 <input type="text" name="end_marks" value="{{ @$editdata->end_marks }}" class="form-control">
                </div>
                <div class="form-group col-md-4">
                 <label>Start Point</label>
                 <input type="text" name="start_point" value="{{ @$editdata->start_point }}" class="form-control">
                </div>
                <div class="form-group col-md-4">
                 <label>End Point</label>
                 <input type="text" name="end_point" value="{{ @$editdata->end_point }}" class="form-control">
                </div>
                <div class="form-group col-md-4">
                 <label>Remaeks</label>
                 <input type="text" name="remarks" value="{{ @$editdata->remarks }}" class="form-control">
                </div>

                <div class="form-group col-md-4" style="padding-top:30px;">
                 <button type="submit" class="btn btn-success">{{ (@$editdata) ? 'Update' : 'Submit' }}</button>
                </div>
               </div>
              </div>
               
               
            </form>
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

    grade_name: {
     required: true,
    },
    grade_point: {
     required: true,
    },
    start_marks: {
     required: true,
    },
    end_marks: {
     required: true,
    },
    start_point: {
     required: true,
    },
    end_point: {
     required: true,
    },
    remarks: {
     required: true,
    },
    },
    messages: {
     grade_name: {
        required: "Please Enter Grade Name",
      },
      grade_point: {
        required: "Please Grade point",
      },
      start_marks: {
        required: "Please Start Marks",
      },
      end_marks: {
        required: "Please End Marks",
      },
      start_point: {
        required: "Please Start Point",
      },
      end_point: {
        required: "Please End Point",
      },
      remarks: {
        required: "Please Remarks",
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