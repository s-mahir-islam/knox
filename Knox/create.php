<?php
include("config.php");

$fname =  $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
$uid = uniqid("user_");


$Select = "Select email From acc_login Where email = ? Limit 1";
$Insert = "Insert Into acc_login (email, uid, fname, lname, pswd) values (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($Select);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($email);
$stmt->store_result();
$rnum = $stmt->num_rows;

if ($rnum==0){
	$stmt->close();
	$stmt = $conn->prepare($Insert);
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	$hashedpwd = password_hash($password, PASSWORD_BCRYPT);
	$stmt->bind_param('sssss', $_POST['email'], $uid, $_POST['fname'], $_POST['lname'], $hashedpwd);
	$stmt->execute();
    echo 'You have successfully registered, you can now login!';
    
    header("Location: /knox/login.php");
} else {
	echo "Email is already in use";
}


?>