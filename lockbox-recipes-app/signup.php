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
    <div class="login-container">
        <div class="title">
            <h1>RecipeBox</h1>
        </div>
        <form action="includes/signup.inc.php" method="post">
            <div class="input-container">
                <input type="text" name="uid" placeholder="username">
            </div>
            <div class="input-container">
                <input type="password" name="pwd" placeholder="password">
            </div>
            <div class="input-container">
                <input type="password" name="pwdrepeat" placeholder="repeat password">
            </div>
            <div class="input-container">
                <input type="email" name="email" placeholder="email address">
            </div>
            <button class="login-button" type="submit" name="submit">SIGNUP</button>
        </form>
        <?php 
            if(isset($_GET['signupsuccessful'])) {
                echo "<p class='success'>Signup Successful!</p>";
            }
        ?>
        <a class="signup-link" href="login.php">got a username? click to login</a>
    </div>
</body>