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
  border-radius: 10px;
  border: 1px solid #ccc;
  padding: 5px; /* reduce the padding */
  margin-top: 1rem; /* reduce the margin */
  margin-bottom: 1rem;
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
  u  ul {
    list-style-type: disc;
    margin-left: 1em;
    padding-left: 0;
  }
  ul li {
    margin-left: 1em;
    padding-left: 0;
  }
  </style>
</head> <!--Head Open  Here-->
<body style="margin-top:50px;" style="margin-top:50px;">
  <?php
      include('Menu Bar.php')
  ?>
  <div class="container" style="margin-top:80px;">
  <div style="position: relative;">
    <img src="image/country/watamu01.jpg" alt="watamu" style="width: 100%; max-height: 300px; object-fit: cover;">
    <div style="position: absolute; bottom: 0; left: 0; padding: 20px;  color: black;">
      <h2>Vacation to Watamu</h2>
      <h4>Book a Hotel + Tour package</h4>
    </div>
  </div>
</div>


 <div class="container-fluid"><!--Id Is Red--> 
<div class="container text-center">   

  
 	<?php 
	$sql=mysqli_query($con,"select * from tour_packages where location ='Watamu'");
?><h1 style="text-align:left"> <font color="#000000;"><b>Watamu</b></font></h1><br> 
<div class="row">
  <div class="col-sm-12">
    <div class="my_card p-3 mb-3 border bg-secondary">
      
        <h4 class="text-left"><b><font color="#000000;">Top Watamu Tour Package</b></h4></font>
        
      
      <p class="text-justify"><font color="#000000;">Watamu is a small coastal town in Kenya, north of Mombasa. It’s known for Watamu Marine National Park and Reserve, which has 3 bays: Watamu, Blue Lagoon and Turtle. Sandy beaches and coral gardens are the defining features. Seabirds, as well as green and hawksbill turtles, inhabit Mida Creek with its sand flats and mangrove forest.</font></p>
     
      <p class="text-left"><b><font color="#000000;"></b></p></font>
    </div>
  </div>
</div>

<h4 class="text-left"><b><font color="#000000;">Watamu  Deals</b></h4></font>

<?php
	while($r_res=mysqli_fetch_assoc($sql))
	{
	?>
  <div class="row">
  <div class="col-sm-12">
    <div class="my_card p-3 mb-3 border">
      <div class="row">
        <div class="col-sm-6">
          <img src="image/tours/<?php echo $r_res['image']; ?>" alt="Image" id="img1" style="max-width: 100%; max-height: 500px;">
        </div>
        <div class="col-sm-6">
          <a style="text-decoration: none" href="package_details.php?package_id=<?php echo $r_res['package_id']; ?>">
            <h4 class="text-left"><b><font color="#000000;"><?php echo $r_res['name']; ?></b></h4></font>
          </a>
          <p class="text-left"><b><font color="#000000;">Duration :<?php echo $r_res['duration']; ?> </b></p></font>
          <?php
          // Split the text into an array of bullet points
          $bulletPoints = explode("\n", $r_res['description']);

           // Display the bullet points as an unordered list
           echo "<ul>";
             foreach ($bulletPoints as $bulletPoint) {
             echo "<li>" . $bulletPoint . "</li>";
              }
            echo "</ul>";
             ?>
          <p class="text-left"><b><font color="#000000;">Ksh<?php echo $r_res['price']; ?> per person</b></p></font>
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