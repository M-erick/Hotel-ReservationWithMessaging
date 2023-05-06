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
      <img src="image/Delux-Room-Single-Bed-Ac-Room/delux_img1.jpg"class="img-responsive rounded mx-auto d-block" alt="img1">
    </div>

    <div class="item">
      <img src="image/Delux-Room-Single-Bed-Ac-Room/delux_img2.jpg"class="" alt="im2">
    </div>

    <div class="item">
       <img src="image/Delux-Room-Single-Bed-Ac-Room/delux_img3.jpg"class="" alt="im3">
    </div>

    <div class="item">
       <img src="image/Delux-Room-Single-Bed-Ac-Room/delux_img4.jpg"class="" alt="img4">
    </div>
    <div class="item">
       <img src="image/Delux-Room-Single-Bed-Ac-Room/delux_img5.jpg"class="" alt="img5">
    </div>

    <div class="item">
       <img src="image/Delux-Room-Single-Bed-Ac-Room/delux_img6.jpg"class="" alt="img5">
    </div>

    <div class="item">
       <img src="image/Delux-Room-Single-Bed-Ac-Room/delux_img7.jpg"class="" alt="img7">
    </div>
    <div class="item">
       <img src="image/Delux-Room-Single-Bed-Ac-Room/delux_img8.jpg"class="" alt="img7">
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
    <p class=""><font color="#000000;" >KSH <?php echo $res['price']; ?> per person</font></p>
		<p class="text-justify">
      <?php echo $res['details']; ?>
</p>
    <div class="row">
      <h2>Amenities & Facilities</h2>
      <img src="image/icon/wifi.png"class="img-responsive">
      <a href="Login.php" class="btn btn-info">Book Now</a><br><br>
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
            <a href="room_details.php?room_id=<?php echo $result1['package_id']; ?>"><?php echo $result1['name']; ?></a><hr>
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