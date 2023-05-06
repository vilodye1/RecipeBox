const search = document.querySelector('#search');
const recipeList = document.querySelector('.recipe-list-container');

// filter search matches
const filterRecipes = (term) => {

const recipeArray = Array.from(recipeList.children);

    recipeArray.filter((recipe) => !recipe.textContent.toLowerCase().includes(term))
               .forEach((recipe) => recipe.classList.add('filtered'));

    recipeArray.filter((recipe) => recipe.textContent.toLowerCase().includes(term))
               .forEach((recipe) => recipe.classList.remove('filtered'));

    };

// initiate autocomplete search
search.addEventListener('keyup', () => {
    const term = search.value.trim().toLowerCase();
    filterRecipes(term);
});
