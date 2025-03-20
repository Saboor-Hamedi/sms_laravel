const themeToggleLabel = document.querySelector('#theme-toggle-label');
const themeToggle = document.querySelector('#theme-toggle');
const body = document.querySelector('body');

// Retrieve the current theme from localStorage
let currentTheme = localStorage.getItem('theme');

// Apply the saved theme on page load
if (currentTheme === 'dark') {
    document.body.classList.add('dark');
    themeToggle.checked = true;
} else {
    document.body.classList.remove('dark');
    themeToggle.checked = false;
}

// Toggle theme and save to localStorage
themeToggleLabel.addEventListener("click", () => {
    currentTheme = localStorage.getItem('theme'); // Retrieve the latest theme
    if (currentTheme === 'dark') {
        localStorage.setItem('theme', 'light');
        document.body.classList.remove('dark');
    } else {
        localStorage.setItem('theme', 'dark');
        document.body.classList.add('dark');
    }
});