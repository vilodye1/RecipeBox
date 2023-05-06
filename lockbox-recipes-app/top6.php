<?php 
    include 'header.php';
    require_once 'includes/dbh.inc.php';
    require_once 'includes/top6.inc.php';

    $user = $_SESSION['useruid'];
    $recipes = mysqli_query($connect, "SELECT * FROM recipe WHERE user='$user'");
    $recipesData = $recipes -> fetch_all(MYSQLI_ASSOC);


    $top = mysqli_query($connect, "SELECT * FROM top6 WHERE user='$user'");
    $topData = $top -> fetch_all(MYSQLI_ASSOC);  
?>
<!-- HEADER -->

<!-- START OF PAGE -->
<div class="top6-page-container">

    <h2 class="top6-header">Pick your Top 6</h2>

    <form action="" method="post" class="top-form">

        <!-- TOP 1 -->
        <div class="top-option-section">
            <label for="top1" class="top-label">1. <?php 
                foreach ($topData as $row) {
                    foreach ($recipesData as $row2) {
                        if ($row['top1'] === $row2['id']) {echo $row2['recipename'] . "</label>"; }
                    }
                }
                ?>
            <div class="top-flex">
                <span class='change'>Change:</span>
                    <select name="top1select">
                        <?php 
                            foreach ($topData as $row) {
                                foreach ($recipesData as $row2) {
                                    if ($row['top1'] === $row2['id']) {echo "<option value=" . $row['top1'] . " selected>" . $row2['recipename'] . "</option>"; }
                                }
                            }
                        ?>
                        <?php 
                            foreach ($recipesData as $row) {
                            echo "<option value=" . $row['id'] . ">" . $row['recipename'] . "</option>";
                             }
                        ?>
                    </select>
            </div>
        </div>

        <!-- TOP 2 -->
        <div class="top-option-section highlighted">
            <label for="top2" class="top-label">2. <?php 
                foreach ($topData as $row) {
                    foreach ($recipesData as $row2) {
                        if ($row['top2'] === $row2['id']) {echo $row2['recipename'] . "</label>"; }
                    }
                }
                ?>
            <div class="top-flex">
                <span class='change'>Change:</span>
                    <select name="top2select">
                    <?php 
                            foreach ($topData as $row) {
                                foreach ($recipesData as $row2) {
                                    if ($row['top2'] === $row2['id']) {echo "<option value=" . $row['top2'] . " selected>" . $row2['recipename'] . "</option>"; }
                                }
                            }
                    ?>
                        <?php 
                            foreach ($recipesData as $row) {
                            echo "<option value=" . $row['id'] . ">" . $row['recipename'] . "</option>";
                             }
                        ?>
                    </select>
            </div>
        </div>

        <!-- TOP 3 -->
        <div class="top-option-section">
            <label for="top3" class="top-label">3. <?php 
                foreach ($topData as $row) {
                    foreach ($recipesData as $row2) {
                        if ($row['top3'] === $row2['id']) {echo $row2['recipename'] . "</label>"; }
                    }
                }
                ?>
            <div class="top-flex">
                <span class='change'>Change:</span>
                    <select name="top3select">
                    <?php 
                            foreach ($topData as $row) {
                                foreach ($recipesData as $row2) {
                                    if ($row['top3'] === $row2['id']) {echo "<option value=" . $row['top3'] . " selected>" . $row2['recipename'] . "</option>"; }
                                }
                            }
                    ?>
                        <?php 
                            foreach ($recipesData as $row) {
                            echo "<option value=" . $row['id'] . ">" . $row['recipename'] . "</option>";
                             }
                        ?>
                    </select>
            </div>
        </div>
        <!-- TOP 4 -->
        <div class="top-option-section highlighted">
            <label for="top4" class="top-label">4. <?php 
                foreach ($topData as $row) {
                    foreach ($recipesData as $row2) {
                        if ($row['top4'] === $row2['id']) {echo $row2['recipename'] . "</label>"; }
                    }
                }
                ?>
            <div class="top-flex">
                <span class='change'>Change:</span>
                    <select name="top4select">
                    <?php 
                            foreach ($topData as $row) {
                                foreach ($recipesData as $row2) {
                                    if ($row['top4'] === $row2['id']) {echo "<option value=" . $row['top4'] . " selected>" . $row2['recipename'] . "</option>"; }
                                }
                            }
                    ?>
                        <?php 
                            foreach ($recipesData as $row) {
                            echo "<option value=" . $row['id'] . ">" . $row['recipename'] . "</option>";
                             }
                        ?>
                    </select>
            </div>
        </div>

        <!-- TOP 5 -->
        <div class="top-option-section">
            <label for="top5" class="top-label">5. <?php 
                foreach ($topData as $row) {
                    foreach ($recipesData as $row2) {
                        if ($row['top5'] === $row2['id']) {echo $row2['recipename'] . "</label>"; }
                    }
                }
                ?>
            <div class="top-flex">
                <span class='change'>Change:</span>
                    <select name="top5select">
                    <?php 
                            foreach ($topData as $row) {
                                foreach ($recipesData as $row2) {
                                    if ($row['top5'] === $row2['id']) {echo "<option value=" . $row['top5'] . " selected>" . $row2['recipename'] . "</option>"; }
                                }
                            }
                    ?>
                        <?php 
                            foreach ($recipesData as $row) {
                            echo "<option value=" . $row['id'] . ">" . $row['recipename'] . "</option>";
                             }
                        ?>
                    </select>
            </div>
        </div>

        <!-- TOP 6 -->
        <div class="top-option-section highlighted">
            <label for="top6" class="top-label">6. <?php 
                foreach ($topData as $row) {
                    foreach ($recipesData as $row2) {
                        if ($row['top6'] === $row2['id']) {echo $row2['recipename'] . "</label>"; }
                    }
                }
                ?>
            <div class="top-flex">
                <span class='change'>Change:</span>
                    <select name="top6select">
                    <?php 
                            foreach ($topData as $row) {
                                foreach ($recipesData as $row2) {
                                    if ($row['top6'] === $row2['id']) {echo "<option value=" . $row['top6'] . " selected>" . $row2['recipename'] . "</option>"; }
                                }
                            }
                    ?>
                        <?php 
                            foreach ($recipesData as $row) {
                            echo "<option value=" . $row['id'] . ">" . $row['recipename'] . "</option>";
                             }
                        ?>
                    </select>
            </div>
        </div>
        <br><br>
        
        <input type="submit" name="submit" class="top6-submit">
        
    </form>

</div>

