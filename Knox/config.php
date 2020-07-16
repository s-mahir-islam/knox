<?php

define('DBServer', 'localhost');
define('DBUserName', 'root');
define('DBPassword', '');
define('Database', 'websitedb');

$conn = mysqli_connect(DBServer,DBUserName,DBPassword,Database);

/* check connection */
if (!$conn) {
    die("Connect failed: %s\n".mysqli_connect_error());

}

/* return name of current default database 
if ($result = $mysqli->query("SELECT DATABASE()")) {
    $row = $result->fetch_row();
    printf("Default database is %s.\n <br>", $row[0]);
    $result->close();
}*/

?>