<!DOCTYPE html>
<html>
<head>
	<title>Insert</title>
</head>

<?php 
require_once('inc/connection.php');

/*  if(isset($_POST['submit'])){
    $BO_id = $_POST['BO_id'];
    $category = $_POST['category'];
    $city = $_POST['city'];
    $description = $_POST['description'];
    $gender = $_POST['gender'];

    $query = "INSERT INTO post(BO_id,category,city,description,gender) VALUES ($BO_id, '{$category}', '{$city}', '{$description}', '{$gender}')";
    $result=mysqli_connect($connection,$query);
        if($result)
        {
            echo "record added";
        }
        else{
            echo "query failed";
        }
           

        }
      
   */   



$first_name='amal';
$last_name='lakshan';
$email='amal@gmail.com';
$password='amal';
$hashed_password=sha1($password);
$is_deleted=0;
$query="INSERT INTO user(first_name,last_name,email,password,is_deleted,type)VALUES('{$first_name}','{$last_name}','{$email}','{$hashed_password}',{$is_deleted},'owner')";
$result=mysqli_query($connection,$query);
if($result){
	echo "1 record add";
}
else{
	echo "query failed";
}

  ?>
<body>



  	<div>
            <form method="post">
     
              <label>Boarding Owner Id</label>
              <input name="BO_id" type="text" required autofocus>
              <label>Category</label>
              <input name="category" type="text" required>
              <label>City</label>
              <input name="city" type="text"required>
              <label>Description</label>
              <input name="description" type="text"required>
              <label>Gender</label>
              <input name="gender" type="text"required>
             
              <button name="submit" type="submit">Submit</button>
              
            </form>
          </div>
</body>
</html>

 <?php mysqli_close($connection); ?>