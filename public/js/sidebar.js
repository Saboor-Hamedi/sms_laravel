// document.getElementById("sidebarToggle").addEventListener("click", function () {
//     const sidebar = document.getElementById("sidebar");
//     sidebar.classList.toggle("-translate-x-full");
// });
document.addEventListener("DOMContentLoaded", function () {
    const sidebarToggle = document.getElementById("sidebarToggle");
    const sidebar = document.getElementById("sidebar");

    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener("click", function () {
            sidebar.classList.toggle("-translate-x-full");
        });
    }
});
