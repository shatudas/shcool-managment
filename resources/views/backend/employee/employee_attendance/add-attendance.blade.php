@extends('backend.layouts.master')
@section('content')

<style type="text/css">
 .switch-toggle{
  width:auto;
 } 
 .switch-toggle label:not(.disabled){
  cursor:pointer;
 }
 .switch-candy a{
  border: 1px solid #333;
  border-radius:3px;
  box-shadow:0 1px 1px rgba(0,0,0,0.2), inset 0 1px 1px rgba(255,255,255,0.45);
  background-color: white;
  background-image: -webkit-linear-gradient(top,rgba(255,255,255,0.2), transparent);
  background-image: linear-gradient(to bottom,rgba(255,255,255,0.2), transparent);
 }
 .switch-toggle .switch-candy .switch-light .switch-candy >span{
  background-color:#fa6268;
  border-radius: 3px;
  box-shadow: inset 0 2px 6px rgba(0,0,0,0.3), 0 1px 0 rgba(255, 255, 255, 0.2);
 }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Employee Attendance</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Attendance</li>
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
            @if(isset($editdata))Edit Employee Attendance
             @else
              Add Employee Attendance
             @endif

             <a href="{{route('employees.attendance.view')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-list"></i> Employee Attendance List</a>
                </h3>
              </div>
              <!-- /.card-header -->

              <form method="POST" action="{{route('employees.attendance.store') }}" id="myForm">
              @csrf
               
               @if(isset($editdata))
               <div class="card-body">
                <div class="form-row">
                 
                 <div class="form-group col-md-4">
                  <label for="employee_id">Attendance Date</label>
                  <input type="date" name="date" value="{{ $editdata['0']['date'] }}" class="form-control form-control-sm"  autocomplete="off" readonly>
                 </div>

                 <table class="table-sm tble-bordered table-striped dt-responsive" style="width:100%">
                  <thead>
                   <tr>
                    <th class="text-center" rowspan="2" style="vertical-align:middle;">Sl</th>
                    <th class="text-center" rowspan="2" style="vertical-align:middle;">Employee name</th>
                    <th class="text-center" colspan="3" style="vertical-align:middle; width:25%;">Attendance Status</th>
                   </tr>
                   <tr>
                    <th class="text-center btn present_all"  style="display: table-cell; background-color:#114190">Present</th>
                    <th class="text-center btn leave_all"  style="display: table-cell; background-color:#114190">Leave</th>
                    <th class="text-center btn absent_all"  style="display: table-cell; background-color:#114190">Absent</th>
                   </tr>
                  </thead>

                  <tbody>
                   @foreach($editdata as $key => $data)

                   <tr id="div{{$data->id}}" class="text-center">
                    <input type="hidden" name="employee_id[]" value="{{ $data->employee_id }}" class="Employee_id">
                    <td>{{ $key+1 }}</td>
                    <td>{{ $data['user']['name'] }}</td>
                    <td colspan="3">
                     <div class="switch-toggle switch-3 switch-candy">
                      <input class="present" id="present{{$key}}" name="attend_status{{$key}}" value="Present" type="radio"  {{ ($data->attend_status=='Present')?'checked':'' }} >
                      <label>Present</label>

                      <input class="leave" id="leave{{$key}}" name="attend_status{{$key}}" value="Leave" type="radio" {{ ($data->attend_status=='Leave')?'checked':'' }} >
                      <label>Leave</label>

                      <input class="absent" id="absent{{$key}}" name="attend_status{{$key}}" value="Absent" type="radio" {{ ($data->attend_status=='Absent')?'checked':'' }} >
                      <label>Absent</label>
                      <a></a>
                     </div>
                    </td>
                   </tr>

                   @endforeach
                  </tbody>
                 </table><br>

                 <button type="submit" class="btn btn-primary">{{(@$editdata)?'Update':'Submit'}}</button>
                </div>
               </div>
               @else
               <div class="card-body">
                <div class="form-row">
                 
                 <div class="form-group col-md-4">
                  <label for="employee_id">Attendance Date</label>
                  <input type="text" name="date" class="chackdate form-control form-control-sm" id="datepicker" autocomplete="off" >
                 </div>

                 <table class="table-sm tble-bordered table-striped dt-responsive" style="width:100%">
                  <thead>
                   <tr>
                    <th class="text-center" rowspan="2" style="vertical-align:middle;">Sl</th>
                    <th class="text-center" rowspan="2" style="vertical-align:middle;">Employee name</th>
                    <th class="text-center" colspan="3" style="vertical-align:middle; width:25%;">Attendance Status</th>
                   </tr>
                   <tr>
                    <th class="text-center btn present_all"  style="display: table-cell; background-color:#114190">Present</th>
                    <th class="text-center btn leave_all"  style="display: table-cell; background-color:#114190">Leave</th>
                    <th class="text-center btn absent_all"  style="display: table-cell; background-color:#114190">Absent</th>
                   </tr>
                  </thead>

                  <tbody>
                   @foreach($employees as $key => $value)

                   <tr id="div{{$value->id}}" class="text-center">
                    <input type="hidden" name="employee_id[]" value="{{ $value->id }}" class="Employee_id">
                    <td>{{ $key+1 }}</td>
                    <td>{{ $value->name }}</td>
                    <td colspan="3">
                     <div class="switch-toggle switch-3 switch-candy">
                      <input class="present" id="present{{$key}}" name="attend_status{{$key}}" value="Present" type="radio" checked="checked">
                      <label>Present</label>

                      <input class="leave" id="leave{{$key}}" name="attend_status{{$key}}" value="Leave" type="radio">
                      <label>Leave</label>

                      <input class="absent" id="absent{{$key}}" name="attend_status{{$key}}" value="Absent" type="radio">
                      <label>Absent</label>
                      <a></a>
                     </div>
                    </td>
                   </tr>

                   @endforeach
                  </tbody>
                 </table><br>

                 <button type="submit" class="btn btn-primary">{{(@$editData)?'Update':'Submit'}}</button>
                </div>
               </div>
               @endif

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


  <script type="text/javascript">
   $(document).on('click','.present',function(){
    $(this).parents('tr').find('.datetime').css('pointer-events','none').css('background-color','#dee2e6').css('color','#495057');
   });

   $(document).on('click','.leave',function(){
    $(this).parents('tr').find('.datetime').css('pointer-events','').css('background-color','white').css('color','#495057');
   });

   $(document).on('click','.absent',function(){
    $(this).parents('tr').find('.datetime').css('pointer-events','none').css('background-color','#dee2e6').css('color','#dee2e6');
   });
  </script>

  <script type="text/javascript">
   $(document).on('click','.present_all', function(){
     $("input[value=Present]").prop('checked',true);
    $('.datetime').css('pointer-events','none').css('background-color','#dee2e6').css('color','#495057');
   });

   $(document).on('click', '.leave_all', function(){
     $("input[value=Leave]").prop('checked',true);
    $('.datetime').css('pointer-events','').css('background-color','white').css('color','#495057');
   });
   
   $(document).on('click', '.absent_all', function(){
     $("input[value=Absent]").prop('checked',true);
    $('.datetime').css('pointer-events','none').css('background-color','dee2e6').css('color','#495057');
   });

  </script>


  <script>
   $(function () {
    $('#myForm').validate({
    rules: {

    date: {
     required: true,
    },
     
    },
    messages: {
     name: {
        required: "Please Select Date",
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