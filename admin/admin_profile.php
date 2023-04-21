<!DOCTYPE html>
<html>
<head>
	<title>E & M Hotel.Com</title>
	<link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
	<style>
		h1 {
			background-color: #ed2553;
			border-radius: 50px;
			text-align: center;
			font-family: 'Baloo Bhai', cursive;
			box-shadow: 5px 5px 9px black;
			text-shadow: 2px 2px #fff;
			margin-top: 20px;
			padding: 20px 0;
		}
		.img-circle {
			width: 180px;
			height: 180px;
			background-color: blue;
			border-radius: 50%;
			display: block;
			margin: 0 auto;
			margin-top: 30px;
		}
		.container {
			width: 100%;
			max-width: 400px;
			margin: 0 auto;
			margin-top: 30px;
			padding: 20px;
			box-shadow: 5px 5px 9px black;
		}
	</style>
</head>
<body>
<?php 
$i=1;
$sql=mysqli_query($con,"select * from admin");
while($res=mysqli_fetch_assoc($sql))
{
?>
	<h1>Admin Profile</h1>
	<img src="admin.jpg" alt="Admin Image" class="img-circle">
	<div class="container">
	  <form action="/action_page.php">
	    <div class="form-group">
	      <label for="email">Name:</label>
	       <input type="text" id="username" value="<?php echo $res['username']; ?>" class="form-control" name="name" readonly="readonly"/>
	    </div>
	    <div class="form-group">
	      <label for="pwd">Password:</label>
	      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd"value="<?php echo $res['password']; ?>">
	    </div>
	  </form>
	</div>
<?php 	
}
?>
</body>
</html>
