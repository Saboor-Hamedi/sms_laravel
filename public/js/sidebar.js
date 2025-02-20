document.addEventListener("DOMContentLoaded", function () {
    document.addEventListener("livewire:navigated", () => {
        const sidebarToggle = document.getElementById("sidebarToggle");
        const sidebar = document.getElementById("sidebar");
        if (sidebarToggle && sidebar) {
            sidebarToggle.addEventListener("click", function () {
                sidebar.classList.toggle("-translate-x-full");
            });
        }
    });
});
