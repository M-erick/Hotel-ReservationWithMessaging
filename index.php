<?php 
session_start();
error_reporting(1);
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head><!--Head Open  Here-->
  <title>E & M Hotel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
  <link href="css/style.css"rel="stylesheet"/>
</head> <!--Head Open  Here-->
<body style="margin-top:50px;">
  <?php
      include('Menu Bar.php')
  ?>
<div id="myCarousel" class="carousel slide" data-ride="carousel"> <!--Slider Image Start Here--> 
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
	   <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!--Indicators Close Here-->

    <!-- Wrapper for slides -->

    <div class="carousel-inner" role="listbox">
      <?php
		$i=1;
	  $sql=mysqli_query($con,"select * from slider");
		while($slider=mysqli_fetch_assoc($sql))
		{
		$slider_img=$slider['image'];
		$slider_cap=$slider['caption'];
		$path="image/Slider/$slider_img";	
			if($i==1)
			{	
		?>
	  <div class="item active">
        <img src="<?php echo $path; ?>"  style="object-fit: cover; width: 100%; height:20%;"alt="Image">
        <div class="carousel-caption">
			<h2><?php echo $slider_cap; ?></h2>
		</div>      
      </div>
		<?php 
		} 
		else 
			{
			?>	
		<div class="item">
        <img src="<?php echo $path; ?>" alt="Image">
        <div class="carousel-caption">
        <h2><?php echo $slider_cap; ?></h2>
		</div>      
      </div>	
				
		<?php	} ?>
	  
	  
		<?php $i++; } ?>
      
	  
    </div>

    
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a> 
    <!-- Left and right controls Close Here -->
    
</div> <!--Room Info Start Here-->

 <div class="container-fluid"><!--Id Is Red--> 
<div class="container text-center">    
  <h1> <font color="#000000;"><b> Welcome To E &M</b></font></h1><br>
  <div class="row">
    <div class="hov"><!--Hov is Class-->
    
	
	<?php 
	$sql=mysqli_query($con,"select * from rooms");
	while($r_res=mysqli_fetch_assoc($sql))
	{
	?>
	<div class="col-sm-4">
 
  
      <img src="image/rooms/<?php echo $r_res['image']; ?>"class=" "alt="Image"id="img1"> <!--Id Is Img-->
      <a  style="text-decoration : none" href="room_details.php?room_id=<?php echo $r_res['room_id']; ?>">
      <h4 class="text-left"><b><font color="#000000;" ><?php echo $r_res['type']; ?></b> </h4></font> 
    </a>
      <p class="text-justify"><font color="#868686;" ><?php echo substr($r_res['details'],0,100); ?></font></p>
      <p class="text-left"><b><font color="#000000;" >Ksh<?php echo $r_res['price']; ?> night</b> </p></font> </a>

	    
    </div>
	<?php } ?>
  </div>
  </div>
</div>
</div>

<?php
  include('Footer.php')
?>
</body>
</html>