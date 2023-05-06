<?php

require_once 'dbh.inc.php';

if (isset($_GET['id'])) {
    require_once 'includes/dbh.inc.php';

    $id = mysqli_real_escape_string($connect, $_GET['id']);
    $sql = "SELECT * FROM recipe WHERE id='$id'";
    $recipe = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($recipe);
}

    $recipeIng = json_decode($row['ingredients'], true);
    $recipeDir = json_decode($row['directions'], true);

// Delete recipe
if (isset($_GET['del_recipe'])) {
    $id = $_GET['del_recipe'];

    mysqli_query($connect, "DELETE FROM recipe WHERE id=".$id);
    header('location: myrecipes.php');
}