<?php 

    include 'header.php';

    require_once 'includes/dbh.inc.php';
    require_once 'includes/top6.inc.php';

    $user = $_SESSION['useruid'];

    $recipes = mysqli_query($connect, "SELECT * FROM recipe WHERE user='$user'");
    $data = $recipes -> fetch_all(MYSQLI_ASSOC);


    $top6 = mysqli_query($connect, "SELECT * FROM top6 WHERE user='$user'");
    $data6 = $top6 -> fetch_all(MYSQLI_ASSOC);  

?>

<div class="homepage-container">
<!-- <div class="title">
    <h1>RecipeBox</h1>
</div> -->
    <!-- TOP 6 -->
    <div class="top-6-container">
        <!-- TOP ROW -->
        
            <!-- hover state -->
            <div class='top-box'>
            <?php
                foreach ($data6 as $row){
                    foreach($data as $row2){
                        if ($row['top1'] === $row2['id']){
                            echo "<a href='recipe.php?id=".$row2['id']."'><img src='uploads/".$row2['recipephoto']."'.></a>";
                            // echo "<p class='overlay-name'>" . $row2['recipename'] . "</p>";
                        }
                    }
                }
            ?>
            </div>
            <div class='top-box'>
            <?php
                foreach ($data6 as $row){
                    foreach($data as $row2){
                        if ($row['top2'] === $row2['id']){
                            echo "<a href='recipe.php?id=".$row2['id']."'><img src='uploads/".$row2['recipephoto']."'.></a>";
                            // echo "<p class='overlay-name'>" . $row2['recipename'] . "</p>";
                        }
                    }
                }
            ?>
            </div>
            <div class='top-box'>
            <?php
                foreach ($data6 as $row){
                    foreach($data as $row2){
                        if ($row['top3'] === $row2['id']){
                            echo "<a href='recipe.php?id=".$row2['id']."'><img src='uploads/".$row2['recipephoto']."'.></a>";
                            // echo "<p class='overlay-name'>" . $row2['recipename'] . "</p>";
                        }
                    }
                }
            ?>
            </div>
        <div class="break"></div>
        <!-- BOTTOM ROW -->
        <div class='top-box'>
            <?php
                foreach ($data6 as $row){
                    foreach($data as $row2){
                        if ($row['top4'] === $row2['id']){
                            echo "<a href='recipe.php?id=".$row2['id']."'><img src='uploads/".$row2['recipephoto']."'.></a>";
                            // echo "<p class='overlay-name'>" . $row2['recipename'] . "</p>";
                        }
                    }
                }
            ?>
            </div>
            <div class='top-box'>
            <?php
                foreach ($data6 as $row){
                    foreach($data as $row2){
                        if ($row['top5'] === $row2['id']){
                            echo "<a href='recipe.php?id=".$row2['id']."'><img src='uploads/".$row2['recipephoto']."'.></a>";
                            // echo "<p class='overlay-name'>" . $row2['recipename'] . "</p>";
                        }
                    }
                }
            ?>
            </div>
            <div class='top-box'>
            <?php
                foreach ($data6 as $row){
                    foreach($data as $row2){
                        if ($row['top6'] === $row2['id']){
                            echo "<a href='recipe.php?id=".$row2['id']."'><img src='uploads/".$row2['recipephoto']."'.></a>";
                            // echo "<p class='overlay-name'>" . $row2['recipename'] . "</p>";
                        }
                    }
                }
            ?>
            </div>
    </div>
            <!-- edit gear -->
            <div class="edit-gear">
                <a href="top6.php"><img src="uploads/edit.png"></a>
            </div>


    <!-- NAVIGATION -->
    <div id="navbar">
        <a href="addrecipe.php"><b>+ Add Recipe</b></a>
        <a href="myrecipes.php">My Recipes</a>
        <a href="myrecipes.php?search">Search</a>
        <!-- LINK TO PORTFOLIO WEBSITE RECIPE APP PAGE -->
        <a href="#">About</a> 
        <a class="logout-button" href='includes/logout.inc.php'>Logout</a>
    </div>

</div>

</body>

</html>