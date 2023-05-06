<?php 
session_start();

if (isset($_GET['id'])) {

$id = mysqli_real_escape_string($connect, $_GET['id']);
$sql = "SELECT * FROM recipe WHERE id='$id'";
$recipe = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($recipe);
$recipeIng = json_decode($row['ingredients'], true);
$recipeDir = json_decode($row['directions'], true);
}

// if (isset($_POST['editIng'])) {

// $ingredient = $_POST['ingredient'];
// $sqling = "INSERT INTO ingredients (ingredient) VALUES ('$ingredient')";
// mysqli_query($connect, $sqling);
// }


if(isset($_POST['next'])){
$_SESSION["recipeName"] = $_POST['recipename'];
$_SESSION["recipeDesc"] = $_POST['recipedescription'];
$_SESSION["recipeNotes"] = $_POST['recipenotes'];
// $_SESSION["recipephoto"] = $_FILES['choosephoto']['name'];
$_SESSION["prepTime"] = $_POST['preptime'];
$_SESSION["cookTime"] = $_POST['cooktime'];
}

if(isset($_POST['next2'])){
    $_SESSION["ingredients"] = $_POST['ingredient-list'];
}

if (isset($_POST['submit'])) {

    $id = mysqli_real_escape_string($connect, $_GET['id']);

    $recipeName = $_SESSION['recipeName'];
    $recipeDesc = $_SESSION['recipeDesc'];
    $recipeNotes = $_SESSION['recipeNotes'];
    // $recipePhoto = $_SESSION['recipephoto'];
    $recipePrep = $_SESSION['prepTime'];
    $recipeCook = $_SESSION['cookTime'];
    $ingredients = $_SESSION['ingredients'];
    $directions = $_POST['directions'];

    $sql = "UPDATE recipe SET 
    recipename = '$recipeName', 
    recipedesc = '$recipeDesc',
    notes = '$recipeNotes',
    prepTime = '$recipePrep',
    cookTime = '$recipeCook', 
    ingredients = '$ingredients', 
    directions = '$directions'
    WHERE id = '$id'";

    $res = mysqli_query($connect, $sql);
    
    // Clears ingredients table
    mysqli_query($connect, 'TRUNCATE TABLE ingredients');
    header('location: recipe.php?id=' . $id);
    exit();
}



?>