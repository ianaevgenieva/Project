<?php
session_start();
$file_get = $_FILES['foto']['name'];
$temp = $_FILES['foto']['tmp_name'];
$idPicture = $_SESSION["userId"];

if(!$file_get){
	header("Location: About.php");
	return 0;
}
$file_to_saved = "animalImages/".$file_get; //Documents folder, should exist in       your host in there you're going to save the file just uploaded
move_uploaded_file($temp, $file_to_saved);


$servername = "localhost";
$username = "user";
$password = "user";

try {

	$conn = new PDO("mysql:host=localhost;dbname=project", $username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $conn->prepare("INSERT INTO animals (id,picture,likes) VALUES ($idPicture,'".$file_to_saved."',0)");
	$stmt->execute();
	$conn = null;
	header("Location: About.php");
}
catch(PDOException $e)
{
	echo "Connection failed: " . $e->getMessage();
}
?>
