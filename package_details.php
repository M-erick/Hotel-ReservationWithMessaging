<!DOCTYPE html>
<html>
<head>
<title>E & M Hotel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css"rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
</head>
<body style="margin-top:50px;">
	<?php
      include('Menu Bar.php')
  ?><br><br><br>
	<div class="container-fluid"style="margin-top:2%;">
		<div class="container">
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-7">
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
    <li data-target="#myCarousel" data-slide-to="5"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="image/tours/balloon.jpg"class="img-responsive rounded mx-auto d-block" alt="img1">
    </div>

    <div class="item">
      <img src="image/tours/cruise.jpg"class="" alt="im2">
    </div>

    <div class="item">
       <img src="image/tours/dolphin.jpg"class="" alt="im3">
    </div>

    <div class="item">
       <img src="image/tours/forest.jpg"class="" alt="img4">
    </div>
    <div class="item">
       <img src="image/tours/iamge03.jpg"class="" alt="img5">
    </div>

    <div class="item">
       <img src="image/tours/image01.jpg"class="" alt="img5">
    </div>

    <div class="item">
       <img src="image/tours/image02.jpg"class="" alt="img7">
    </div>
    <div class="item">
       <img src="image/tours/image04jpg"class="" alt="img7">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php 
include('connection.php');
$package_id=$_GET['package_id'];
$sql=mysqli_query($con,"select * from tour_packages where package_id='$package_id' ");
$res=mysqli_fetch_assoc($sql);
?>

<br>
		<h2 class=""><font color="#000000;" ><?php echo $res['name']; ?></font></h2>
    <p class=""><b><font color="#000000;" >KSH <?php echo $res['price']; ?> per person</font></b></p>
		<p class="text-justify">
      <?php echo $res['details']; ?>
</p>
<div class="row">
  <div class="col-sm-12">
    <div class="my_card p-3 mb-3 border">
      <div class="row">
        
        <div class="col-sm-6">
          
          <?php
          // Split the text into an array of bullet points
          $bulletPoints = explode("\n", $res['description']);

           // Display the bullet points as an unordered list
           echo "<ul>";
             foreach ($bulletPoints as $bulletPoint) {
             echo "<li>" . $bulletPoint . "</li>";
              }
            echo "</ul>";
             ?>
        </div>
      </div>
    </div>

    <div class="row">
      <h2>Payments Methods</h2>
      <img src="image/icon/payment.png"class="img-responsive">
      <h2>Available option</h2>
      <h4><b>Mpesa Pay Bill</b></h4>
      <p>Business Number:<b>247247</b></p>
      <p>Account Number:<b>0713649428</b></p>
      <a href="hotelBooking.php" class="btn btn-info">Book Now</a><br><br>
      </div>
  </div>
</div>
	</div>
				<div class="col-sm-3">
					<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 align="center">Tour Package</h4>
					</div><br>
					<div class="panel-body-right text-center">
    <!--Fatch Mysql Database Select Query Room Details -->
						<?php
            include('connection.php');
            $sql1=mysqli_query($con,"select * from tour_packages");
           while($result1= mysqli_fetch_assoc($sql1))
           {

            ?>
            <a href="package_details.php?packagetoursage_id']; ?>"><?php echo $result1['name']; ?></a><hr>
            
            <?php } ?>

    <!--Fatch Mysql Database Select Query Room Details -->
    					
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
  <?php
      include('footer.php')
  ?>
</body>
</html>
