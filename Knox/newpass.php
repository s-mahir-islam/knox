<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="add.css">
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
                <ul>
                    <li><a href="home.php">Dashboard</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="add">
        <h1>Add a new password</h1>
        <form action="add.php" method="POST">
            <!--label for="name">Name:</label><br-->
            <input type="text" placeholder="Name" id="name" name="name" autofocus><br>
            <!--label for="link">URL:</label><br-->
            <input type="text" placeholder="Enter website link" id="link" name="link"><br>
            <!--label for="email">Email:</label><br-->
            <input type="email"  placeholder="Email" id="email" name="email" required><br>
            <!--label for="psswd">Password:</label><br-->
            <input type="password" placeholder="Password" id="psswd" name="psswd" required><br>
            <input class="submit" type="submit" value="Save password"><br>
        </form>
    </div>

</body>

</html>