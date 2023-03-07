@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  
  <div class="content-header">
    <div class="container-fluid">
     <div class="row mb-2">
      <div class="col-sm-6">
       <h1 class="m-0">Manage Monthly Fee</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
       <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Fee</li>
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

       <div  class="card-body">

         <div class="form-row">
          <div class="form-group col-md-3">
           <label for="yesr_id">Year <font style="color:red">*</font> </label>
           <select name="yesr_id" id="yesr_id" class="form-control form-control-sm">
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
           <label for="month">Month <font style="color:red">*</font> </label>
           <select name="month" id="month" class="form-control form-control-sm">
            <option value="">Select month</option>
            <option value="january">January</option>
            <option value="February">February</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
           </select>
          </div>

          <div class="form-group col-md-3" style="padding-top:30px;">
           <a id="search" class="btn btn-primary" name="search">Search</a>
          </div>
         </div>

       </div>



       <div class="card-body">
        <div id="DocumentResults"></div>
        <script id="document-template" type="text/x-handlebars-template">

        <table class="table-sm table-bordered table-striped" style="width:100%">
         <thead>
          <tr>
           @{{{thsource}}}
          </tr>
         </thead>
         <tbody>
          @{{#each this}}
          <tr>
           <td>
            @{{{tdsource}}}
           </td>
          </tr>
          @{{/each}}
         </tbody>
        </table>
        </script>
       </div>


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
    var yesr_id = $('#yesr_id').val();
    var class_id = $('#class_id').val();
    var month = $('#month').val();
    $('.notifyjs-corner').html('');

    if(yesr_id == ''){
     $.notify("Year required", {globalPosition: 'top right',className: 'error'});
     return false;
    }
    if(class_id == ''){
     $.notify("Class required", {globalPosition: 'top right',className: 'error'});
     return false;
    } 
    if(month == ''){
     $.notify("Month required", {globalPosition: 'top right',className: 'error'});
     return false;
    } 

    $.ajax({
     url: "{{route('student.monthly.fee.get-student')}}",
     type: "get",
     data: {'yesr_id':yesr_id,'class_id':class_id,'month':month},
     beforeSend: function() {
     },
     success: function(data){
      var source = $("#document-template").html();
      var template = Handlebars.compile(source);
      var html = template(data);
      $("#DocumentResults").html(html);
      $('[data-toggle="tooltip"]').tooltip();
     }
    });
   });
  </script>



@endsection

