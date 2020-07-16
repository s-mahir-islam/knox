<?php
session_start();

$verify = $_GET["selector"];

$sql = "SELECT * FROM acc_login WHERE uid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $verify);
mysqli_stmt_execute($stmt);

$result = mysqli_fetch_assoc($stmt);

$uid = $result['uid'];

if (!$row = mysqli_fetch_assoc($result)){
    echo "Please submit another request for reset.";
} else {

    $_SESSION['uid']=$uid;

    echo'<!DOCTYPE html>
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
                <form action="forgotpv.php" method="POST">
                    <h2>Knox security</h2>
                    <div class="clear"></div>
                    <h3>Forgot password?</h3>   
                    <!--<label for="email">Email:</label><br>-->
                    <input type="password" placeholder="Insert your new password" id="passwrd" name="passwrd" required autofocus><br>
                    <input type="password" placeholder="Confirm your new password" id="cpasswrd" name="cpasswrd" required autofocus><br>
                    <input class="submit2" type="submit" value="Send"><br>
                    <div class="clear"></div>
                    <div class="contact"><a href="contact.html" style="text-decoration: none;">Help</a></div>
                </form></div>
            
        </body>


        </html>';
}

?>

