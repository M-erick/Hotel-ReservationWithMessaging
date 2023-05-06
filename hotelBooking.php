<?php 
include('Menu Bar.php');
include('connection.php');



$sql= mysqli_query($con,"SELECT * FROM package_booking_details WHERE email='$eid' "); 
$result=mysqli_fetch_assoc($sql);
//print_r($result);
// $city = $_POST['city'];
$pending =  'pending';

extract($_REQUEST);
error_reporting(1);
if(isset($savedata))
{

  $sql= mysqli_query($con,"select * from package_booking_details where email='$email' and package='$package' ");
  if(mysqli_num_rows($sql)) 
  {
  $msg= "<h1 style='color:red'>You have already booked this package</h1>";    
  }


  // create another if else statement
  else
  {

   $sql="insert into package_booking_details(name,email,phone,address,city,package,status) 
  values('$name','$email','$phone','$address','$city','$package',' $pending')";
   if(mysqli_query($con,$sql))
   {
   $msg= "<h1 style='color:blue'>You have Successfully booked this package</h1><h2><a href='tour_order.php'>View </a></h2>"; 
   }
   
  }
}





?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>E &M Hotel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css"rel="stylesheet"/>
 <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body style="margin-top:50px;">
  <?php
  include('Menu Bar.php');
  ?>
<div class="container-fluid text-center"id="" style="background-color: #ADD8E6;"><!--Primary Id-->
  <h1> PACKAGE BOOKING Form </h1><br>
  <div class="container">
    <div class="row">
      <?php echo @$msg; ?>
      <!--Form Containe Start Here-->
     <form class="form-horizontal" method="post">
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
              <input type="tel" value=""  class="form-control" name="phone" pattern="0[0-9]{9}" title="Please enter a 10-digit mobile number starting with 0" required >
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
            <div class="control-label col-sm-5"><h4>Package:</h4></div>
            <div class="col-sm-7">
                <select class="form-control" name="package" required>
                    <?php
                    $query = "SELECT * FROM tour_packages ";
                    $result = mysqli_query($con, $query);
             
                    // generate HTML options
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
</div>

         
          
          <div class="col-sm-6">
           
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
