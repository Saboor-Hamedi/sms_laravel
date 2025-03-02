document.addEventListener("DOMContentLoaded", function () {
    const darkModeToggle = document.getElementById("dark-mode-toggle");
    const body = document.body;

    // Check for saved theme in localStorage
    const savedTheme = localStorage.getItem("theme");

    if (savedTheme === "dark") {
        body.setAttribute("data-theme", "dark");
        darkModeToggle.innerHTML = '<i class="fas fa-sun"></i>'; // Sun icon for light mode
    } else {
        body.removeAttribute("data-theme");
        darkModeToggle.innerHTML = '<i class="fas fa-moon"></i>'; // Moon icon for dark mode
    }

    // Toggle dark mode
    darkModeToggle.addEventListener("click", () => {
        if (body.getAttribute("data-theme") === "dark") {
            body.removeAttribute("data-theme");
            localStorage.setItem("theme", "light");
            darkModeToggle.innerHTML = '<i class="fas fa-moon"></i>'; // Moon icon for dark mode
        } else {
            body.setAttribute("data-theme", "dark");
            localStorage.setItem("theme", "dark");
            darkModeToggle.innerHTML = '<i class="fas fa-sun"></i>'; // Sun icon for light mode
        }
    });
});
