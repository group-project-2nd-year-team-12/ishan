<?php session_start(); ?>
<?php include('inc/connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>User Profile System</title>
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<header>
		<div class="appname">User Management System   <a href="users.php">Request Page</a></div>
	    <div class="loggedin">Welcome  <?php echo $_SESSION['first_name']; ?>!   <a href="logout.php">Log Out</a></div>
	    

	</header>
	
	<?php 
		$student_id=$_SESSION['id'];

		$query="SELECT * FROM request WHERE isAccept=1 AND student_id=$student_id";
		$user_list='';
		$result=$connection->query($query);
		if($result)
		{
			//echo "<script> alert('Congralulation'); </script>";
			while ($user=mysqli_fetch_assoc($result)) {
		 		$user_list.='<tr>';
				$user_list.="<td>{$user['BO_id']}</td>";
		 		$user_list.="<td>{$user['B_post_id']}</td>";
		 		

		 		$user_list.="<td><a href='confirm_request.php?user_id={$user['student_id']}& B_post_id={$user['B_post_id']}'>Confirm</a></td>";
		 		$user_list.="<td><a href='reject_request.php?user_id={$user['student_id']}&B_post_id={$user['B_post_id']}'>Reject Request</a></td>";
		 		//$user_list.="<td><a href='delete-user.php?user_id={$user['id]}'>Delete</a>/td>";
		 		$user_list.='</tr>';
		 	}
		 //echo $user_list;
		 	echo "<main>
	 	  <table class='masterlist'>
			<tr>
				<th>Boarding Owner Id</th> 
				<th>Boarding Post Id</th>
				<th>Confirm Boarding Request</th>
				<th>Reject Boarding Request</th>
				

			</tr>"?>.
			<?php 
			echo $user_list;?>.

			<?php  
			echo "</table></main>";
		

			
		}
		else{
			//echo "<script> alert('Don't worry you request is rejectedn'); </script>";
			echo "you request is rejected";
			
			
		}



	 ?>

<script type="text/javascript"></script>
 
</body>
</html>
<?php $connection->close(); ?>