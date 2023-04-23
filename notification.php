<?php 
session_start();
include('connection.php');

// $id=$_GET['id'];
$eid=$_SESSION['create_account_logged_in'];
extract($_REQUEST);


?>

<style>
    .container {
        max-width: 600px;
        margin: 50px auto;
    }

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

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .heading {
        font-size: 28px;
        font-weight: bold;
        color: #333;
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
<div class="container">
    <div class="header">
        <div class="heading">Feedback</div>
        <div class="back-button" onclick="window.history.back()">Back</div>
    </div>
    <?php
    $sql = mysqli_query($con, "SELECT * FROM feedback WHERE email='$eid'");
    $message_ids = array();
    while ($res = mysqli_fetch_assoc($sql)) {
        $message_id = $res['id'];
        if (!in_array($message_id, $message_ids)) { // check if message id already exists
            $message_ids[] = $message_id; // add message id to array
            ?>
            <div class="message-container">
                <div class="message message-left">
                    <p><?php echo $res['message']; ?></p>
                    <span class="time"><?php echo date('F j, Y g:i a', strtotime($res['date_time'])); ?></span>
                </div>
                <?php if ($res['response']) { ?>
                    <div class="message message-right">
                        <p><?php echo $res['response']; ?></p>
                        <span class="time"><?php echo date('F j, Y g:i a', strtotime($res['response_time'])); ?></span>
                    </div>
                <?php } ?>
            </div>
        <?php 
        } // end if
    } // end while
    ?>
</div>

