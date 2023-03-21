<html lang="en">
  
  <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Employee Monthly or Yearly Profit</title>

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
      <h4>Monthly or Yearly Profit</h4>
     </div>

     <div class="col-12">

      @php

       $student_fee = App\Model\AccountStudentFee::whereBetween('date',[$start_date, $start_date])->sum('amount');
       $other_cost = App\Model\AccountOtherCost::whereBetween('date',[$sdate, $sdate])->sum('amount');
       $emp_salary = App\Model\AccountEmployeeSalary::whereBetween('date',[$start_date, $start_date])->sum('amount');
       $tatal_cost = $other_cost + $emp_salary;
       $profit = $student_fee - $tatal_cost;

      @endphp




      <table data-toggle="table" align="center" width="100%">
       <tbody>

        <tr>
         <td colspan="2" style="text-align:center;">
          <h4>Reporting:{{date('d-M-Y',strtotime($sdate))}} - {{date('d-M-Y',strtotime($sdate))}}</h4>
         </td>
        </tr>

        <tr>
         <td>
          <span>Purpose</span>
         </td>
         <td>
          <span>Amount</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Student Fee</span>
         </td>
         <td>
          <span>{{ $student_fee }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Employer Salaty</span>
         </td>
         <td>
          <span>{{ $emp_salary }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Other Cost</span>
         </td>
         <td>
          <span>{{ $other_cost }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Total Cost</span>
         </td>
         <td>
          <span>{{ $tatal_cost }}</span>
         </td>
        </tr>

         <tr>
         <td>
          <span>Profit</span>
         </td>
         <td>
          <span>{{ $profit }}</span>
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


     <div class="col-12">
      <table>
       <tr>
        <td colspan="3" style="float:right;">
         Head master
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