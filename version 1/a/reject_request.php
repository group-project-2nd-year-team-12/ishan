<?php session_start(); ?>
<?php include('inc/connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Reject Request</title>
</head>
<body>
	<h1>Reject request</h1>
	<?php 
		 $B_post_id=$_GET['B_post_id'];
		 $student_id=$_SESSION['id'];
		$query="DELETE FROM request WHERE isAccept=1 AND B_post_id=$B_post_id AND student_id=$student_id";
		if($connection->query($query))
		{
			echo "Reject Confirmation deal";
		}




	 ?>


</body>
</html>
<?php $connection->close(); ?>