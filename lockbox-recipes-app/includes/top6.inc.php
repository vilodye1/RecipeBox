<?php
require_once 'dbh.inc.php';

$user = $_SESSION['useruid'];
$content = mysqli_query($connect, "SELECT * FROM top6 WHERE user='$user'");


if (isset($_POST['submit'])) {
    $top1 = $_POST['top1select'];
    $top2 = $_POST['top2select'];
    $top3 = $_POST['top3select'];
    $top4 = $_POST['top4select'];
    $top5 = $_POST['top5select'];
    $top6 = $_POST['top6select'];

    if(mysqli_num_rows($content) == 0){
    $sql = "INSERT INTO top6 (user, top1, top2, top3, top4, top5, top6) VALUES (
    '" . $_SESSION['useruid'] . "',
    '" . $top1 . "',
    '" . $top2 . "',
    '" . $top3 . "',
    '" . $top4 . "',
    '" . $top5 . "',
    '" . $top6 . "' )";

    $res = mysqli_query($connect, $sql);
    header('location: index.php');
    } else if(mysqli_num_rows($content) == 1) {

    $sqlupdate = "UPDATE top6 SET 
    top1 = '$top1',
    top2 = '$top2',
    top3 = '$top3',
    top4 = '$top4',
    top5 = '$top5',
    top6 = '$top6'
    WHERE user = '$user'";
    $res2 = mysqli_query($connect, $sqlupdate);
    header('location: index.php');
    }
}