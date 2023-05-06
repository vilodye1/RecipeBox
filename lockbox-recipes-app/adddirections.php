<?php
include 'header.php';

require_once 'includes/dbh.inc.php';
require_once 'includes/addrecipe.inc.php';

if(isset($_POST['next2'])){
    $_SESSION['ingredients'] = $_SESSION['ingredients'];
}
?>

<section class="addrecipe-form">

    <div class="form-flex">
        <!-- NOT REDIRECTING OR SAVING TO DATABASE -->
        <form class="form" action="includes/addrecipe.inc.php" method="post">
        <h1 class="edit-header">Add Directions</h1>
        <textarea col="2" name="step" class="ingredient"></textarea>
        <input type="submit" name="addstep" class="add-ing-btn" value="add step">

        <!-- Directions list -->
        <?php 
            $directions = mysqli_query($connect, "SELECT * FROM directions");
            $dirArray = array();

            $i = 1; while ($row = mysqli_fetch_array($directions)) {?>
                <?php array_push($dirArray, $row['step']); ?>
                <div class="step-container">
                    <div class="add-flex-dir">
                    <?php echo "<b><p>Step ".$i."</p></b>" ?>
                        <b><a class="delete-step" href="adddirections.php?del_task=<?php echo $row['id']; ?>">X</a></b>
                    </div>
                    <p><?php echo $row['step']; ?></p>  
                </div>

            <?php $i++; } 

            $_SESSION['directions'] = json_encode($dirArray);
        ?>

        <input type="submit" name="submit" class="next-action-btn" value="submit">
        </form>
    </div>
</section>