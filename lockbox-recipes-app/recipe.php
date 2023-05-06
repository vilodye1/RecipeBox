<?php

include 'header.php';
require_once 'includes/recipe.inc.php';

?>

    <!-- HEADER -->
    
<section class="recipe-page">
    <!-- DELETE MODAL -->
    <div id="overlay" class="modal-overlay"></div>
    <div id = "modal" class="modal-container">
        <div class="modal">
            <p>Are you sure you want to delete</p>
            <?php echo "<p><b>'" . $row['recipename'] . "'</b></p>"; ?>
            <p>from Recipes?</p>
            <div class="modal-buttons">
                <a href="recipe.php?del_recipe=<?php echo $row['id']; ?>">YES</a> |
                <?php echo "<a class='modal-no' href='recipe.php?id={$row['id']}'>" ?>NO</a>
            </div>
        </div>
    </div>

<!-- RECIPE IMAGE -->
<img class="recipe-image" src="uploads/<?php echo $row['recipephoto']?>">
<!-- RECIPE NAME -->
<h1 class="recipe-title"><?php echo $row['recipename']?></h1>
<!-- PREP AND COOK TIMES -->
<div class="recipe-times">
    <p>Prep: <b><?php echo $row['prepTime']?></b> mins</p>
    <p>Cook: <b><?php echo $row['cookTime']?></b> mins</p>
</div>
<!-- RECIPE DESCRIPTION -->
<p class="recipe-desc"><i>"<?php echo $row['recipedesc']?>"</i></p>
<!-- RECIPE INGREDIENTS -->
<div class="recipe-ingredients">
    <p class="ing-title"><b>Ingredients</b></p>

    <ul class="recipe-ingredient-list">
        <?php foreach($recipeIng as $ing) {
            
            echo "<li>" . $ing . "</li>";} ?>
    </ul>
</div>
<!-- RECIPE DIRECTIONS -->
<div class="recipe-directions">
    <p class="dir-title"><b>Directions</b></p>

    <div class="recipe-directions-list">
        <?php 
            foreach($recipeDir as $key=>$dir) {
                $dir = ucfirst($dir);
                $index = $key + 1;
                if ($index % 2 == 0) {
                    echo "<div class='dir-flex even'><p class='dir-index'>" . $index . ".</p><p class='direction'>", $dir . "</p></div>";
                } else {
                    echo "<div class='dir-flex'><p class='dir-index'>" . $index . ".</p><p class='direction'>", $dir . "</p></div>";
                }
            }
        ?></div>
</div>
<!-- RECIPE NOTES -->
<div class="recipe-notes">
        <p class="notes-title"><b>Notes</b></p>

        <p class="notes-list"><?php echo $row['notes']?></p>
</div>
</section>
<!-- RECIPE BUTTONS -->
<!-- <a href="#" class="share recipe-btn">SHARE</a> -->
<a href="editrecipe.php?id=<?php echo $row['id'];?>" class="edit recipe-btn">EDIT</a>
<a href="#" id="deleteBtn" class="delete recipe-btn">DELETE</a>
<!-- ADD MAKE RECIPE BUTTON -->
<!-- ADD SHARE BUTTON -->

<script type="text/javascript" src="recipe.js">

</script>

