@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  
  <div class="content-header">
    <div class="container-fluid">
     <div class="row mb-2">
      <div class="col-sm-6">
       <h1 class="m-0">Manage Maeks Edit</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
       <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Maeks Edit</li>
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
        <h3>Search Critetia</h3>
       </div>

       <form method="post"  action="{{ Route('marks.update') }}" id="myForm">
         @csrf

        <div  class="card-body">
       
         <div class="form-row">
          <div class="form-group col-md-3">
           <label for="year_id">Year <font style="color:red">*</font> </label>
           <select name="year_id" id="year_id" class="form-control form-control-sm">
            <option value=""> Select Year</option>
            @foreach($years as $year)
             <option value="{{ $year->id }}">{{ $year->name }}</option>
            @endforeach
           </select>
           <font style="color:red">{{($errors->has('name'))?($errors->first('name')):'' }}</font>
          </div>

          <div class="form-group col-md-3">
           <label for="class_id">Class <font style="color:red">*</font> </label>
           <select name="class_id" id="class_id" class="form-control form-control-sm">
            <option value="">Select Class</option>
            @foreach($classs as $class)
            <option value="{{ $class->id }}">{{ $class->name }}</option>
            @endforeach
           </select>
           <font style="color:red">{{($errors->has('class_id'))?($errors->first('class_id')):'' }}</font>
          </div>

          <div class="form-group col-md-3">
           <label for="assign_subject_id">subject <font style="color:red">*</font> </label>
           <select name="assign_subject_id" id="assign_subject_id" class="form-control form-control-sm">
            <option value="">Select subject</option>

           </select>
           <font style="color:red">{{($errors->has('assign_subject_id'))?($errors->first('assign_subject_id')):'' }}</font>
          </div>

          <div class="form-group col-md-3">
           <label for="exam_type_id">Exam Type <font style="color:red">*</font> </label>
           <select name="exam_type_id" id="exam_type_id" class="form-control form-control-sm">
            <option value="">Select Exam Type</option>
            @foreach($exam_type as $exam)
            <option value="{{ $exam->id }}" >{{ $exam->name }}</option>
            @endforeach
           </select>
           <font style="color:red">{{($errors->has('exam_type_id'))?($errors->first('exam_type_id')):'' }}</font>
          </div>

          <div class="form-group col-md-3" >
           <a id="search" class="btn btn-primary" name="search">Search</a>
          </div>
         </div><br>
        </div>

        <div  class="card-body">
         <div class="row d-none" id="marks-enrty">
          <div class="col-md-12">
           <table class="table table-bordered table-strped dt-responsice" style="width:100%;"> 
            <thead>
             <tr>
              <th>ID No</th>
              <th>Student Name</th>
              <th>Father's Name</th>
              <th>Gender</th>
              <th>Marks</th>
             </tr>
            </thead>
            <tbody id="marks-enrty-tr">  
            </tbody>
           </table>
           <button type="submit" class="btn btn-success"> Update </button>
          </div>  
         </div>
        </div>

         

        
       </div>

       </form>


      </div>  
     </div>
    </div>
   </div>
  </section>
  
 </div>
 <!-- /.content-wrapper -->

  <script type="text/javascript">
   $(document).on('click','#search',function(event){
    event.preventDefault();
    var year_id = $('#year_id').val();
    var class_id = $('#class_id').val();
    var assign_subject_id = $('#assign_subject_id').val();
    var exam_type_id = $('#exam_type_id').val();
    $('.notifyjs-corner').html('');

    if(year_id == ''){
     $.notify("Year required", {globalPosition: 'top right',className: 'error'});
     return false;
    }
    if(class_id == ''){
     $.notify("Class required", {globalPosition: 'top right',className: 'error'});
     return false;
    } 

    if(assign_subject_id == ''){
     $.notify("Subject required", {globalPosition: 'top right',className: 'error'});
     return false;
    } 

    if(exam_type_id == ''){
     $.notify("Exam Type required", {globalPosition: 'top right',className: 'error'});
     return false;
    } 

    $.ajax({
     url: "{{route('getstudentmarks')}}",
     type: "GET",
     data: {'year_id':year_id, 'class_id':class_id, 'assign_subject_id':assign_subject_id, 'exam_type_id':exam_type_id },
     success: function(data){
      console.log(data)
      $('#marks-enrty').removeClass('d-none'); 
      var html = '';

      $.each(data, function(key,v){
       html +=
       '<tr>'+
        '<td>'+ v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"><input type="hidden" name="id_no[]" value="'+v.student.id_no+'"></td>'+
        '<td>'+ v.student.name+'</td>'+
        '<td>'+ v.student.fname+'</td>'+
        '<td>'+ v.student.gender+'</td>'+
        '<td><input type="text" class="form-control form-control-sm" name="marks[]" value="'+v.marks+'"></td>'+
       '</tr>';
        });
        $('#marks-enrty-tr').html(html);
        }
       });
      });
  </script>


  <script type="text/javascript">
   $(function(){
    $(document).on('change','#class_id',function(){
     var class_id =$('#class_id').val();
     $.ajax({
      url:"{{route('get-subject')}}",
      type:"GET",
      data:{class_id:class_id},
      success:function(data){
       var html ='<option value="">Select Subject</option>';
       $.each(data,function(key, v ){
       html+='<option value="'+v.id+'">'+v.subject.name+'</option>'
       });
       $('#assign_subject_id').html(html);
      }

     });
    });
   });
  </script>



  <script>
   $(function () {
     $('#myForm').validate({
       rules: {

       marks[]: {
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

