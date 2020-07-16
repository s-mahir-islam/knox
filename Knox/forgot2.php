<?php

include("config.php");
session_start();

$condition = "";


if(!empty($_POST["email"])) {
		if(!empty($condition)) {
	$condition = " and ";
	}
	$condition = " email = '" . $_POST["email"] . "'";
	}
		
	if(!empty($condition)) {
		$condition = " where " . $condition;
	}

	$sql = "Select * from acc_login " . $condition;
	$result = mysqli_query($conn, $sql);
	$user = mysqli_fetch_array($result);
	$uid = $user['uid'];
	$url = "localhost/knox/newpswd.php?selector=" . $uid;


	if(!empty($user)) {
         echo "We are sending an email right away";
        //require_once("forgot-password-recovery-mail.php");
        
		$to = $_POST["email"];
		
		$url = "localhost/knox/newpswd.php";
        $subject = 'Reset your password for Knox';

        $message = '<p>We have recieved a password reset request. If you did not make this please ignore this email. The link to reset your password is below</p>';
        $message .= '<p>Here is your link:</br>';
        $message .= '<a href = "' . $url . '">' . $url . '</a></p>';

        $headers = "From: <projectknox0@gmail.com>\r\n";
        $headers .= "Reply-To: <projectknox0@gmail.com>\r\n";
        $headers .= "Content-type: text/html\r\n";

        mail($to, $subject, $message, $headers);

        header("location: login.php");

	} else {
		$error_message = 'No User Found';
}
?>