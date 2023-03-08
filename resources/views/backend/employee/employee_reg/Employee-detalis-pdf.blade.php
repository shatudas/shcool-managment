<html lang="en">
  
  <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Employee Detalis Info</title>

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
          <img src="{{ asset('upload/employee_image/'.$detalis->image) }}" style="height:80px; width:80px;">
         </td>
        </tr>
       </tbody>
      </table>
     </div>

     <div class="col-12" align="center">
       <h4>Employee Detalis Information</h4>
     </div>

     <div class="col-12">

      <table data-toggle="table" align="center" width="80%">
       <tbody>

        <tr>
         <td>
          <span>ID</span>
         </td>
         <td>
          <span>{{ $detalis->id_no }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Empolyee Name</span>
         </td>
         <td>
          <span>{{ $detalis->name }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Father's  Name</span>
         </td>
         <td>
          <span>{{ $detalis->fname }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Mother's Name</span>
         </td>
         <td>
          <span>{{ $detalis->mname }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Mobile</span>
         </td>
         <td>
          <span>{{ $detalis->mobile }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Address</span>
         </td>
         <td>
          <span>{{ $detalis->address }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Gender</span>
         </td>
         <td>
          <span>{{ $detalis->gender }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Religion</span>
         </td>
         <td>
          <span>{{ $detalis->religion }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Date Of Birth</span>
         </td>
         <td>
          <span>{{date('d-m-Y',strtotime($detalis->dob))}}</span>
         </td>
        </tr>

        {{-- <tr>
         <td>
          <span>Designation</span>
         </td>
         <td>
          <span>{{$detalis['designation']['name'] }}</span>
         </td>
        </tr>
 --}}
        <tr>
         <td>
          <span>Join Date</span>
         </td>
         <td>
          <span>{{ date('d-m-Y',strtotime($detalis->join_date))}}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Salary</span>
         </td>
         <td>
          <span>{{ $detalis->salary }}}</span>
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