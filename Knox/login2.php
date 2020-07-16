<?php
include("config.php");

//if(isset($_POST['submit'])){
    $email = $conn->real_escape_string($_POST['email']);
    $passwd = $conn->real_escape_string($_POST['psswd']);

    $sql = $conn->query("SELECT email, pswd, uid FROM acc_login WHERE email = '$email'");
    if (mysqli_num_rows($sql) > 0){
        $data = $sql->fetch_array();
        $uid = $data['uid'];

        if (password_verify($passwd, $data['pswd'])){
            echo "It worked!";
            session_start();
            $_SESSION['uid']=$uid;
            header('location: /knox/home.php');
        } else{
            echo "Didn't work!";
        //header('location: login.html');
        }
    }