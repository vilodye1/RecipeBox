<?php
if (isset($_POST['submit'])) {
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdrepeat = $_POST['pwdrepeat'];
    $email = $_POST['email'];


require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if (emptyInputSignup($email, $uid, $pwd, $pwdrepeat) !== false) {
    header("location: ../signup.php?error=emptyinput");
    // exit() stops script from running
    exit();
}
if (invalidUid($uid) !== false) {
    header("location: ../signup.php?error=invaliduid");
    exit();
}
if (invalidEmail($email) !== false) {
    header("location: ../signup.php?error=invalidemail");
    exit();
}
if (pwdMatch($pwd, $pwdrepeat) !== false) {
    header("location: ../signup.php?error=passworddontmatch");
    exit();
}
if (uidExists($connect, $uid, $email) !== false) {
    header("location: ../signup.php?error=usernametaken");
    exit();
}

createUser($connect, $email, $uid, $pwd);

} else {
// Redirect - header is used as a Redirect
header("location: ../signup.php");
}

