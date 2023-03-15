@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  
  <div class="content-header">
   <div class="container-fluid">
    <div class="row mb-2">
     <div class="col-sm-6">
      <h1 class="m-0">Manage Monthly Salary</h1>
     </div><!-- /.col -->
     <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
       <li class="breadcrumb-item"><a href="#">Home</a></li>
       <li class="breadcrumb-item active">Monthly Salary</li>
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
          <h3>Select Date</h3>
         </div>


         <!-- /.card-header -->
         <div class="card-body">
          <div class="form-row">
           <div class="form-group col-md-4">
            <label>Data</label>
            <input type="date" name="date" id="date" class="form-control form-control-sm" placeholder="Date" >
           </div>
           <div class="form-group col-md-2">
            <a class="btn btn-sm btn-success" name="search" id="search" style="margin-top:29px; color:white;">search</a>
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

 <script type="text/javascript">
   $(document).on('click','#search',function(event){
    event.preventDefault();
    var date = $('#date').val();
    $('.notifyjs-corner').html('');

    if(date == ''){
     $.notify("Year required", {globalPosition: 'top right',className: 'error'});
     return false;
    }
    
    

    $.ajax({
     url: "{{route('employees.monthly.salary.get')}}",
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

 