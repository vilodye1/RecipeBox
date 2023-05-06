<?php 
  session_start();
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

        <?php

          $homepage = '/lockbox-recipes-app/index.php';
          $myRecipePage = '/lockbox-recipes-app/myrecipes.php';
          $addRecipePage = '/lockbox-recipes-app/addrecipe.php';
          $addIngredientsPage = '/lockbox-recipes-app/addingredients.php';
          $addDirectionsPage = '/lockbox-recipes-app/adddirections.php';
          $recipePage = '/lockbox-recipes-app/recipe.php';
          $top6Page = '/lockbox-recipes-app/top6.php';

          $currentPage = $_SERVER['REQUEST_URI'];
          
          if ($currentPage == $myRecipePage) {
            echo "<div class='sub-header'>
                  <div class='sub-header-flex'>
                  <a href='index.php'>Back</a>
                  <div class='sub-header-flex-child'>
                    <label>
                      <input type='checkbox' name='checkbox' class='checkbox' >
                      <img src='uploads/sun-icon.png' class='light-dark-switch'>
                    </label>
                    <a class='logout-button-sub' href='includes/logout.inc.php'>Logout</a>
                    </div>
                  </div>
                  <h1 class='sub-logo'><a href='index.php'>RecipeBox</a></h1>
                  </div>
                  ";
          } else if ($currentPage == $addRecipePage || $currentPage == $addIngredientsPage || $currentPage == $addDirectionsPage || $currentPage == $top6Page) {
            echo "<div class='sub-header'>
            <div class='sub-header-flex'>
            <a href='index.php'>Cancel</a>
            <label>
              <input type='checkbox' name='checkbox' class='checkbox' >
              <img src='uploads/sun-icon.png' class='light-dark-switch'>
            </label>
          </div>
            <h1 class='sub-logo'><a href='index.php'>RecipeBox</a></h1>
            </div>
            ";
          } else if ($currentPage == $homepage) {
              echo "<div class='sub-header-index'>
              <div class='sub-header-flex-reverse'>
                    <label>
                      <input type='checkbox' name='checkbox' class='checkbox' >
                      <img src='uploads/sun-icon.png' class='light-dark-switch'>
                    </label>
                  </div>
              <h1 class='sub-logo'><a href='index.php'>RecipeBox</a><span></span></h1>
              </div>
              ";
          }  else {
            echo "<div class='sub-header'>
            <div class='sub-header-flex'>
            <a href='myrecipes.php'>Back</a>
              <div class='sub-header-flex-child'>
                <label>
                  <input type='checkbox' name='checkbox' class='checkbox' >
                  <img src='uploads/sun-icon.png' class='light-dark-switch'>
                </label>
                <a class='logout-button-sub' href='includes/logout.inc.php'>Logout</a>
              </div>
            </div>
            <h1 class='sub-logo'><a href='index.php'>RecipeBox</a></h1>
            </div>
            ";
          }
        ?>
            <!-- LIGHT/DARK MODE SWITCH -->


<script type="text/javascript" charset="utf-8" src="header.js"></script>
    