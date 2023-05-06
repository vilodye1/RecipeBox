<?php

// addrecipe.php
function emptyInputName($name) {
    $result;
    // empty(), a built in function to check if an input is empty
    if (empty($name)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// function emptyInputDesc($desc) {
//     $result;
//     // empty(), a built in function to check if an input is empty
//     if (empty($desc)) {
//         $result = true;
//     } else {
//         $result = false;
//     }
//     return $result;
// }

// default image
function emptyInputPhoto($photo) {
    $result;
    // empty(), a built in function to check if an input is empty
    if (empty($photo)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// addingredients.php
function emptyInputIng($ingList) {
    $result;
    // empty(), a built in function to check if an input is empty
    if (empty($ingList)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// signup and login
function emptyInputSignup($email, $uid, $pwd, $pwdrepeat) {
    $result;
    // empty(), a built in function to check if an input is empty
    if (empty($email) || empty($uid) || empty($pwd) || empty($pwdrepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($uid) {
    $result;

    //preg_match is a build in php function that utilizes regex matches
    if (!preg_match("/^[a-zA-Z0-9]*$/", $uid)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result;

    // filter_var is used to check for a valid email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdrepeat) {
    $result;

    if ($pwd !== $pwdrepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExists($connect, $uid, $email) {
    // TRANSLATE - SQL statement for select "all*" from users where usersUid is stored
    // ? is a placeholder
    $sql = "SELECT * FROM users WHERE uid = ? OR email = ?;";
    //preparing new sqli statement
    $stmt = mysqli_stmt_init($connect);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    // ss for 2 strings
    mysqli_stmt_bind_param($stmt, "ss", $uid, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    //fetching the result data
    if ($row = mysqli_fetch_assoc($resultData)) {
        // returns all the data from user inside the database
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}


function createUser($connect, $email, $uid, $pwd) {
    // inserts data into the table, ***MUST BE IN SAME ORDER AS TABLE IN DATABASE
    $sql = "INSERT INTO users (email, uid, pwd) VALUES (?, ?, ?);";
    //preparing new sqli statement
    $stmt = mysqli_stmt_init($connect);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    // a method to shuffle passwords to make for secure, keeping hackers away
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    // ssss for 4 strings - name, email, username, password
    mysqli_stmt_bind_param($stmt, "sss", $email, $uid, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../signup.php?signupsuccessful");
    exit();
}

// Login Page Functions
//
function emptyInputLogin($uid, $pwd) {
    $result;
    // empty(), a built in function to check if an input is empty
    if (empty($uid) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($connect, $uid, $pwd) {
    $uidExists = uidExists($connect, $uid, $uid);

    if ($uidExists === false) {
        header("location: ../login.php?error=incorrectlogin");
        exit();
    }

    // unhashes password
    $pwdHashed = $uidExists["pwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=incorrectlogin");
        exit();
    } else if ($checkPwd === true) {
        // starts a new session
        session_start();
        $_SESSION["userid"] = $uidExists["id"];
        $_SESSION["useruid"] = $uidExists["uid"];
        header("location: ../index.php");
        exit();
    }
}
