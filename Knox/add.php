<?php
session_start();
include('config.php');

$uid = $_SESSION['uid'];
$name =  $_POST['name'];
$link = $_POST['link'];
$login = $_POST['email'];
$password = $_POST['psswd'];


$Insert = "INSERT INTO vault (uid, name, link, login, pswd) values (?, ?, ?, ?, ?)";

if ($stmt = $conn->prepare($Insert)) {
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	$stmt->bind_param('sssss', $uid, $name, $link, $login, $password);
	$stmt->execute();
    
    header("Location: /knox/home.php");
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}

?>