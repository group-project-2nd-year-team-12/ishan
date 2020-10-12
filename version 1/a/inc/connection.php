<?php 
$connection=new mysqli('localhost','root','','userdb');

if ($connection->connect_error) {

	die('database connection failed'.$connection->connect_error);
}
else {
	//echo "database connection succesfully";
}

	function fetchAll($query){
        
        $stmt = $connection->query($query);
        return $stmt;
    }




 ?>
 <?php

    
    /*define('DBINFO','mysql:host=localhost;dbname=userdb');
    define('DBUSER','root');
    define('DBPASS','');

    function performQuery($query){
        $con = new PDO(DBINFO,DBUSER,DBPASS);
        $stmt = $con->prepare($query);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    function fetchAll($query){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->query($query);
        return $stmt->fetchAll();
    }*/

?>
