<html lang="en">
  
  <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Monthly Salary</title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
   <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.css">
  </head>

  <body>
   
   <div class="container">
    <div class="row">

      @php
      $date = date('Y-m',strtotime($totalattendgroupbyid['0']->date));
      if($date !=''){
        $where[] = ['date','like',$date.'%'];
      }


      $tatalattend = App\Model\EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$totalattendgroupbyid['0']->employee_id)->get();
      $singleSalary = (float)$totalattendgroupbyid['0']['user']['salary'];
      $salaryparday = (float)$singleSalary/30;
      $adsentcount = count($tatalattend->where('attend_status','Absent'));
      $totalsalaryminus =(float)$adsentcount * (float)$salaryparday;
      $totalsalary = (float)$singleSalary-(float)$totalsalaryminus;
   
      @endphp



     
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
          <img src="{{ (!empty($totalattendgroupbyid['0']['user']['image']))?url('upload/employee_image/'.$totalattendgroupbyid['0']['user']['image']):url('upload/No-image.jpg')}}" style="height:80px; width:80px;">
         </td>
        </tr>
       </tbody>
      </table>
     </div>

     <div class="col-12" align="center">
       <h4>Employee Monthly Satary</h4>
     </div>

     <div class="col-12">

      <table data-toggle="table" align="center" width="80%">
       <tbody>

        <tr>
         <td>
          <span>Employee name</span>
         </td>
         <td>
          <span>{{ $totalattendgroupbyid['0']['user']['name'] }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Basic Salary</span>
         </td>
         <td>
          <span>{{ $totalattendgroupbyid['0']['user']['salary'] }}</span>
         </td>
        </tr>
  
        <tr>
         <td>
          <span>Total Absent for this month </span>
         </td>
         <td>
          <span>{{ $adsentcount }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Month</span>
         </td>
         <td>
          <span>{{ date('M-Y',strtotime($totalattendgroupbyid['0']->date)) }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Salary For This month</span>
         </td>
         <td>
          <span>{{ $totalsalary }}</span>
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