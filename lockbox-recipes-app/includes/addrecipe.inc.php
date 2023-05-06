<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

// First form, recipe information
if (isset($_POST['next'])) {
    $name = $_POST['recipename'];
    $desc = $_POST['recipedescription'];

    $file = $_FILES['choosephoto']['tmp_name'];
    $destination = "./uploads/" . $_FILES['choosephoto']['name'];

    move_uploaded_file($file, $destination);

    // check name and description
    if (emptyInputName($name) !== false) {
        header("location: addrecipe.php?error=emptyname");
        exit();
    // } else if (emptyInputDesc($desc) !== false) {
    //     header("location: addrecipe.php?error=emptydesc");
    //     exit();
    } else {
        header("location: addingredients.php");
    }
        } 
            

// second form, ingredients list
if (isset($_POST['addIng'])) {
        $ingredient = $_POST['ingredient'];
        
        if(str_contains($ingredient, ',')) {
            $strEdit = explode(',', $ingredient);
            $newStr = "{$strEdit[0]} ({$strEdit[1]})";
            $sqling = "INSERT INTO ingredients (ingredient) VALUES ('$newStr')";
            mysqli_query($connect, $sqling);
            header('location: ../addingredients.php'); 
        } else {
            $sqling = "INSERT INTO ingredients (ingredient) VALUES ('$ingredient')";
            mysqli_query($connect, $sqling);
            header('location: ../addingredients.php');
        }
    }

// DELETE INGREDIENT
if (isset($_GET['del_ing'])) {
    $id = $_GET['del_ing'];

    mysqli_query($connect, "DELETE FROM ingredients WHERE id=".$id);
    header('location: addingredients.php');
}
// submit 2nd form
if (isset($_POST['next2'])) {
        header('location: ../adddirections.php');
    }

// third form, directions list
if (isset($_POST['addstep'])) {

    if (empty($_POST['step'])) {
        $errors = "You must fill in the task";
    }else{
        $step = $_POST['step'];
        $sqldir = "INSERT INTO directions (step) VALUES ('$step')";
        mysqli_query($connect, $sqldir);
        header('location: ../adddirections.php');
    }
}
// delete step
if (isset($_GET['del_task'])) {
    $id = $_GET['del_task'];

    mysqli_query($connect, "DELETE FROM directions WHERE id=".$id);
    header('location: adddirections.php');
}

// INJECT INTO DATABASE
if (isset($_POST['submit'])) {

    $sql = "INSERT INTO recipe ( user, recipename, recipedesc, notes, recipephoto, prepTime, cookTime, ingredients, directions) VALUES (				
    '" . $_SESSION['useruid'] . "',
    '" . $_SESSION['recipeName'] . "',
    '" . $_SESSION['recipeDesc'] . "',
    '" . $_SESSION['recipeNotes'] . "',
    '" . $_SESSION['recipephoto'] . "',
    '" . $_SESSION['prepTime'] . "',
    '" . $_SESSION['cookTime'] . "',
    '" . $_SESSION['ingredients'] . "',
    '" . $_SESSION['directions'] . "'
    )";

    $res = mysqli_query($connect, $sql);
    
    // Clears ingredients table
    mysqli_query($connect, 'TRUNCATE TABLE ingredients');
    mysqli_query($connect, 'TRUNCATE TABLE directions');
    header('location: ../index.php');
    exit();
}

// DO ALL ERROR HANDLING NEXT


?>