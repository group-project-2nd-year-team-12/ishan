<?php  session_start(); ?>
<?php require_once("inc/connection.php"); ?>
<?php require_once("functions.php"); ?>
<?php
    
    $id = $_GET['id'];
     $boardingOwner=$_SESSION['first_name'];
     $student_id=$_GET['student_id'];
     $student_email=$_GET['student_email'];
    $query = "UPDATE request SET isAccept=2 WHERE student_id = $student_id AND B_post_id=$id";;
        if($connection->query($query)){
            echo "Request has been rejected.<br>";
             //echo "Request has been accepted.<br>";
               
                $to_email = "{$student_email}";
                $subject = "Message from Boadima.lk Website";
                $body = "Hi I am $boardingOwner, You requested my boarding place id=$id.I'm sorry,I can't  select you for my boarding place.Thank You.";
                $headers = "boadima7@gmail.com";

                if (mail($to_email, $subject, $body, $headers)) {
                    echo "Email successfully sent to $to_email...";
                } else {
                    echo "Email sending failed...";
                }
        }
        else{
            echo "Unknown error occured. Please try again.";
        }

?>
<br/><br/>
<a href="BOHome.php">Back</a>