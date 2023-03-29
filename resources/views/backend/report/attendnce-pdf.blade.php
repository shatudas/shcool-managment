<html lang="en">
  
  <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Employee  Attendnce</title>

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
          <img src="{{ (!empty($allddata['0']['user']['image']))?url('upload/employee_image/'.$allddata['0']['user']['image']):url('upload/No-image.jpg')}}" style="height:80px; width:80px;">
         </td>
        </tr>
       </tbody>
      </table>
     </div>

     <div class="col-12" align="center">
      <h4>Employee  Attendnce</h4>
     </div>

     <div class="col-12">


      <strong>Employee Name:</strong> {{ $alldata['0']['user']['name']}}, <strong>ID No:</strong> {{ $alldata['0']['user']['id_no'] }}, <strong>Month :</strong> {{ $month }}

      <table data-toggle="table" align="center" width="80%">
       <thead>
        <tr>
         <th>Date</th>
         <th>Attend Status</th>
        </tr>
       </thead>
       <tbody>
         @foreach($alldata as $value)
        <tr>
         <td>
          {{date('d-m-y',strtotime($value->date))}}
         </td>
         <td>
          {{$value->attend}}
         </td>
        </tr>
        @endforeach

        <tr>
         <td colspan="2">
          <strong>Total Absent :</strong> {{ $absents }} $, <strong>Total Leave :</strong> {{ $leaves }}
         </td>
        </tr>

        
        
       </tbody>

      </table>

      <br>
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