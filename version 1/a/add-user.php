<?php session_start(); ?>
<?php require_once("inc/connection.php"); ?>
<?php require_once("functions.php"); ?>
<?php 

if (!isset($_SESSION['first_name'])) {
    header('Location: index.php');
} 
$errors=array();
$first_name='';
$last_name='';
$email='';

$password='';
if (isset($_POST['submit'])) {
	$first_name=$_POST['first_name'];
   $last_name=$_POST['last_name'];
    $email=$_POST['email'];

    $password=$_POST['password'];

	/*if (empty(trim($_POST['first_name']))) {
		$errors[]='first name is required';
	}
	if (empty(trim($_POST['last_name']))) {
		$errors[]='last name is required';
	}
	if (empty(trim($_POST['email']))) {
		$errors[]='email is required';
	}
	if (empty(trim($_POST['password']))) {
		$errors[]='password is required';
	}*///if ewa 4 k use karanne nathiwa ekakin wade kara gata hake

	$req_fields=array('first_name','last_name','email','password');
	foreach ($req_fields as $field) {
		if (empty(trim($_POST[$field]))) {
		$errors[]=$field .'is required';
		
	}
}

$max_lenths=array('first_name'=>40,'last_name'=>40,'email'=>40,'password'=>40);
	foreach ($max_lenths as $field => $max_len) {
		if (strlen(trim($_POST[$field]))>$max_len) {
		$errors[]=$field .'must be less than '.$max_len.'characters';
		
	}
}
$email=mysqli_real_escape_string($connection,$_POST['email']);

$query="SELECT * FROM user WHERE email='{$email}' LIMIT 1";
$result_set=mysqli_query($connection,$query);
if ($result_set) {
	if (mysqli_num_rows($result_set)==1) {
		$errors[]='You entered email address is already exists';
	}
}

if(empty($errors))
{
	//no errors now we can add a record database
	$first_name=mysqli_real_escape_string($connection,$_POST['first_name']);
	$last_name=mysqli_real_escape_string($connection,$_POST['last_name']);
	$password=mysqli_real_escape_string($connection,$_POST['password']);
	$hashed_password=sha1($password);


	$query="INSERT INTO user(";
	$query.="first_name,last_name,email,password,is_deleted";
	$query.=") VALUES (";
	$query.="'{$first_name}','{$last_name}','{$email}','{$hashed_password}',0";
	$query.=")";

	$result=mysqli_query($connection,$query);
	if ($result) {
		//query succesfully
		header('Location:users.php');
	}else{
		$errors[]='query failed';
	}
}


}

 ?>
 




<!DOCTYPE html>
<html>
<head>
	<title>Add new user</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<header>
		<div class="appname">User Management System</div>
	    <div class="loggedin">Welcome  <?php echo $_SESSION['first_name']; ?>!   <a href="logout.php">Log Out</a></div>
	    

	</header>
	
	<main>
		<h1>Add New user<span><a href="users.php">Back to user list</a></span></h1>

		<?php 
		if (!empty($errors)) {

			echo "<div class='error'>";
		 	echo "there is a problem<br>";
		 	foreach ($errors as $error) {
		 		echo $error."<br>";
		 	}
		 	echo "</div>";
		 } ?>
		 
	</main>
	<form action="add-user.php" method="post" class="userform">
		<p>
			<label>First Name</label>
			<input type="text" name="first_name" <?php echo 'value="'.$first_name.'"'; ?>>
		</p>
		<p>
			<label>Last Name</label>
			<input type="text" name="last_name"<?php echo 'value="'.$last_name.'"'; ?>>
		</p>

		<p>
			<label>Email Address</label>
			<input type="email" name="email"<?php echo 'value="'.$email.'"'; ?>>
		</p>

		<p>
			<label>Password</label>
			<input type="password" name="password">
		</p>

		<p>
			<label>&nbsp</label>
			<button type="submit" name="submit">Save</button>
		</p>



	</form>

</body>
</html>
<?php mysqli_close($connection); ?>