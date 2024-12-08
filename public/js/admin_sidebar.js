function toggleSidebar() {
    const sidebar = document.getElementById("dashboard__sidebar");
    const navbar = document.getElementById("dashboard__navbar");
    const content = document.getElementById("dashboard__content");
    const isOpen = sidebar.classList.toggle("dashboard__open");
    if (isOpen) {
        navbar.classList.add("shifted");
    } else {
        navbar.classList.remove("shifted");
        content.classList.remove("shifted");
    }
}
document.addEventListener("DOMContentLoaded", toggleSidebar);
document.addEventListener("livewire:navigated", toggleSidebar);
