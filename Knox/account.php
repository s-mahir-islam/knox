<?php
include("config.php");
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="home.css">
    <title>Project Knox</title>
</head>

<body>
<header>
        <!--Navbar-->
        <nav class="navbar">
            <div class="titleknox">
                <h1>Project Knox</h1>
            </div>
            <div class="navlinks">
                <ul class="nav">
                    <li>Dashboard</li>
                    <li><a href="Logout.php">Log out</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="admin">

        <div class="sidebar">
            <ul>
                <li><a href="newpass.php">Add a new password</a></li>
                <li><a href="account.php">Account</a></li>
                <li><a href="contact.html">Contact</a></li>
                
            </ul>
        </div>

        <div class="content">
            <div class="overview">
                <h2>Account Overview</h2>
            </div>
            <div class="info">
                <h2>Profile</h2>
                <ul class="profile">
                <?php
                    $uid = $_SESSION['uid'] ;

                    $sql = "SELECT email, fname, lname  FROM acc_login WHERE uid = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('s', $uid);
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($email, $fname, $lname);
                    while ($stmt->fetch()){
                        echo "<li>First Name: {$fname} </li>
                        <li>Last Name: {$lname}</li>
                        <li>Email: {$email}</li>";

                    }
                ?>
                </ul>
            </div>

        </div>

</body>

</html>