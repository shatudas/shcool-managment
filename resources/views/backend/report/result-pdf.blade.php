<html lang="en">
  
  <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Student Result </title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
   <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.css">
  </head>

  <body>
   
   <div class="container">
    <div class="row">
     
     <div class="col-12" align="center">
      <table style="width:80%;">
       <tbody>
        <tr>
         <td width="30%">
          <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" style="height:80px; width:80px;">
         </td>
         <td align="center">
          <h2>ABC SCHOOL</h2>
          <h3>DHAKA,BANGLADESH</h3>
          <h4>www.schoolmanagment.com</h4>
         </td>
         <td width="30%">
         </td>
        </tr>
       </tbody>
      </table>
     </div>

     <div class="col-12" align="center">
      <h4>  Result of {{@$alldata['0']['exam_type']['name']}} </h4>
     </div>

     <div class="col-12">
     <hr style="border:1px solid #DDD; width:100%; color:#DDD; margin-top:0px; ">
      <table border="0" width="100%" cellspacing="1" cellpadding="2" class="text-center">
       <tbody>
        <tr>
         <td><strong>Year/Session : </strong>{{ @$alldata['0']['year']['name'] }}</td>
         <td></td>
         <td></td>
         <td> <strong> Class: </strong><strong>Session : </strong>{{ @$alldata['0']['student_class']['name'] }}</td>
        </tr>
       </tbody>
      </table><br>
     </div>


     <div class="col-md-12">
      <table border="1" width="100%">
       <thead>
        <tr>
         <th>  SL </th>
         <th> Student Name </th>
         <th> ID No </th>
         <th width="10% "> Letter Grade </th>
         <th  width="10%"> Grade Point </th>
         <th width="10%"> Remarks </th>
        </tr>
       </thead>
       <tbody>
       @foreach($alldata as $key=> $data)
        @php

        $AllMarks = App\Model\StudentMarks::where('year_id',$data->year_id)->where('class_id',$data->class_id)->where('exam_type_id',$data->exam_type_id)->where('student_id',$data->student_id)->get();
        $total_marks = 0;
        $total_point = 0;

        foreach($AllMarks as $value){
         $count_fail=App\Model\StudentMarks::where('year_id',$value->year_id)->where('class_id',$value->class_id)->where('exam_type_id',$value->exam_type_id)->where('student_id',$value->student_id)->where('marks','<','33')->get()->Count();
         $get_mark = $value->marks;

         $grade_marks = App\Model\MarkGrade::where('start_marks','<=',(int)$get_mark)->where('end_marks','>=',(int)$get_mark)->first();
  ;
         $grade_name = $grade_marks->grade_name;
         $grade_point = number_format((float)$grade_marks->grade_point,2);
         $total_point = (float)$total_point + (float)$grade_point;
        }

        @endphp
        <tr>
         <td>{{ $key+1 }}</td>
         <td>{{ $data['student']['name'] }}</td>
         <td>{{ $data['student']['id_no'] }}</td>

         @php
          $total_subject=App\Model\StudentMarks::where('year_id',$data->year_id)->where('class_id',$data->class_id)->where('exam_type_id',$data->exam_type_id)->where('student_id',$data->student_id)->get()->Count();

          $total_grade = 0;

          $point_for_letter_grade = (float)$total_point/(float)$total_subject;

          $total_grade = App\Model\MarkGrade::where('start_point','<=',$point_for_letter_grade)->where('end_point','>=',$point_for_letter_grade)->first();
          $grade_point_age = (float)$total_point/(float)$total_subject;
         @endphp


         <td>
          @if($count_fail > 0)
           F
           @else
           {{ $total_grade->grade_name }}
          @endif
         </td>
         </td>
         <td>
          @if($count_fail > 0)
           0.00
           @else
           {{ number_format((float)$grade_point_age,2) }}
          @endif
         </td>
         <td>
          @if($count_fail > 0)
            Fail
           @else
           {{ $total_grade->remarks }}
           @endif
         </td>
        </tr>

        @endforeach

       </tbody>
      </table><br>
       <i>Print Date: {{ date('D M Y') }}</i>
     </div>


     <div class="col-12">
      <table>
       <tr>
        <td></td>
        <td></td>
        <td>
         <hr style="border:solid 1px; width:60%; color:#000; margin-bottom:0px;">
          <p style="">Principal/Headmaster</p>
        </td>
       </tr>
      </table>
     </div>

    </div>


   </div>



    

    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.js"></script>
  </body>
</html>