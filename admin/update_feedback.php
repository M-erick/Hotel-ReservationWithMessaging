<?php 
include('../connection.php');

$id=$_GET['id'];

$sql=mysqli_query($con,"select * from feedback where id='$id'");
$res=mysqli_fetch_assoc($sql);
$response = $res['response'];
extract($_REQUEST);
error_reporting(1);
if(isset($update))
{
    mysqli_query($con,"UPDATE feedback SET response = '$response', response_time = CURRENT_TIMESTAMP, read_status = 0 WHERE id = '$id'");
    $success_message = "Your response was sent successfully.";

} 
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="dashboard.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

 
    <title>Reply Feedback</title>
    <style>
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .success-message {
            margin-top: 20px;
            padding: 10px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
        }
           /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
  
    </style>
</head>
<body>
 
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../index.php">Home</a>
          <!-- <a href="../index.php"title="Home">Home</a> -->
          <a class="navbar-brand" href="dashboard.php?option=feedback">Feedback</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="dashboard.php?option=admin_profile">Profile</a></li>

            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
        <h1>Reply Feedback</h1>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="message">Message</label>
                <input type="text" name="message" value="<?php echo $res['message']; ?>" class="form-control" disabled>
            </div>
            <?php 
            if($response == ''){ ?>
            <div class="form-group">
                <label for="response">Respond</label>
                <textarea name="response" class="form-control" placeholder="Enter your response here" required></textarea>
            </div>
            <?php } else { ?>
                <div class="form-group">
                <label for="response">Replied</label>
                <textarea name="response" class="form-control" placeholder="Enter your response here" readonly><?php echo $res['response']; ?></textarea>
            </div>
            <?php }?>
            <button type="submit" class="btn btn-primary" name="update">Reply Feedback</button>
            <?php if(isset($success_message)) { ?>
                <div class="success-message"><?php echo $success_message; ?></div>
            <?php } ?>
        </form>
    </div>
    <footer>
        <!-- Add footer content here -->
    </footer>
</body>
</html>
