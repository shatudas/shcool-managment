<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Detalis  Info</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.css">
  </head>
  <body>
   

   <div class="container">
    <div class="row">
     <div class="col-12">


      <table data-toggle="table" align="center" width="80%">
      <tbody>
        <tr>
          <td width="30%">
           <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" style="height:100px; width:100px;">
          </td>
          <td align="center">
           <h2>ABC SCHOOL</h2>
           <h3>DHAKA,BANGLADESH</h3>
           <h4>www.schoolmanagment.com</h4>
          </td>
          <td width="30%">
           <img src="{{ asset('upload/student_images/'.$detalis['student']['image']) }}" style="height:100px; width:100px;">
          </td>
        </tr>


        <tr>
          <td colspan="3">Student Registation Card</td>
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
          <span>Year</span>
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
          <span>Roll</span>
         </td>
         <td>
          <span>{{ $detalis->roll }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Moble</span>
         </td>
         <td>
          <span>{{ $detalis['student']['mobile'] }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Address</span>
         </td>
         <td>
          <span>{{ $detalis['student']['address'] }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Gender</span>
         </td>
         <td>
          <span>{{ $detalis['student']['gender'] }}</span>
         </td>
        </tr>

        <tr>
         <td>
          <span>Religion</span>
         </td>
         <td>
          <span>{{ $detalis['student']['religion'] }}</span>
         </td>
        </tr>


        <tr>
         <td>
          <span>Date OF Birth</span>
         </td>
         <td>
          <span>{{ $detalis['student']['dob'] }}</span>
         </td>
        </tr>


      </tbody>


      <tfoot>
       <tr>
        <td colspan="3" style="float:right;">
         Head master
        </td>
       </tr>
      </tfoot>
    </table>

    <i>Print Date: {{ date('D M Y') }}</i>

     </div>
    </div>
   </div>

    

    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.js"></script>
  </body>
</html>