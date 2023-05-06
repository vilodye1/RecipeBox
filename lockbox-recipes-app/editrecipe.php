<?php

    if (isset($_GET['id'])) {
        require_once 'includes/dbh.inc.php';
        require_once 'includes/editingredients.inc.php';
    
        $id = mysqli_real_escape_string($connect, $_GET['id']);
        $sql = "SELECT * FROM recipe WHERE id='$id'";
        $recipe = mysqli_query($connect, $sql);
        $row = mysqli_fetch_array($recipe);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    <script
  src="https://code.jquery.com/jquery-3.6.4.min.js"
  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
  crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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
<h1 class="edit-header">Update Recipe</h1>
<div>

    <div class="form-flex">
        <form class="form" action="editingredients.php?id=<?php echo $row['id'];?>" enctype="multipart/form-data" method="post">
            <!-- BASIC DESCRIPTION -->
            <div class="input-group">
                <p>Name</p>
                <input type="text" name="recipename" placeholder="Recipe Name" value="<?php echo $row['recipename'];?>">
            </div>
            <div class="input-group description">
                <p>Description</p>
                <textarea cols="2" name="recipedescription" placeholder="recipe description"><?php echo $row['recipedesc'];?></textarea>
            </div>
            <div class="input-group">
                <p>Notes</p>
                <textarea cols="2" name="recipenotes" placeholder="Best served with sourdough bread"><?php echo $row['notes'];?></textarea>
            </div>
            <!-- ADD PHOTO -->
            <!-- <div class="input-group">
                <p>Photo</p>
                <input class="input-photo" type="file" name="choosephoto" value="<?//php echo $row['recipephoto'];?>">
                 <input class="submit-photo" type="submit" name="submit-photo">
            </div> -->
            <!-- TIMING -->
            <div class="number-inputs">
                <div class="input-group">
                    <p>Prep Time in Minutes</p>
                    <input type="number" name="preptime" placeholder="00" value="<?php echo $row['prepTime'];?>">
                </div>
                <div class="input-group">
                    <p>Cook Time in Minutes</p>
                    <input type="number" name="cooktime" placeholder="00" value="<?php echo $row['cookTime'];?>">
                </div>
            </div>
            <input type="submit" name="next" class="next-action-btn" value="next">
        </form>
</div>
<script type="text/javascript" charset="utf-8" src="header.js"></script>
</body>
