<?php 
session_start();
include('connection.php');
error_reporting(1);
// $id=$_GET['id'];
$eid=$_SESSION['create_account_logged_in'];
extract($_REQUEST);

$sql = "UPDATE feedback SET read_status = 1 WHERE email = '$eid'";
mysqli_query($con, $sql);


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
 <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>


    .message-container {
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
    }

    .message-container:last-child {
        margin-bottom: 0;
    }

    .message {
        max-width: 80%;
        padding: 10px;
        border-radius: 10px;
        margin-bottom: 5px;
        word-wrap: break-word;
    }

    .message-left {
        align-self: flex-start;
        background-color: #DCF8C6;
    }

    .message-left .time {
        margin-left: 5px;
    }

    .message-right {
        align-self: flex-end;
        background-color: #E2E2E2;
    }

    .message-right .time {
        margin-right: 5px;
    }

    .time {
        font-size: 12px;
        color: #999;
    }

    

    .back-button {
        background-color: #fff;
        color: #333;
        border: 1px solid #333;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .back-button:hover {
        background-color: #333;
        color: #fff;
    }
</style>
</style>
</head>
<body style="margin-top:50px;">
  <?php
  include('Menu Bar.php');
  ?>
<div class="container-fluid text-center"id="" ><!--Primary Id-->
  <h1>Message </h1><br>
  <div class="container">
<?php
$sql = mysqli_query($con, "SELECT * FROM feedback WHERE email='$eid'");
if (mysqli_num_rows($sql) > 0) {
    while ($res = mysqli_fetch_assoc($sql)) {
      $message_id = $res['cid'];
      $message_text = $res['message'];
      $response_text = $res['response'];
    //   $date_time = $res['date_time'];
    //   $response_time = $res['response_time'];
      $response_time = date('M j, Y, g:i a', strtotime($res['response_time']));
      $date_time = date('M j, Y, g:i a', strtotime($res['date_time']));
  ?>
      <div class="message-container">
        <div class="message message-left">
          <p><?php echo $message_text; ?></p>
          <span class="time"><?php echo $date_time; ?></span>
        </div>
        <?php if ($response_text) { ?>
          <div class="message message-right">
            <p><?php echo $response_text; ?></p>
            <span class="time"><?php echo $response_time; ?></span>
          </div>
        <?php } ?>
      </div>
  <?php
    } // end while
  } else {
    echo "<p>No messages found.</p>";
  }
?>
</div>

  </div>
<?php
include('Footer.php')
?>
</body>
</html>
