<?php

session_start();

$userId = $_SESSION["userId"];

$servername = "localhost";
$username = "user";
$password = "user";

try {

	$conn = new PDO("mysql:host=localhost;dbname=project", $username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql= "SELECT picture FROM animals  WHERE id  LIKE $userId "   ;
	
	$stmt = $conn->prepare($sql);
	
	$stmt->execute();
	
	$result = $stmt->fetchAll();
	
	$object = [
			"pictures" => $result,
			"rows" => count($result)
	];
	echo json_encode($object);
	
	$conn = null;
	}
	catch(PDOException $e)
	{
		echo "Connection failed: " . $e->getMessage();
	}
?>