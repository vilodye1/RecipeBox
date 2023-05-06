<?php

if (isset($_GET['id'])) {

    $id = mysqli_real_escape_string($connect, $_GET['id']);
    $sql = "SELECT * FROM recipe WHERE id='$id'";
    $recipe = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($recipe);
    // $recipeIng = json_decode($row['ingredients'], true);

    if (isset($_GET['del_ing'])) {
        $idDel = $_GET['del_ing'];
    
        mysqli_query($connect, "DELETE FROM ingredients WHERE id=".$idDel);
        header('location: editingredients.php?id='.$id.'');
    }

}

if (isset($_POST['editIng'])) {
    $ingredient = $_POST['ingredient'];
    $sqling = "INSERT INTO ingredients (ingredient) VALUES ('$ingredient')";
    mysqli_query($connect, $sqling);
}