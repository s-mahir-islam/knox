<?php
include('config.php');
session_start();

//if(isset($_POST["submit"])){

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
                    <li><a href="Logout.php" class="logout">Log out</a></li>
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
            
            <table class="records">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Website</th>
                    <th>Login</th>
                    <th>Password</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                    $uid = $_SESSION['uid'] ;

                    $sql = "SELECT name, link, login, pswd FROM vault WHERE uid = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('s', $uid);
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($name, $link, $login, $pswd);
                    while ($stmt->fetch()){
                        echo "<tr><td> {$name} </td><td> {$link} </td><td> {$login} </td><td> {$pswd} </td></tr>";

                    }
                ?>
            </tbody>
            


            </table>
            
        </div>




    </div>

</body>

</html>