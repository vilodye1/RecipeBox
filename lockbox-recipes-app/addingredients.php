<?php
include 'header.php';

require_once 'includes/dbh.inc.php';
require_once 'includes/addrecipe.inc.php';

if(isset($_POST['next'])){

    if (empty($_FILES['choosephoto']['name'])) {
        $_SESSION["recipephoto"] = 'DEFAULT.png';
    } else {
        $_SESSION["recipephoto"] = $_FILES['choosephoto']['name'];
    }

    $_SESSION["recipeName"] = addslashes($_POST['recipename']);
    $_SESSION["recipeDesc"] = addslashes($_POST['recipedescription']);
    $_SESSION["recipeNotes"] = addslashes($_POST['recipenotes']);
    $_SESSION["prepTime"] = $_POST['preptime'];
    $_SESSION["cookTime"] = $_POST['cooktime']; 
}


?>

<section class="addrecipe-form">

    <div class="form-flex">
        <form class="form" action="includes/addrecipe.inc.php" method="post">

        <h1 class= edit-header>Add Ingredients</h1>
        <input type="text" name="ingredient" class="ingredient">
        <input type="submit" name="addIng" class="add-ing-btn" value="add">

        <!-- Ingredients list -->
        <?php 
            $ingredients = mysqli_query($connect, "SELECT * FROM ingredients");
            $array = array();
            $i = 1; while ($row = mysqli_fetch_array($ingredients)) {?>
                <?php array_push($array, $row['ingredient']); ?>
                <div class="ing-container">
                    <p><?php echo $row['ingredient']; ?></p>
                    <b><a href="addingredients.php?del_ing=<?php echo $row['id']; ?>">X</a></b>
                </div>

            <?php $i++; } 

            $_SESSION['ingredients'] = json_encode($array);
        ?>


        <input type="submit" name="next2" class="next-action-btn" value="next">
        </form>
    </div>

 
    <?php
    
    // // Error message handling
    //     if (isset($_GET["error"])) {
    //         if ($_GET["error"] == 'emptying') {
    //             echo "<p class='error'>*Enter an ingredient</p>";
    //         }
    //     }
    
    ?>

</section>

<!-- NOTES -->
<!-- After submitting ADD, display list at bottom of form with numbered measurements BOLD -->
<!-- For every even number, apply rgb(69,69,69) as background-color -->