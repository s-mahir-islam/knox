<?php
include("config.php");
session_start();

$password = $_POST['passwrd'];
$passwordc = $_POST['cpasswrd'];
$uid = $_SESSION['uid'];


//$Select = "Select email From acc_login Where email = ? Limit 1";
$Insert = "UPDATE acc_login SET pswd values (?) WHERE uid = '$uid'";


if ($password==$passwordc){
	$stmt = $conn->prepare($Insert);
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	$hashedpwd = password_hash($password, PASSWORD_BCRYPT);
	$stmt->bind_param('s', $hashedpwd);
	$stmt->execute();
    echo 'You have successfully registered, you can now login!';
    
    session_unset();
    session_destroy();

    header("Location: /knox/login.php");
} else {
	echo "Password could not be changed";
}


?>