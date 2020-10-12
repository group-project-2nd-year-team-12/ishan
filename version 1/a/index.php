<?php  session_start(); ?>
<?php require_once("inc/connection.php"); ?>
<?php require_once("functions.php"); ?>




 <?php 

if (isset($_POST['submit'])) {
	$errors=array();


	if (!isset($_POST['email']) || strlen(trim($_POST['email']))<1) {

		$errors[]='username is missing/invalid'; 
	}

	if (!isset($_POST['password']) || strlen(trim($_POST['password']))<1) {
		
		$errors[]='password is missing/invalid';
	}


	if(empty($errors))
	{
		$email=mysqli_real_escape_string($connection,$_POST['email']);
		$password=mysqli_real_escape_string($connection,$_POST['password']);
		$hashed_password=sha1($password);



		$query="SELECT * FROM user WHERE email='{$email}' AND password='{$hashed_password}' LIMIT 1";
		$result_set=mysqli_query($connection,$query);


		    verify_query($result_set);

			//echo "query is succesfully";
			if (mysqli_num_rows($result_set)==1) {
				//$user=mysqli_fetch_assoc($result_set);
				//$user=mysqli_fetch_assoc($result_set);
               

                $user=mysqli_fetch_assoc($result_set);
                $_SESSION['id']=$user['id'];
                $_SESSION['first_name']=$user['first_name'];
                $_SESSION['type']=$user['type'];
                $_SESSION['email']=$user['email'];


                	if($_SESSION['type']=='admin')
					{
						header('Location: BOHome.php');
					}else{
						header('Location: users.php');
					} 
				
				$query="UPDATE user SET last_login=NOW() WHERE id={$_SESSION['id']} LIMIT 1";

			    $result_set=mysqli_query($connection,$query);

			    verify_query($result_set);

				   


				
				//echo "valid user found";
				//header("Location: users.php");
			}


			else{
				$errors[]='invalid username / password';
			}


	}



}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div class="login">
		<form action="index.php" method="post">
			<fieldset>
			  <legend><h1>Log In</h1></legend>	
			  <?php if(isset($errors)&& !(empty($errors))) {
			  	echo "<p class='error'>
			  	Invalid Username/Password
			  </p>";}?>
			
			   
			  <?php if (isset($_GET['logout'])) {
			  	echo "<p class='info'>you have  succesfully logout from the system</p>";
			  } ?>

			  <p>
			  	<label for="">Username</label>
			  	<input type="text" name="email" placeholder="Email address"  autofocus="email">
			  </p>
			  <p>
			  	<label for="">Password</label>
			  	<input type="password" name="password" placeholder="password" id="">
			  </p>
			  <p>
			  	<button type="submit" name="submit">Log In</button>
			  </p>

			</fieldset>
			
		</form>
	</div>
</body>
</html>
<?php mysqli_close($connection); ?>