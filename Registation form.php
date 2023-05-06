<?php
include('connection.php');
extract($_REQUEST);
error_reporting(1);
if(isset($save))
{
  
  $sql= mysqli_query($con,"select * from create_account where email='$email' ");
  if(mysqli_num_rows($sql))
  {
  $msg= "<h1 style='color:red'> account already exists</h1>";    
  }
  else
  {
    // Encrypt the password using password_hash() function
      // $hashed_password = password_hash($Passw, PASSWORD_DEFAULT);

      $sql="insert into create_account(name,email,password,mobile,address,gender,country,pictrure) values('$fname','$email','$Passw','$mobi','$addr','$gend','$countr','$pict')";
   if(mysqli_query($con,$sql))
   {
   $msg= "<h1 style='color:green'>Data Saved Successfully</h1>"; 
   header('location:Login.php'); 
   }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>E & M Hotel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css"rel="stylesheet"/>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
   <style>
  /* CSS code */
  .mySubmitButton {
  
    color: black; /* Set text color to black */
    /* Other styles for the submit button */
  }
</style>
</head>
<body style="margin-top:50px;">
  <?php 
include('Menu Bar.php');
  ?>
<div class="container-fluid"style="background-color:"> <!-- Primary Id-->
  <div class="container">
    <div class="row">
      
      <center><h1 style="background-color:; border-radius:50px;display:inline-block;"><b><font color="#080808">Create New Account</font></b></h1></center>
       <center><?php echo @$msg;?></center><br>
      <div class="col-sm-2"></div>
      <div class="col-sm-6 ">
        <form class="form-horizontal " method="post">
          <div class="form-group">

            <div class="control-label col-sm-5"><h4>Name :</h4></div>
          <div class="col-sm-7">
              <input type="text" name="fname" class="form-control"placeholder="Enter Your Name"required>
          </div>
        </div>

        <div class="form-group">
            <div class="control-label col-sm-5"><h4>Email-Id:</h4></div>
          <div class="col-sm-7">
              <input type="text" name="email" class="form-control"placeholder="Enter Your Email-id" autocomplete="off"required>
          </div>
        </div>

        <div class="form-group">
            <div class="control-label col-sm-5"><h4>Password :</h4></div>
          <div class="col-sm-7">
          <input type="password" name="Passw" class="form-control" placeholder="Enter Your Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain at least 1 number, 1 uppercase letter, 1 lowercase letter, and be at least 8 characters long" required>
          </div>
        </div>

        <div class="form-group">
            <div class="control-label col-sm-5"><h4>Mobile No:</h4></div>
          <div class="col-sm-7">
              <input type="text" name="mobi" class="form-control" pattern="0[0-9]{9}" title="Please enter a 10-digit mobile number starting with 0" required>
          </div>
        </div>

        <div class="form-group">
            <div class="control-label col-sm-5"><h4>Address :</h4></div>
          <div class="col-sm-7">
              <textarea  name="addr" class="form-control"required></textarea>
          </div>
        </div>

        <div class="form-group">
            <div class="control-label col-sm-5"><h4 id="top">Gender :</h4></div>
          <div class="col-sm-7">
              <input type="radio" name="gend"value="male"required><b>Male</b>&emsp;
              <input type="radio" name="gend"value="female"required><b>Female</b>&emsp;
              <input type="radio" name="gend"value="other"required><b>Other</b>
          </div>
          </div>

          <div class="form-group">
            <div class="control-label col-sm-5"><h4>Country :</h4></div>
          <div class="col-sm-7">
            <select name="countr" class="form-control"required>
              <option>Kenya</option>
              <option>Uganda</option>
              <option>Tanzania</option>
            </select>
        </div>
        </div>

        <div class="form-group">
            <div class="control-label col-sm-5"><h4 id="top">profile pic :</h4></div>
          <div class="col-sm-7">
              <input type="file" name="pict"accept="image/*"required>
          </div>
          <div class="row">
            <div class="col-sm-6"style="text-align:right;"><br>
            <input type="submit" value="Submit" name="save"class="btn btn-primary btn-group btn-group-justified"required style="color:#000;font-family: 'Baloo Bhai', cursive;height:40px;"/>
          </div>
          </div>
          </div>
        </form>
        </div>
      </div>
        <div class="col-sm-4">
        </div>
    </div>
  </div>
</div>

</body>
</html>
