<!-- php tag left open to avoid error -->
<!-- To be executed only when there is only php in the file -->

<?php

$serverName = "localhost";
$dBUserName = "root";
$dBPassword = "";
$dBName = "recipebox";

// connection
$connect = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}