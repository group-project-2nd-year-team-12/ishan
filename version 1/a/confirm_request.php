<?php session_start(); ?>
<?php include('inc/connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Confirm Request</title>
</head>
<body>
	<h1>Confirm request</h1>
	<?php
		 $B_post_id=$_GET['B_post_id'];
		 $student_id=$_SESSION['id'];

		  ?>


</body>
</html>
<?php $connection->close(); ?>