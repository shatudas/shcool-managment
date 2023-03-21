@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  
  <div class="content-header">
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage monthly/yearly Profit </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">monthly/yearly </li>
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

	       <div class="card-body">
	        <div class="form-row">
	         <div class="form-group col-md-4">
	          <label for="start_date">Start  Date</label>
	          <input type="date" id="start_date" name="start_date"  class="form-control form-control-sm" >
	         </div>
	         <div class="form-group col-md-4">
	          <label for="end_date">End  Date</label>
	          <input type="date" id="end_date" name="end_date"  class="form-control form-control-sm" >
	         </div>
	          <div class="form-group col-md-2">
	          <a class="btn btn-success" id="search" name="search" style="margin-top:30px;" >Search</a>
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
           <tr> 
             @{{{tdsource}}}
           </tr>
          </tbody>
         </table>
        </script>
       </div>



  


      </div>  

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


    <script type="text/javascript">
   $(document).on('click','#search',function(){
   
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val(); 
    $('.notifyjs-corner').html('');

    if(start_date == ''){
     $.notify("Start Date required", {globalPosition: 'top right',className: 'error'});
     return false;
    } 
      if(end_date == ''){
     $.notify("End Date required", {globalPosition: 'top right',className: 'error'});
     return false;
    } 

    $.ajax({
     url: "{{route('report.profit.get')}}",
     type: "GET",
     data: {'start_date':start_date,'end_date':end_date },
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
