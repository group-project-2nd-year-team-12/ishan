 <?php session_start(); ?>
<?php require_once("inc/connection.php"); ?>
<?php require_once("functions.php"); ?>
<?php 

if (!isset($_SESSION['first_name'])) {
    header('Location: index.php');
} 



   


 /*$user_list='';
 $query='SELECT * FROM user WHERE is_deleted=0 ORDER BY first_name';

 $users=mysqli_query($connection,$query);

 if ($users) {
 	while ($user=mysqli_fetch_assoc($users)) {
 		$user_list.='<tr>';
		$user_list.="<td>{$user['first_name']}</td>";
 		$user_list.="<td>{$user['last_name']}</td>";
 		$user_list.="<td>{$user['last_login']}</td>";
 		$user_list.="<td><a href='modify-user.php?user_id={$user['id']}'>Edit</a></td>";

 		$user_list.="<td><a href='delete-user.php?user_id={$user['id']}'>Delete</a></td>";
 		//$user_list.="<td><a href='delete-user.php?user_id={$user['id]}'>Delete</a>/td>";
 		$user_list.='</tr>';
 	}

	
 }else{
 	echo "database query failed";
}*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>users</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<header>
		<div class="appname">User Management System       <a href="userProfile.php">Profile</a> </div>
	    <div class="loggedin">Welcome  <?php echo $_SESSION['first_name']; ?>!   <a href="logout.php">Log Out</a></div>
	    

	</header>
	
	
	
	<!--<main>
		<h1>Users <span><a href="add-user.php">Add New</a></span></h1>

		<table class="masterlist">
			<tr>
				<th>first Name</th>
				<th>Last Name</th>
				<th>Last Login</th>
				<th>Edit</th>
				<th>Delete</th>

			</tr>
			<?php 
			//echo $user_list;

			 ?>
		</table>
	</main>
-->
<?php 
$student_id=$_SESSION['id'];
	$data_list='';
 $query='SELECT * FROM boarding_post';

 $data=mysqli_query($connection,$query);

 if ($data) {
 	while ($user=mysqli_fetch_assoc($data)) {
 		//$user_id=$user['B_post_id'];
 		$data_list.='<tr>';
		$data_list.="<td>{$user['location']}</td>";
 		$data_list.="<td>{$user['category']}</td>";
 		$data_list.="<td>{$user['description']}</td>";
 		$data_list.="<td>{$user['girlsBoys']}</td>";
 		$GLOBALS['B_post_id']=$user['B_post_id'];
 		/*$data_list.="<td><form method='post'>
		<button type='submit' name='request'>Request</button></form></td>";*/

 		$data_list.="<td><a onclick='fun()' href='request.php?BO_id={$user['BO_id']}& B_post_id={$user['B_post_id']} & location={$user['location']} & category={$user['category']}& girlsBoys={$user['girlsBoys']}' id='demo'>Request</a></td>";
 		//$data_list.="<td><a href='delete-user.php?user_id={$user['id]}'>Delete</a>/td>";
 		$data_list.='</tr>';
 		//echo "<br>";
 	}

	
 }else{
 	echo "database query failed";
}
	



	 ?>
	 <?php
	




        /*if(isset($_POST['request'])){
           // $GLOBALS['location'] = $_POST['location'];
           $category = $_POST['category'];
            //$GLOBALS['description'] = $_POST['description'];
           // $GLOBALS['girlsBoys'] = $_POST['girlsBoys'];
           $message = " would like to request an your boarding house.";
            $query = "INSERT INTO request VALUES ( $message,CURRENT_TIMESTAMP)";
            $result=$connection->query($query);
            if($result){
            	echo "success";
            }
            else{
            	echo "unsuccess";
            }*/



           /* if(){
                echo "<script>alert('Your account request is now pending for approval. Please wait for confirmation. Thank you.')</script>";
            }else{
                echo "<script>alert('Unknown error occured.')</script>";
            }*/
        //}
    
    ?>

	 <main>
	 	<table class="masterlist">
			<tr>
				<th>Location</th> 
				<th>category</th>
				<th>description</th>
				<th>gender</th>
				<th>Request</th>
				

			</tr>
			<?php 
			echo $data_list;

			 ?>
		</table>
	 	

	 </main>

 

 

	

</body>
<script type="text/javascript">
	function fun()
{
	$student_id1=$_SESSION['id'];
	$B_post_id=$GLOBALS['B_post_id'];

	$query="SELECT * FROM request WHERE student_id=$student_id1 ";
	$result1=$connection->query($query);
	if($result1)
	{
		alert ("You already request that post");
	}
	else{
		alert('error');// $connection->error;
	}
}
</script>
</html>
<?php $connection->close(); ?>