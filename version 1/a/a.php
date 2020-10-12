<?php  include('inc/connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>insert data</title>
</head>
<?php
	if(isset($_POST['submit'])){
    $BO_id = $_POST['BO_id'];
    $category = $_POST['category'];
    $city = $_POST['city'];
    $description = $_POST['description'];
    $gender = $_POST['gender'];

    $query = "INSERT INTO post (BO_id,category,city,description,gender) VALUES ( $BO_id ,'{$category}','{$city}', '{$description}', '{$gender}')";
    	$result=$connection->query($query);
        if($result)
        {
            //echo "record added";
        }
        else{
            echo $connection->error;
        }
           

}

  ?>
<body>
	<div>
            <form method="post">
              <label>Boarding Owner</label>
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
<?php $connection->close(); ?>