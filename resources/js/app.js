import "./bootstrap";
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

document.addEventListener("livewire:load", function () {
    console.log("Livewire is working!");
});
document.addEventListener("livewire:navigated", () => {});
