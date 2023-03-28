@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  
  <div class="content-header">
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Markseet Ganarate </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Markseet Ganarate </li>
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
	        <h3>Student Marksheet</h3>
	       </div>

        <div class="card-body">
         <div style="border:1px solid #000; padding:7px;">
          <div class="row">
           <div class="col-md-2 text-center" style="float:right; width:120px; height:120px;">
            <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" class="img-fluid" >
           </div>
           <div class="col-md-2"></div>
           <div class="col-md-4 text-center">
            <h2>ABC SCHOOL</h2>
            <h3>DHAKA,BANGLADESH</h3>
            <h4>www.schoolmanagment.com</h4>
            {{ $allMarks['0']['exam_type']['name'] }}
           </div>
          </div>

          <div class="col-md-12">
           <hr style="border:solid 1px; width:100%; color:#DDD; margin-bottom: 0px;">
           <p style="text-align:right;"><u><i>Print Date :</i>{{ date("d M Y") }}</u></p> 
          </div>


          <div class="row">
           <div class="col-md-6">
            <table border="1" width="100%" cellpadding="9" cellspacing="2">
             @php
              $assing_student=App\Model\AssingStudent::where('yesr_id',$allMarks['0']->year_id)->where('class_id',$allMarks['0']->class_id)->first();
             @endphp
             <tr>
              <td width="50%">Student ID</td>
              <td width="50%">{{ $allMarks['0']['id_no'] }}</td>
             </tr>
             <tr>
              <td width="50%">Roll NO</td>
              <td width="50%">{{ $assing_student->roll }}</td>
             </tr>
             <tr>
              <td width="50%">Name</td>
              <td width="50%">{{ $allMarks['0']['student']['name'] }}</td>
             </tr>
             <tr>
              <td width="50%">Class</td>
              <td width="50%">{{ $allMarks['0']['student_class']['name'] }}</td>
             </tr>
             <tr>
              <td width="50%">Session</td>
              <td width="50%">{{ $allMarks['0']['year']['name'] }}</td>
             </tr>
            </table>
           </div>

           <div class="col-md-6">
            <table border="1" width="100%" cellpadding="1" cellspacing="1" class="text-center">
             <thead>
              <tr>
               <th>Letter Grade</th>
               <th>Marks Interval</th>
               <th>Grade Point</th>
              </tr>
             </thead>
             <tbody>
              @foreach($AllGreades as $mark)
              <tr>
               <td>{{ $mark->grade_name }}</td>
               <td>{{ $mark->start_marks }} - {{ $mark->end_marks }}</td>
               <td>{{ number_format((float)$mark->grade_point,2) }} - {{ ($mark->grade_point ==5)?(number_format((float)$mark->grade_point,2)):(number_format((float)$mark->grade_point+1,2) - (float)0.01) }}</td>
              </tr>
              @endforeach
             </tbody>
            </table>
           </div>
          </div><br>

          <div class="row">
           <div class="col-md-12">
            <table border="1" width="100%" cellspacing="1" cellpadding="1">
             <thead>
              <th class="text-center">SL</th>
              <th class="text-center">Sunject</th>
              <th class="text-center">Full Marks</th>
              <th class="text-center">Get Marks</th>
              <th class="text-center">Letter Grade</th>
              <th class="text-center">Grade Point</th>
             </thead>
             <tbody>
              @php
              $total_marks = 0;
              $total_point = 0;
              @endphp
              @foreach($allMarks as $key=>$mark)
               @php 
                $get_mark =$mark->marks;
                $total_marks= (float)$total_marks+(float)$get_mark;
                $total_subject = App\Model\StudentMarks::where('year_id',$mark->year_id)->where('class_id',$mark->class_id)->where('exam_type_id',$mark->exam_type_id)->where('student_id',$mark->student_id)->get()->count();
               @endphp

               <tr>
                <td class="text-center">{{ $key+1 }}</td>
                <td class="text-center">{{ $mark['assing_subject']['subject']['name'] }}</td>
                <td class="text-center">{{ $mark['assing_subject']['full_mark'] }}</td>
                <td class="text-center">{{ $get_mark }}</td>

                @php
                $grade_marks = App\Model\MarkGrade::where([['start_marks','<=',(int)$get_mark],['end_marks','>=',(int)$get_mark]])->first();
                $grade_name  = $grade_marks->grade_name;
                $grade_point = number_format((float)$grade_marks->grade_point,2);
                $total_point = (float)$total_point+(float)$grade_point;
                @endphp

                <td class="text-center">{{ $grade_name }}</td>
                <td class="text-center">{{ $grade_point }}</td>

               </tr>

              @endforeach
               
               <tr>
                <td colspan="3">
                 <strong style="padding-left:30px;"> Total Marks</strong>
                </td>
                <td colspan="3" style="padding-left:37px;">
                 <strong>
                  {{ $total_marks }}
                 </strong>
                 
                </td>
               </tr>

             </tbody>
            </table>
           </div>
          </div> <br>


          <div class="row">
           <div class="col-md-12">
            <table border="1" width="100%" cellpadding="1" cellspacing="1" class="text-center">
              @php 
               $total_grade = 0;
               $point_for_letter_grade = (float)$total_point/(float)$total_subject;
               $total_grade = App\Model\MarkGrade::where('start_point','<=',$point_for_letter_grade)->where('end_point','>=',$point_for_letter_grade)->first();
               $grade_point_age = (float)$total_point/(float)$total_subject;
              @endphp
              <tr>
               <td width="50%"><strong>Grade Point Avetage</strong></td>
               <td width="50%">
                @if($count_fail > 0)
                0.00
                @else
                {{ number_format((float)$grade_point_age,2) }}
                @endif
               </td>
              </tr>
              <tr>
               <td width="50%"><strong>Latter Grade</strong></td>
               <td width="50%">
                @if($count_fail > 0)
                F
                @else
                {{ $total_grade->grade_name }}
                @endif
               </td>
              </tr>

              <tr>
               <td width="50%"><strong>Total Marks With Fraction</strong></td>
               <td width="50%">
                {{ $total_marks }}
               </td>
              </tr>

            </table>
           </div>
          </div>

          <div class="row">
           <div class="col-md-12">
            <table border="1" width="100%" cellpadding="1" cellspacing="1" class="text-center">
             <tbody>
              <tr>
               <td style="text-aling:left">Remarks :
               @if($count_fail > 0 )
               Fail
               @else
               {{ $total_grade->remarks }}
               </td>

              </tr>
              @endif
             </tbody>
            </table>
           </div>
          </div>


          <div class="row" style="margin-top:20px;">
           <div class="col-md-4">
            <hr style="border:solid 1px; width:60%; color:#000; margin-bottom:-3px;">
            <div class="text-center">Tecaher</div>
           </div>
           <div class="col-md-4">
            <hr style="border:solid 1px; width:60%; color:#000; margin-bottom:-3px;">
            <div class="text-center">Parents/Guardian</div>
           </div>
           <div class="col-md-4">
            <hr style="border:solid 1px; width:60%; color:#000; margin-bottom:-3px;">
            <div class="text-center">Principal/Headmaster</div>
           </div>
          </div>










         </div>
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



  


  @endsection
