function menuToggle() {
    var dropdownMenu = document.getElementById("dropdown__menu");
    if (dropdownMenu.classList.contains("hidden")) {
        dropdownMenu.classList.remove("hidden");
    } else {
        dropdownMenu.classList.add("hidden");
    }
}
document.addEventListener("DOMContentLoaded", menuToggle);
document.addEventListener("livewire:navigated", menuToggle);
