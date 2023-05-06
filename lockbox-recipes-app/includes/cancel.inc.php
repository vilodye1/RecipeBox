<?php

session_start();
session_unset();
session_destroy();

// send to front page
header('location: ../index.php');
exit();