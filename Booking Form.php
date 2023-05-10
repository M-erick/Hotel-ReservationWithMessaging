<?php 
include('Menu Bar.php');
include('connection.php');



$sql= mysqli_query($con,"SELECT * FROM room_booking_details WHERE email='$eid' AND booking_time >= DATE_SUB(NOW(), INTERVAL 24 HOUR)"); 
$result=mysqli_fetch_assoc($sql);
//print_r($result);
extract($_REQUEST);
error_reporting(1);
if(isset($savedata))
{

  $sql= mysqli_query($con,"select * from room_booking_details where email='$email' and room_type='$room_type' ");
  if(mysqli_num_rows($sql)) 
  {
  $msg= "<h1 style='color:red'>You have already booked this room</h1>";    
  }


  // create another if else statement
  else
  {

    $pending =  'pending';
    $img = $_FILES['img']['name'];

   $sql="insert into room_booking_details(name,email,phone,address,city,state,zip,contry,room_type,Occupancy,check_in_date,check_in_time,check_out_date,payment_image,status) 
  values('$name','$email','$phone','$address','$city','$state','$zip','$country',
  '$room_type','$Occupancy','$cdate','$ctime','$codate','$img',' $pending')";
   if(mysqli_query($con,$sql))
   {
    move_uploaded_file($_FILES['img']['tmp_name'], "image/payments/" .$_FILES['img']['name']);
   $msg= "<h1 style='color:blue'>You have Successfully booked this room</h1><h2><a href='order.php'>View </a></h2>"; 
   } else {
    $msg = "<h1 style='color:red'>Error inserting into database. Please try again.</h1>";

   }
   
  }
}





?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Hotel.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css"rel="stylesheet"/>
 <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript">
		function updatePrice() {
  var roomType = document.getElementById("room-type").value;
  var priceElement = document.getElementById("price");

  switch (roomType) {
    case "deluxe":
      priceElement.value = "15000";
      break;
    case "luxurious":
      priceElement.value = "16000";
      break;
    case "standard":
      priceElement.value = "14000";
      break;
    case "suite":
      priceElement.value = "13000";
      break;
    case "twin":
      priceElement.value = "120000";
      break;
    default:
      priceElement.value = "0";
  }
}

	</script>
</head>
<body style="margin-top:50px;">
  <?php
  include('Menu Bar.php');
  ?>
<div class="container-fluid text-center"id="" style="background-color: #ADD8E6;"><!--Primary Id-->
  <h1>BOOKING Form </h1><br>
  <div class="container">
    <div class="row">
      <?php echo @$msg; ?>
      <!--Form Containe Start Here-->
     <form class="form-horizontal" method="post" enctype="multipart/form-data">
       <div class="col-sm-6">
         <div class="form-group">
           <div class="row">
              <div class="control-label col-sm-4"><h4> Name :</h4></div>
                <div class="col-sm-8">
                 <input type="text" value=""  class="form-control" name="name" placeholder="Enter Your First Name" required>
          </div>
        </div>
      </div>

        <div class="form-group">
          <div class="row">
           <div class="control-label col-sm-4"><h4>Email :</h4></div>
          <div class="col-sm-8">
              <input type="email" value="<?php echo $eid; ?>"  class="form-control" name="email"  placeholder="Enter Your Email-Id" readonly/>
          </div>
        </div>
        </div>

        <div class="form-group">
          <div class="row">
           <div class="control-label col-sm-4"><h4>Mobile :</h4></div>
          <div class="col-sm-8">
              <input type="tel" value=""  class="form-control" name="phone" pattern="0[0-9]{9}"  title="Please enter a 10-digit mobile number starting with 0" required >
          </div>

        </div>
        </div>

       
     
        

        <div class="form-group">
          <div class="row">
           <div class="control-label col-sm-4"><h4>Address :</h4></div>
          <div class="col-sm-8">
              <textarea name="address" class="form-control"    placeholder="Enter Your Address" required></textarea>
          </div>
        </div>
        </div>


        <div class="form-group">
        <div class="row">
            <div class="control-label col-sm-4"><h4>City :</h4></div>
          <div class="col-sm-8">
            <select name="city" class="form-control"required>
              <option>Watamu</option>
              <option>Zanzibar</option>
              <option>Serengeti</option>
              <option>Other</option>

            </select>
        </div>
        </div>
        </div>
        <div class="form-group">
          <div class="row">
           <div class="control-label col-sm-4"><h4></h4></div>
          <div class="col-sm-8">
              <input type="hidden" name="state" class="form-control"placeholder="Enter Your State Name"required>
          </div>
        </div>
        </div>

		      <div class="form-group">
            <div class="row">
           <div class="control-label col-sm-4"><h4></h4></div>
          <div class="col-sm-8">
              <input type="hidden" name="zip" class="form-control" placeholder="Enter Your Zip Code"required>
          </div>
        </div>
        </div>
        </div>

           <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-5"><h4>Room Type:</h4></div>
                  <div class="col-sm-7">
                  <select class="form-control" name="room_type" id="room-type" onchange="updatePrice()" required>
                  <option value="deluxe">Deluxe Room</option>
                  <option value="luxurious">Luxurious Suite</option>
                  <option value="standard">Standard Room</option>
                  <option value="suite">Suite Room</option>
                  <option value="twin">Twin Deluxe Room</option>
               </select>
              </div>
              </div>
            </div>
          </div>

         

          <div class="col-sm-6">
          <div class="form-group">
            <div class="row">
           <div class="control-label col-sm-5"><h4>Payment image:</h4></div>
          <div class="col-sm-7">
              <input type="file" name="img" class="form-control" placeholder="upload payment slip"required>

          </div>
        </div>
        </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-5"><h4>check In Date :</h4></div>
                  <div class="col-sm-7">
                  <input type="date" name="cdate" class="form-control"required>
                  </div>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                 <div class="control-label col-sm-5"><h4>Check In Time:</h4></div>
                   <div class="col-sm-7">
                    <input type="time" name="ctime" class="form-control"required>
                  </div>
              </div>
            </div>
          </div>
           <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-5"><h4>Check Out Date :</h4></div>
                <div class="col-sm-7">
                  <input type="date" name="codate" class="form-control"required>
                </div> 
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <label class="control-label col-sm-5"><h4 id="top">Occupancy :</h4></label>
                <div class="col-sm-7">
                  <div class="radio-inline"><input type="radio" value="single" name="Occupancy"required >Single</div>
                  <div class="radio-inline"><input type="radio" value="twin" name="Occupancy" required>Twin</div>
                  <div class="radio-inline"><input type="radio" value="double" name="Occupancy" required>Double</div>
                </div> 
              </div>
            </div>
            <input type="submit"value="submit" name="savedata" class="btn btn-info"required/>
          </div>
          </form><br>
        </div>
      </div>
    </div>
  </div>
<?php
include('Footer.php')
?>
</body>
</html>
