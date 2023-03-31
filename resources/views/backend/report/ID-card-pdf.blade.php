<html lang="en">
  
  <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Student ID Card </title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
   <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.css">
  </head>

  <body>
   
    <div class="container" style="padding-top:30px;">
     @foreach($alldata as $data)

     <div class="row justify-content-center" style="margin-bottom:20px;">
       <div class="col-md-6" style="border: 1px solid #000; margin:0px 110px 0px 110px">
        <table border="0"  width="100%">
         <tbody>
          <tr >
           <td width="30%" align="center">
            <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" style="height:80px; width:80px;">
           </td>
           <td width="40%" align="center">
            <h2 style="font-size:20px;">ABC SCHOOL</h2>
            <h3 style="font-size:17px;">Student ID Card</h3>
           </td>
           <td width="30%" align="center">
            <img src="{{ (!empty($data['student']['image']))?url('upload/student_images/'.$data['student']['image']):url('upload/No-image.jpg')}}" style="height:80px; width:80px; padding-top:10px;">
           </td>
          </tr>

          <tr>
           <td width="45%" style="padding:10px 3px 10px 5px"><p style="font-size:16px;"><strong>Name:</strong>{{ $data['student']['name'] }}</p></td>
           <td width="10%" style="padding:10px 3px 10px 5px"></td>
           <td width="45%" style="padding:10px 3px 10px 5px"><p style="font-size:16px;"><strong>Id No:</strong>{{ $data['student']['in_no'] }}</p></td>
          </tr>

          <tr>
           <td width="45%" style="padding:10px 3px 10px 5px"><p style="font-size:16px;"><strong>Session:</strong>{{ $data['year']['name'] }}</p></td>
           <td width="10%" style="padding:10px 3px 10px 5px"><p style="font-size:16px;"><strong>class:</strong>{{ $data['student_class']['name'] }}</p></td>
           <td width="45%" style="padding:10px 3px 10px 5px"><p style="font-size:16px;"><strong>Roll:</strong>{{ $data->roll }}</p></td>
          </tr>


          <tr>
           <td width="33%" style="padding:15px 3px 3px 3px"></td>
           <td width="33%" style="padding:15px 3px 3px 3px"></td>
           <td width="33%" style="padding:15px 3px 3px 3px"></td>
          </tr>


          <tr>
           <td width="45%" style="padding:10px 3px 10px 5px"><p style="font-size:16px;"><strong>Molile NO:</strong>{{ $data['student']['mobile'] }}</p></td>
           <td></td>
           <td></td>
          </tr>


          <tr>
           <td></td>
           <td></td>
           <td class="text-center">
            <hr style="border:solid 1px; color:#000; margin-bottom:0px;">
            <p style="">Principal/Headmaster</p>
           </td>
          </tr>

         </tbody>
        </table>
       </div>
     </div>

     @endforeach
    </div>


    

    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.js"></script>
  </body>
</html>