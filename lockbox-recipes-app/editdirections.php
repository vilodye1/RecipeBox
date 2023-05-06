<?php

    require_once 'includes/dbh.inc.php';
    require_once 'includes/editIngredients.inc.php';
   ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">

    <title>RecipeBox</title>
</head>
<body>

<section class="my-recipes-page">

<div class='sub-header'>
            <div class='sub-header-flex'>
            <!-- Create edit recipe cancel inc.php file to return to direct recipe page -->
            <?php echo "<a href='recipe.php?id={$row['id']}'>"?>Cancel</a>
              <label>
                <input type='checkbox' name='checkbox' class='checkbox' >
                <img src='uploads/sun-icon.png' class='light-dark-switch'>
              </label>
            </div>
            <h1 class='sub-logo'><a href='index.php'>RecipeBox</a></h1>
            </div>
</section>
<h1 class="edit-header">Update Directions</h1>
<div>

<div class="form-flex">
        <form class="form" action="" method="post">

        <p>Separate each step in directions with a comma.</p>

        <textarea name="directions" class="edit-dir-text"><?php foreach ($recipeDir as $dir) {echo $dir . ",\n";};?></textarea>
        <input type="hidden" name="directions" class="list">

        <script type="text/javascript">
            const directions = document.querySelector('.edit-dir-text');
            const storeList = document.querySelector('.list');

            const createValue = () => {
                let value = directions.value.trim()
                value = value.replace(/\n/g, '');
                value = value.replace(/,\s*$/, '');
                newValue = value.split(',');
                storeList.value = JSON.stringify(newValue);
            }
            createValue();

            directions.addEventListener('keyup', createValue);
        </script>

        <input type="submit" name="submit" class="next-action-btn" value="next">
        </form>
    </div>
    <script type="text/javascript" charset="utf-8" src="header.js"></script>
</body>