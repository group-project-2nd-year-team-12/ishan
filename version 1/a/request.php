<?php session_start(); ?>
<?php include('inc/connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Request page</title>
</head>
<body>
<?php 

	
	//	print_r($_GET);
		$register_student_id=$_SESSION['id'];
		$B_Owner_id=$_GET['BO_id'];
		//$telephone=$_SESSION['telephone'];
		$B_post_id=$_GET['B_post_id'];

		/* function fun(){
	 	//$B_post_id=$_GET['B_post_id'];
	 	$query=' SELECT * FROM request WHERE student_id=$register_student_id AND B_post_id=$B_post_id';
	 	if($connection->query($query)){
	 		echo "string";
	 		echo "<script>alert('You already requested');
	 		getElementById('demo').innerHTML='already Request';
	 		</script>";
	 	}}*/


	//	$last_name=$_SESSION['last_name'];
		
		$location=$_GET['location'];
		$category=$_GET['category'];
		$girlsBoys=$_GET['girlsBoys'];
		//echo $register_id;
		$message="{$location} and {$category} would like to request an your boarding house";
		//echo $register_s_email;
		//$query="INSERT INTO request VALUES ($B_post_id,'{$message}',20)";

		$query = "INSERT INTO request (req_id ,student_id,BO_id,B_post_id,message,isAccept,date) VALUES (NULL,$register_student_id,$B_Owner_id,$B_post_id, '{$message}',0, CURRENT_TIMESTAMP)";

		if($connection->query($query)){
			echo "<script>alert('Your account request is now pending for approval. Please wait for confirmation. Thank you.')</script>";
			//header('location: users.php');
			echo "<button><a href='users.php'>back</a></button>";

		}
		else{
			echo "<script>alert('Unknown error occured.')</script>";
			echo $connection->error;
			echo "<button><a href='users.php'>back</a></button>";
		}


	




 ?>
 <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
<?php $connection->close();
 ?>