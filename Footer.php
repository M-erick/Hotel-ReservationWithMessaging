<?php 
include('connection.php');
extract($_REQUEST);

if(isset($send)) {
  // Check if the message already exists in the database
  $existing_msg = mysqli_query($con, "SELECT * FROM feedback WHERE name='$n' AND email='$e' AND mobile='$mob' AND message='$msg'");
  if(mysqli_num_rows($existing_msg) > 0) {
    $msg = "<h4 style='color:red;'>This feedback has already been sent.</h4>";
  } else {
    mysqli_query($con, "INSERT INTO feedback (name, email, mobile, message, response, date_time, response_time) 
    VALUES ('$n', '$e', '$mob', '$msg', '', NOW(), '')");
    $msg = "<h4 style='color:green;'>Feedback sent successfully</h4>";
  }
}

?>

<!-- Footer1 Start Here-->

<footer style="background-color: #393939;">
    <div class="container-fluid">
	<div class="col-sm-4 hov">
		<img src="logo/logo12.png"width="220px"height="70px"/><br><br>
    <p class="text-justify">A hotel is an establishment that provides paid lodging on a short-term basis. Facilities provided may range from a modest-quality mattress in a small room to large suites with bigger, higher-quality beds, a dresser, a refrigerator and other kitchen facilities, upholstered chairs, a flat screen television, and en-suite bathrooms. Small, lower-priced hotels may offer only the most basic guest services and facilities. Larger, higher-priced hotels may provide additional guest facilities such as a swimming pool, business center</p><br>
      <center><a href="about.php" class="btn btn-info"><b>Read More..</b></a></center><br><br><br>
 
	</div>&nbsp;&nbsp;
	<div class="col-sm-4 text-justify">
	       <h3 style="color:#cdd51f;">Contact Us</h3>
      <p style="color:white;"><strong>Address:&nbsp;</strong>RNG PALAZA,CBD,NAIROBI</p>
      <p style="color:white;"><strong>Email-Id:&nbsp;</strong>E&M@gmail.com</p>
      <p style="color:white;"><strong>Contact Us:&nbsp;</strong>(+254)713131313</p><br><br><br>

     <!-- <center><img src="image/devlop/img2.png"class="img-responsive"style="width:200px;height:150px;border-radius:100%;"></center> -->
	</div>&nbsp;

  <!--Feedback Start Here-->
	<div class="col-sm-4 text-center">
      <div class="panel panel-primary">
        <div class="panel-heading">Feedback</div>
          <div class="panel-body">
            <?php echo @$msg; ?>
      <div class="feedback">
      <form method="post"><br>
        <div class="form-group">
          <input type="text" name="n" class="form-control" id="#"placeholder="Enter Your Name"required>
        </div>
        <div class="form-group">
          <input type="Email" name="e" value="<?php echo $eid; ?>" readonly class="form-control" id="#"placeholder="Email"required>
        </div>
        <div class="form-group">
          <input type="tel" name="mob" class="form-control" id="#" placeholder="phone number" pattern="0[0-9]{9}"  title="Please enter a 10-digit mobile number starting with 0" required>
        </div>
        <div class="form-group">
          <textarea type="Text" name="msg" class="form-control" id="#"placeholder="Type comment here"required></textarea>
        </div>
          <input type="submit" value="send" name="send" class="btn btn-primary btn-group-justified"required>
      </form>     
        </div>
       </div>
      </div>
    </div>

    <!--Feedback Panel Close here-->

  </div>
</footer>
<!--Footer1 Close Here-->

<!--Footer2 start Here-->

<footer class="container-fluid text-center"style="background-color:#000408;height:40px;padding-top:10px;color:#f0f0f0;">
  <p>E & M HOTEL All Rights Reserved 2022-2023</p>
</footer>

<!--Footer2 start Here-->