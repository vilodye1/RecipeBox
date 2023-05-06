<?php
    require_once 'includes/dbh.inc.php';
    require_once 'includes/editIngredients.inc.php';

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
<h1 class="edit-header">Update Ingredients</h1>
<div>

<div class="form-flex">
        <form class="form" action="editdirections.php?id=<?php echo $row['id'];?>" method="post">

        <input type="hidden" name="ingredient-list" class="list">
        <input type="text" name="ingredient" class="ingredient">
        <button class="add-ing-btn">SUBMIT</button>
        <!-- Add ingredient error -->
        
        <ul id="ingredients-list">
            <!-- Ingredients List dynamically placed here -->
        </ul>

        <input type="submit" name="next2" class="next-action-btn" value="next">
        </form>
    </div>
        <script type="text/javascript" charset="utf-8" src="header.js"></script>
        <!-- Ingredients list -->
        <script type="text/javascript">

            const newIngredient = document.querySelector('.ingredient');
            const submitNewIngredient = document.querySelector('.add-ing-btn');
            const ingredientList = document.querySelector('#ingredients-list');
            const storeList = document.querySelector('.list');
            const deleteBtn = document.querySelector('.delete-ing');

            // Converts PHP ingredients array to use in Javascript
            // Since this is altered to be a JS array, this method is used to update in DB without any issues if no ingredients are changed
            let ingredientArray = <?php echo json_encode($recipeIng) ?>;
            storeList.value = ingredientArray;
            let postValue = storeList.value.split(",");
            storeList.value = JSON.stringify(postValue);


            // Displays current ingredients array in DOM
             let newArray = postValue.map(ing => `<li class="ing-item">${ing}<span onClick="remove(this)" class="delete-ing"> X</span></li>`).join('');
             ingredientList.innerHTML = newArray;
            
            // Function that adds new ingredients to ingredients List
            const addIngredients = (e) => {
                e.preventDefault();
                const storedIngredient = newIngredient.value.trim();

                // if there is a comma separated ingredient, replace ',' with ()
                if (storedIngredient.includes(",")) {
                  let removedStr = storedIngredient.split(",");
                  let removedStrSpace = removedStr[1].replace(/\s/, '');
                  let newLine = `${removedStr[0]} (${removedStrSpace})`;
                  postValue.push(newLine);

                } else {
                  postValue.push(storedIngredient);
                }

                  newArray = postValue.map(ing => `<li class="ing-item">${ing}<span onClick="remove(this)" class="delete-ing"> X</span></li>`).join('');
                  ingredientList.innerHTML = newArray;
                  storeList.value = JSON.stringify(postValue);
                  newIngredient.value = '';
                  newIngredient.focus();
            }

            // function to remove ingredient from list and update list value
            // function is used in innerHTML as event listener could not detect span tag in any scenario
            const remove = (btn) => {
                let element = btn;
                element.parentElement.remove();
                newArray = ingredientList.innerText;
                let result = newArray.replace(/\sX/g, ',');
                result = result.replace(/,\s*$/, '');
                result = result.replace(/\n/g, '');
                result = result.split(',');
                postValue = result;
                storeList.value = JSON.stringify(postValue);
                console.log(postValue);
            }

            // Event Listeners
            submitNewIngredient.addEventListener('click', addIngredients);

          </script>

</body>