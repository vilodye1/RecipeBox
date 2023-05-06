const toggleSwitch = document.querySelector('input[type="checkbox"]');
const toggleIcon = document.querySelector('.light-dark-switch');

const switchTheme = (e) => {
    e.preventDefault();
    localStorage.setItem('theme', 'light');

    if(e.target.checked) {
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark');
        toggleIcon.setAttribute('src', 'uploads/moon-icon.png');
    }  else {
        document.documentElement.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light');
        toggleIcon.setAttribute('src', 'uploads/sun-icon.png');
    }
}


toggleSwitch.addEventListener("change", switchTheme);

// Check Local Storage For Theme
const currentTheme = localStorage.getItem('theme');
if (currentTheme) {
  document.documentElement.setAttribute('data-theme', currentTheme);

  if (currentTheme === 'dark') {
    toggleSwitch.checked = true;
    toggleIcon.setAttribute('src', 'uploads/moon-icon.png');
  }
}