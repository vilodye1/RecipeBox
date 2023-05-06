<?php 

if (isset($_POST["submit"])) {
    // for username AND password
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($uid, $pwd) !== false) {
        header("location: ../login.php?error=emptyinput");
        // exit() stops script from running
        exit();
    }

    loginUser($connect, $uid, $pwd);

} else {
    header("location: ../login.php");
    exit();
}

