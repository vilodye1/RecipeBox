<?php
include 'header.php';

require_once 'includes/dbh.inc.php';
?>

    <!-- searchbar -->
    <form class="search" action="myRecipes.php" method="get">
        <div class="searchbar">
            <input type="text" id="search" name="search" placeholder="Search by keywords...">   
        </div>
    </form>

    <!-- Recipe list -->
    <div class="recipe-list-container">
    <?php 
        $recipes = mysqli_query($connect, "SELECT user, recipename,recipephoto, id FROM recipe");

        $i = 1; while ($row = mysqli_fetch_array($recipes))
            {   
                if($_SESSION['useruid'] === $row['user']){
                if ($i % 2 == 0) {
                echo "<div class='recipe-list-item even'>";
                echo "<a href='recipe.php?id={$row['id']}'><img class='recipe-thumbnail' src='uploads/{$row['recipephoto']}'>{$row['recipename']}
                </a>\n";
                echo "</div>";  
                } else {
                    echo "<div class='recipe-list-item'>";
                    echo "<a href='recipe.php?id={$row['id']}'><img class='recipe-thumbnail' src='uploads/{$row['recipephoto']}'>{$row['recipename']}
                    </a>\n";
                    echo "</div>";  
                }
    ?>
            <?php $i++; }
            }
    ?>
    </div>

    <!-- Search href directory -->
    <?php 
    if (isset($_GET['search'])) {
    $search = $_GET['search'];
        echo "<script type='text/javascript' language='javascript'>document.querySelector('#search').focus();</script>";
    }
    ?>

<!-- Searchbar script -->
    <script type="text/javascript" src="recipeSearch.js"></script>

