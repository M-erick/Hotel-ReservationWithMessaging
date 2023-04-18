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
  <style>
    .my_card {
    border-radius: 10px; /* Adjust the value to control the amount of rounding */
    border: 1px solid #ccc; /* Add border with 1px width and black color */
    padding: 10px; /* Add some padding to create space between content and border */
    /* Other styles for the div */
    /* margin: 0 auto; */
    margin-top: 2rem; /* Add margin to the top of the card */
    margin-bottom: 2rem;
    
    
  }
  .my_cards {
  width: 100%; /* Set the width of the card to 100% */
  height: 0; /* Set the height of the card to 0 to maintain aspect ratio */
  padding-bottom: 75%; /* Set the padding bottom to 75% to create a responsive aspect ratio */
  position: relative; /* Set the position property to relative for absolute positioning of the image */
  overflow: hidden; /* Hide any overflowing content within the card */
  border-radius: 10px; /* Set the border radius to create rounded corners */
}
.card_image {
  width: 100%; /* Make the image fill the width of the card */
  height: 100%; /* Make the image fill the height of the card */
  object-fit: cover; /* Scale the image to cover the entire container */
  position: absolute; /* Set the position property to absolute for positioning relative to the card */
  top: 0; /* Set the top property to 0 for positioning at the top of the card */
  left: 0; /* Set the left property to 0 for positioning at the left of the card */
}
.card_text_overlay {
  position: absolute; /* Set the position property to absolute for positioning relative to the card */
  top: 0; /* Set the top property to 0 for positioning at the top of the card */
  left: 0; /* Set the left property to 0 for positioning at the left of the card */
  width: 100%; /* Make the text overlay span the entire width of the card */
  height: 100%; /* Make the text overlay span the entire height of the card */
  display: flex; /* Use flexbox to center the text vertically and horizontally */
  justify-content: center; /* Center the text horizontally */
  align-items: center; /* Center the text vertically */
  text-align: center; /* Center the text within the overlay */
}

.card_title {
  /* Styles for the text overlay */
  color: #fff; /* Set the color of the text */
  font-size: 24px; /* Set the font size of the text */
  /* Add additional styles as needed for your design */
}
  </style>
</head> <!--Head Open  Here-->
<body style="margin-top:50px;" style="margin-top:50px;">
  <?php
      include('Menu Bar.php')
  ?>
  <div class="container" style="margin-top:80px;">
  <div style="position: relative;">
    <img src="image/country/serengeti.jpg" alt="Serengeti" style="width: 100%; max-height: 300px; object-fit: cover;">
    <div style="position: absolute; bottom: 0; left: 0; padding: 20px;  color: white;">
      <h2>Vacation to Serengeti National Park</h2>
      <h4>Book a Hotel + Tour package</h4>
    </div>
  </div>
</div>


 <div class="container-fluid"><!--Id Is Red--> 
<div class="container text-center">   

  
 	<?php 
	$sql=mysqli_query($con,"select * from rooms");
?><h1 style="text-align:left"> <font color="#000000;"><b>Serengeti</b></font></h1><br> 
<div class="row">
  <div class="col-sm-12">
    <div class="my_card p-3 mb-3 border bg-secondary">
      
        <h4 class="text-left"><b><font color="#000000;">Top Serengeti Tour Package</b></h4></font>
        
      
      <p class="text-justify"><font color="#000000;">The Serengeti is home to a diverse range of wildlife, including the Big Five (elephant, lion, leopard, buffalo, and rhino), as well as cheetahs, zebras, giraffes, wildebeest, gazelles, hyenas, and more. It's known for its excellent opportunities for wildlife viewing and photography.</font></p>
      <p class="text-left"><b><font color="#000000;"></b></p></font>
    </div>
  </div>
</div>

<h4 class="text-left"><b><font color="#000000;">Serengeti Hotel Deals</b></h4></font>

<?php
	while($r_res=mysqli_fetch_assoc($sql))
	{
	?>
  <div class="row">
  <div class="col-sm-12">
    <div class="my_card p-3 mb-3 border">
      <div class="row">
        <div class="col-sm-6">
          <img src="image/rooms/<?php echo $r_res['image']; ?>" alt="Image" id="img1" style="max-width: 100%; height: auto;">
        </div>
        <div class="col-sm-6">
          <a style="text-decoration: none" href="room_details.php?room_id=<?php echo $r_res['room_id']; ?>">
            <h4 class="text-left"><b><font color="#000000;"><?php echo $r_res['type']; ?></b></h4></font>
          </a>
          <p class="text-justify"><font color="#000000;"><?php echo substr($r_res['details'], 0, 500); ?></font></p>
          <p class="text-left"><b><font color="#000000;">Ksh<?php echo $r_res['price']; ?> night</b></p></font>
        </div>
      </div>
    </div>
  </div>
</div>

	<?php } ?>
</div>
 </div>


</div>

<?php
  include('Footer.php')
?>
</body>
</html>