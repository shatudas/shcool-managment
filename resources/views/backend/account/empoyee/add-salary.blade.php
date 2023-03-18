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
        <h3>search Critetia</h3>
        <a href="{{route('account.salary.view')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-list"></i> Employee Salary List</a>
       </div>

       <div class="card-body">
        <div class="form-row">
         <div class="form-group col-md-4">
          <label for="employee_id">Select Date</label>
          <input type="text" id="datepicker" name="date"  class="form-control form-control-sm" >
         </div>
          <div class="form-group col-md-2">
          <a class="btn btn-success" id="search" name="search" style="margin-top:30px;" >Search</a>
         </div>
        </div>
       </div>

        <div class="card-body">
         <div id="DocumentResults"></div>
         <script id="document-template" type="text/x-handlebars-template">
         <form method="POST" action="{{ route('account.salary.store') }}" >
          @csrf
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
         <button type="submit" class="btn btn-primary btn-sm "style="margin-top:10px;">Submit</button>
        </form>
        </script>
       </div>


      {{--  <div  class="card-body">

         <div class="form-row">
          <div class="form-group col-md-3">
           <label for="year_id">Year <font style="color:red">*</font> </label>
           <select name="year_id" id="year_id" class="form-control form-control-sm">
            <option value=""> Select Year</option>
            @foreach($years as $year)
             <option value="{{ $year->id }}">{{ $year->name }}</option>
            @endforeach
           </select>
           <font style="color:red">{{($errors->has('year_id'))?($errors->first('year_id')):'' }}</font>
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
           <label for="fee_category_id">Fee Type <font style="color:red">*</font> </label>
           <select name="fee_category_id" id="fee_category_id" class="form-control form-control-sm">
            <option value="">Fee Type</option>
            @foreach($fee_categorys as $fee)
            <option value="{{ $fee->id }}">{{ $fee->name }}</option>
            @endforeach
           </select>
           <font style="color:red">{{($errors->has('fee_category_id'))?($errors->first('fee_category_id')):'' }}</font>
          </div>

          <div class="form-group col-md-3">
           <label for="date">Date <font style="color:red">*</font> </label>
           <input type="date" id="date" name="date" class="form-control form-control-sm">
           <font style="color:red">{{($errors->has('date'))?($errors->first('date')):'' }}</font>
          </div>


          <div class="form-group col-md-3" style="padding-top:30px;">
           <a id="search" class="btn btn-primary" name="search">Search</a>
          </div>
         </div>

       </div> --}}



       {{-- <div class="card-body">
        <div id="DocumentResults"></div>
        <script id="document-template" type="text/x-handlebars-template">
        <form method="POST" action="{{ route('student.fee.store') }}" >
         @csrf
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
        <button type="submit" class="btn btn-primary btn-sm "style="margin-top:10px;">Submit</button>
       </form>
        </script>
       </div> --}}


      </div>  
     </div>
    </div>
   </div>
  </section>
  
 </div>
 <!-- /.content-wrapper -->

   <script type="text/javascript">
   $(document).on('click','#search',function(){
   
    var date = $('#datepicker').val(); 
    $('.notifyjs-corner').html('');

    if(date == ''){
     $.notify("Date required", {globalPosition: 'top right',className: 'error'});
     return false;
    } 

    $.ajax({
     url: "{{route('account.salary.getstudent')}}",
     type: "get",
     data: {'date':date},
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
















