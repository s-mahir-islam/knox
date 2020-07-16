<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="login.css">
    <title>Project Knox</title>
</head>

<body>
    <header>
        <!--Navbar-->
        <nav class="navbar">
            <div class="titleknox">
                <h1>Project Knox</h1>
            </div>
        </nav>
    </header>
    <div class="login">
        <form action="forgot2.php" method="POST">
            <h2>Knox security</h2>
            <div class="clear"></div>
            <h3>Forgot password?</h3>   
            <!--<label for="email">Email:</label><br>-->
            <input type="email" placeholder="Email" id="email" name="email" required autofocus><br>
            <!--<label for="psswd">Password:</label><br>-->
            <input class="submit2" type="submit" value="Send"><br>
            <div class="clear"></div>
            <div class="contact"><a href="contact.html" style="text-decoration: none;">Help</a></div>
        </form></div>
    
</body>


</html>