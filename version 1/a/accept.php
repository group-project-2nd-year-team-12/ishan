<?php  session_start(); ?>
<?php require_once("inc/connection.php"); ?>
<?php require_once("functions.php"); ?>
<?php
    
    $id = $_GET['id'];
    $boardingOwner=$_SESSION['first_name'];
 
    $boardingOwner_email=$_SESSION['email'];
    
    
    $student_id=$_GET['student_id'];
     $student_email=$_GET['student_email'];
    /*$query = "select * from request where B_post_id = $id ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];
            $password = $row['password'];
            $query = "INSERT INTO `accounts` (`id`, `firstname`, `lastname`, `email`, `type`, `password`) VALUES (NULL, '$firstname', '$lastname', '$email', 'user', '$password');";
        }*/
        $query = "UPDATE request SET isAccept=1 WHERE student_id = $student_id AND B_post_id=$id";
        if($connection->query($query)){
            //echo $id;
            echo "Request has been accepted.<br>";
               // $query="SELECT * From "
                $to_email = "{$student_email}";
                $subject = "Message from Boadima.lk Website";
                $body = "Hi I am $boardingOwner, You requested my boarding place id=$id.I like to select you for my boarding place.Please confirm deal soon.Thank You.";
                $headers = "boadima7@gmail.com";

                if (mail($to_email, $subject, $body, $headers)) {
                    echo "Email successfully sent to $to_email...";
                } else {
                    echo "Email sending failed...";
                }
        }else{
            echo "Unknown error occured. Please try again.";
        }
    
       
    
?>
<br/><br/>
<a href="BOHome.php">Back</a>