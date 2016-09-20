<?php

session_start();
$servername = "localhost";
$username = "user";
$password = "user";
$dbname = "project";


$username1 = isset($_POST["username"])? $_POST["username"]: " ";
$passwordOne = isset($_POST["pass"])? $_POST["pass"]: " ";
$passwordTwo = isset($_POST["pass1"])?$_POST["pass1"]: " ";
$email = isset($_POST["email"])?$_POST["email"]: " ";
$count = false;
if (filter_var($email,FILTER_VALIDATE_EMAIL) && $passwordOne === $passwordTwo) {

	//echo "validate email";
}




try {

	$conn = new PDO("mysql:host=localhost;dbname=project", $username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//echo "Connected successfully";
	$stmt = $conn->prepare("INSERT INTO registration (password,user_email,user_name) VALUES

(?, ?, ?)");

	// insert one row
	$stmt->execute(array($passwordOne,$email,$username1));

	header("Location: login.php");
	$conn = null;

}

catch(PDOException $e)
{
	echo "nevalid data try again....";
	header('Refresh: 3; url=registration.html');
}

