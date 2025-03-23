"use strict";

// Navbar variables
const nav = document.querySelector(".mobile-nav");
const navMenuBtn = document.querySelector(".nav-menu-btn");
const navCloseBtn = document.querySelector(".nav-close-btn");

// navToggle function
const navToggleFunc = function () {
    nav.classList.toggle("active");
};

navMenuBtn.addEventListener("click", navToggleFunc);
navCloseBtn.addEventListener("click", navToggleFunc);

// Theme toggle variables
const themeBtn = document.querySelectorAll(".theme-btn");

// Load saved theme from localStorage
const savedTheme = localStorage.getItem("theme");
if (savedTheme) {
    document.body.classList.remove("light-theme", "dark-theme");
    document.body.classList.add(savedTheme);
    themeBtn.forEach((btn) => {
        btn.classList.remove("light", "dark");
        btn.classList.add(savedTheme === "light-theme" ? "light" : "dark");
    });
}

// Theme toggle functionality
for (let i = 0; i < themeBtn.length; i++) {
    themeBtn[i].addEventListener("click", function () {
        document.body.classList.toggle("light-theme");
        document.body.classList.toggle("dark-theme");

        for (let j = 0; j < themeBtn.length; j++) {
            themeBtn[j].classList.toggle("light");
            themeBtn[j].classList.toggle("dark");
        }

        // Save theme preference
        const currentTheme = document.body.classList.contains("dark-theme")
            ? "dark-theme"
            : "light-theme";
        localStorage.setItem("theme", currentTheme);
    });
}

// Close sidebar when clicking outside on mobile
document.addEventListener("click", (e) => {
    if (
        window.innerWidth <= 768 &&
        !nav.contains(e.target) &&
        !navMenuBtn.contains(e.target) &&
        nav.classList.contains("active")
    ) {
        nav.classList.remove("active");
    }
});
