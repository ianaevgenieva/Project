<?php

session_start();
$servername = "localhost";
$username = "user";
$password = "user";
$dbname = "project";


$usernames = isset($_POST["username"])?$_POST["username"]:" nqma";
$pass = isset ($_POST["pass"])?$_POST["pass"]:"nqma ";
//var_dump($usernames);


try {

	$conn = new PDO("mysql:host=localhost;dbname=project", $username, $password);
	
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Connected successfully";
	$sql= "SELECT user_name,password,id  FROM registration  WHERE user_name  LIKE  \"$usernames\""   ;

	$stmt = $conn->prepare($sql);
	
	$stmt->execute();
	
	$result = $stmt->fetch();
	if ($result){
		
		if ($result["password"] == $pass) {
			$_SESSION["userId"] = $result[id];
			$_SESSION["errorLogin"] = 0;
			header("Location:About.php");
		} else {
			$_SESSION["errorLogin"] = 1;
			
			header('Location:login.php');
		}
	}else {
		$_SESSION["errorLogin"] = 1;
		
		header('Location:login.php');
	}
	
	
   
	$conn = null;
}

catch(PDOException $e)
{
	echo "nevalid data try again....";
	
}

 
