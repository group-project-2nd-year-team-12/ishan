<?php session_start(); ?>
<?php 
	include('inc/connection.php');
	require_once("functions.php"); 

 ?>
 <?php /*if (!isset($_SESSION['first_name'])) {
    header('Location: index.php');
} */
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Boarding Owner Page</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<header>
		<div class="appname">User Management System</div>
	    <div class="loggedin">Welcome  <?php echo $_SESSION['first_name']; ?>!   <a href="logout.php">Log Out</a></div>
	    

	</header>
	
	 <main role="main">

      <section >
        <div >
            <?php
            //echo $time=$_SESSION['last_login'];

            $user_id=$_SESSION['id'];
          
		
             $query="SELECT * FROM request INNER JOIN user ON request.student_id=user.id WHERE request.BO_id=$user_id";
           
			 $data=$connection->query($query);
			 // if ($data) {
    //         	echo $user_id;
    //         }
    //         else{
    //         	echo "unsuccess";
    //         }


			 if ($data) {
			 	// echo $_SESSION['email'] ;

			 	while ($user=mysqli_fetch_assoc($data)) {
			 		//echo "string";
			 		//echo  $user_id;
			 		?>

			 		<p >Student id:<?php echo $user['student_id'] ; ?></p>
			 		<!--<p >user id:<?php //echo $user['user_id']; ?></p>-->
			 		<!--<p >Student Phone:<?php //echo $user['telephone'] ?></p>-->
			 		
			 		<p >Student Email:<?php echo $user['email']; ?></p>

			 		 <p >Boarding post id:<?php echo $user['B_post_id'] ?></p>
                      <p ><?php echo $user['message'] ?></p>
                      <p>
                        <a  href="accept.php?id=<?php echo $user['B_post_id']?>& student_id=<?php echo $user['student_id']?> & student_email=<?php echo $user['email']?>">Accept</a>
                        <a  href="reject.php?id=<?php echo $user['B_post_id'] ?>& student_id=<?php echo $user['student_id']?>& student_email=<?php echo $user['email']?>">Reject</a>
                      </p>
                    <small><i><?php echo $user['date'] ?></i></small>
                    <hr>

                      <?php
                    }
                }else{
                    echo "No Pending Requests.";
                }
                //echo $user['date'];
            ?>
            <?php 
            	$query1="SELECT * FROM request";

            	$date_data=$connection->query($query1);
            	if($date_data)
            	{
            		while ($user_date=mysqli_fetch_assoc($date_data))
            		{
            			echo time()."<br>";
            			// if ((time()-$user_date)>60*60*24*7) {
            			// 	$query2="UPDATE  request SET  WHERE isAccept=0 ";
            			// 	if ($connection->query($query2)) {
            			// 		echo "successfully deleted";
            					
            			// 	}
            				
            			// }
            		}
            	}

             ?>


			 		<!--$user_id=$user['B_post_id'];
			 		$data_list.='<tr>';
					$data_list.="<td>{$user['B_post_id']}</td>";
			 		$data_list.="<td>{$user['message']}</td>";
			 		$data_list.="<td>{$user['date']}</td>";
			 		$data_list.="<td>{$user['girlsBoys']}</td>";

			 		$data_list.="<td><form method='post'>
					<button type='submit' name='request'>Request</button></form></td>";

			 		$data_list.="<td><a href='request.php? B_post_id={$user['B_post_id']} & location={$user['location']} & category={$user['category']}& girlsBoys={$user['girlsBoys']}'>Request</a></td>";
			 		//$data_list.="<td><a href='delete-user.php?user_id={$user['id]}'>Delete</a>/td>";
			 		$data_list.='</tr>';
			 		echo data_list;
			 		echo "<br>";
			 	}

				
			 }else{
			 	echo "database query failed";
			}
-->




            
           
          
        </div>
          
      </section>

    </main>


</body>
</html>
<?php $connection->close(); ?>