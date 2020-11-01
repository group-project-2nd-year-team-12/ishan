<?php include('connection.php'); ?>
<?php 
$user_list='';

if (isset($_POST['category'])) {
 	//echo $_POST['category'];
 	//print_r($_POST);
 	$gender=$_POST['gender'];
 	$category=$_POST['category'];
 	$city=$_POST['city'];


 	$query="SELECT * FROM boarding_post WHERE girlsBoys='{$gender}' AND  category='{$category}' AND city LIKE '%{$city}%'";
 	$result=mysqli_query($connection,$query);
 	if ($result) {
 		
 		while ($user=mysqli_fetch_assoc($result)) {
		 		$user_list.='<tr>';
				$user_list.="<td>{$user['city']}</td>";
		 		$user_list.="<td>{$user['category']}</td>";
		 		$user_list.="<td>{$user['girlsBoys']}</td>";
		 		$user_list.="<td>{$user['description']}</td>";
		 		

		 		$user_list.='</tr>';
		 	}
 	}

 }


  ?>
  <link rel="stylesheet" type="text/css" href="ishan.css">
  <table id='customers'>
			<tr>
				<th>Location</th>
			    <th>Category</th>
				<th>Gender</th>
			    <th>Description</th>
				

			</tr>
			<?php 
			echo $user_list;?>
  
   
</table>