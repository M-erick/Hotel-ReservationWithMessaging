<?php 
session_start();
// errors here when a user access a page without login
$eid=$_SESSION['create_account_logged_in'];
error_reporting(1);

// get the count of unread messages for the logged-in user
$sql = "SELECT COUNT(*) AS count FROM feedback WHERE email='$eid' AND read_status=0";
$result = mysqli_query($con, $sql);
$count = mysqli_fetch_assoc($result)['count'];

?>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
.notification-icon {
  position: relative;
  display: inline-block;
  margin-right: 10px;
}

.notification-icon .fa {
  font-size: 20px;
  color: #555;
}

.notification-icon .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 5px;
  font-size: 12px;
  font-weight: bold;
  color: #fff;
  background-color: #f00;
  border-radius: 50%;
}

  </style>
</head>
<!--Menu Bar Close Here-->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>

      <img src="logo/logo12.png"/width="150px"height="60px"style="margin-top:5px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php"title="Home">Home</a></li>
        <li><a href="TourPackage.php"title="Tour Package">Tour Package </a></li>
        <li><a href="about.php"title="About">About </a></li>


		    <!-- <li><a href="image gallery.php"title="Gallery">Gallery </a></li> -->
      </ul>
      <ul class="nav navbar-nav navbar-right">
        
        <li><a href="admin/index.php"title="Admin Login"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Admin Login</a></li>

        <?php 
      if($_SESSION['create_account_logged_in']!="")
      {
        ?>
        <li><a href="notification.php"title="notification"><span class="notification-icon">
  <i class="fa fa-bell"></i>
  <span class="badge"><?php echo $count; ?></span>
    </span>
</a></li>


        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">View Status <span class="caret"></span></a>
        	<ul class="dropdown-menu">
          		<li><a href="profile.php">Profile</a></li>
              <li><a href="order.php">Booking Status</a></li>
              <li><a href="logout.php">Logout</a></li>
        	</ul>
        </li>

        <?PHP } else
		{
		?>
		<li><a href="Login.php"title="login"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;User Login</a>
        </li>
		<?php 
		} ?>
      </ul>
    </div>
  </div>
</nav>   

<!--Menu Bar Close Here-->
