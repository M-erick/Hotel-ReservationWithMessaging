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
    <title>Reply Feedback</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
    </style>
</head>
<body>
    <header>
        <!-- Add header content here -->
    </header>
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
