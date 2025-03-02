document.addEventListener("DOMContentLoaded", function () {
    // Toggle sidebar on mobile
    const menuToggle = document.getElementById("menu-toggle");
    const sidebar = document.getElementById("sidebar");
    const sidebarOverlay = document.getElementById("sidebar-overlay");

    menuToggle.addEventListener("click", () => {
        sidebar.classList.toggle("active");
        sidebarOverlay.classList.toggle("active");
    });

    sidebarOverlay.addEventListener("click", () => {
        sidebar.classList.remove("active");
        sidebarOverlay.classList.remove("active");
    });
});
