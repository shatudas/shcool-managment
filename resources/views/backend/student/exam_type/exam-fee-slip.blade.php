<html lang="en">
  
  <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Student Exam Fee</title>

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
          <img src="{{ asset('upload/student_images/'.$detalis['student']['image']) }}" style="height:80px; width:80px;">
         </td>
        </tr>
       </tbody>
      </table>
     </div>

     <div class="col-12" align="center">
       <h4>Student Exam Fee</h4>
     </div>

     <div class="col-12">

      @php
       $registrationfee = 
       App\Model\FeeCategoryAmount::where('fee_category_id','3')->where('class',$detalis->class_id)->first();
       $origianlfee = $registrationfee->amount;
       $discount =$detalis['discount']['discount'];
       $discountablefee = $discount/100*$origianlfee;
       $finalfee = (int)$origianlfee-(int)$discountablefee;
      @endphp

      <table data-toggle="table" align="center" width="80%">
       <tbody>

        <tr>
         <td>
          <span>Student ID</span>
         </td>
         <td>
          <span>{{ $detalis['student']['id_no'] }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Roll No</span>
         </td>
         <td>
          <span>{{ $detalis->roll }}</span>
         </td>
        </tr>
  
        <tr>
         <td>
          <span>Student Name</span>
         </td>
         <td>
          <span>{{ $detalis['student']['name'] }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Father's Name</span>
         </td>
         <td>
          <span>{{ $detalis['student']['fname'] }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Mother's Name</span>
         </td>
         <td>
          <span>{{ $detalis['student']['mname'] }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Session</span>
         </td>
         <td>
          <span>{{ $detalis['year']['name'] }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Class</span>
         </td>
         <td>
          <span>{{ $detalis['student_class']['name'] }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>ID NO</span>
         </td>
         <td>
          <span>{{ $detalis['student']['id_no'] }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Monthly Fee</span>
         </td>
         <td>
          <span>{{ $origianlfee }} TK</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Discount Fee</span>
         </td>
         <td>
          <span>{{ $discount }} % </span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Fee (This Student) Of {{ $exam_name }} </span>
         </td>
         <td>
          <span>{{ $finalfee }} TK </span>
         </td>
        </tr>
       </tbody>
      </table>
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
    <hr style="border: dashed 1px; width:90%; color:#000; margin-bottom:20px;">
    
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
          <img src="{{ asset('upload/student_images/'.$detalis['student']['image']) }}" style="height:80px; width:80px;">
         </td>
        </tr>
       </tbody>
      </table>
     </div>

     <div class="col-12" align="center">
       <h4>Student Eaxm Fee</h4>
     </div>

     <div class="col-12">

      @php
       $registrationfee = 
       App\Model\FeeCategoryAmount::where('fee_category_id','3')->where('class',$detalis->class_id)->first();
       $origianlfee = $registrationfee->amount;
       $discount =$detalis['discount']['discount'];
       $discountablefee = $discount/100*$origianlfee;
       $finalfee = (int)$origianlfee-(int)$discountablefee;
      @endphp

      <table data-toggle="table" align="center" width="80%">
       <tbody>

        <tr>
         <td>
          <span>Student ID</span>
         </td>
         <td>
          <span>{{ $detalis['student']['id_no'] }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Roll No</span>
         </td>
         <td>
          <span>{{ $detalis->roll }}</span>
         </td>
        </tr>
  
        <tr>
         <td>
          <span>Student Name</span>
         </td>
         <td>
          <span>{{ $detalis['student']['name'] }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Father's Name</span>
         </td>
         <td>
          <span>{{ $detalis['student']['fname'] }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Mother's Name</span>
         </td>
         <td>
          <span>{{ $detalis['student']['mname'] }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Session</span>
         </td>
         <td>
          <span>{{ $detalis['year']['name'] }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Class</span>
         </td>
         <td>
          <span>{{ $detalis['student_class']['name'] }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>ID NO</span>
         </td>
         <td>
          <span>{{ $detalis['student']['id_no'] }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Monthly Fee</span>
         </td>
         <td>
          <span>{{ $origianlfee }} TK</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Discount Fee</span>
         </td>
         <td>
          <span>{{ $discount }} % </span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Fee (This Student) Of {{ $exam_name }} </span>
         </td>
         <td>
          <span>{{ $finalfee }} TK </span>
         </td>
        </tr>
       </tbody>
      </table>
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