<?php
include 'header.php';

require_once 'includes/dbh.inc.php';
require_once 'includes/addrecipe.inc.php';

?>

<section class="addrecipe-form">

    <div class="form-flex">
        <form class="form" action="addingredients.php" enctype="multipart/form-data" method="post">
            <!-- BASIC DESCRIPTION -->
            <div class="input-group">
                <p>Name <?php 
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == 'emptyname') {
                            echo "<span class='error'>*Must enter a name</span>";
                        }
                    }
                    ?> 
                </p>
                <input type="text" name="recipename" placeholder="beef stew">
            </div>
            <div class="input-group description">
                <p>Description</p>
                <textarea cols="2" name="recipedescription" placeholder="hearty beef stew recipe"></textarea>
            </div>
            <div class="input-group">
                <p>Notes</p>
                <textarea cols="2" name="recipenotes" placeholder="Best served with sourdough bread"></textarea>
            </div>
            <!-- ADD PHOTO -->
            <div class="input-group">
                <p>Photo</p>
                <input class="input-photo" type="file" name="choosephoto">
                <!-- <input class="submit-photo" type="submit" name="submit-photo"> -->
            </div>
            <!-- TIMING -->
            <div class="number-inputs">
                <div class="input-group">
                    <p>Prep Time in Minutes</p>
                    <input type="number" name="preptime" placeholder="00">
                </div>
                <div class="input-group">
                    <p>Cook Time in Minutes</p>
                    <input type="number" name="cooktime" placeholder="00">
                </div>
            </div>
            <input type="submit" name="next" class="next-action-btn" value="next">
        </form>
    </div> 

</section>
