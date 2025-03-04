function initializeDarkTheme() {
    const $darkModeToggle = $("#dark-mode-toggle"); // Select toggle button
    const $body = $("body"); // Select body element
    // Check saved theme
    const savedTheme = localStorage.getItem("theme");
    if (savedTheme === "dark") {
        $body.attr("data-theme", "dark");
        $darkModeToggle.html('<i class="fas fa-sun"></i>');
    } else {
        $body.removeAttr("data-theme");
        $darkModeToggle.html('<i class="fas fa-moon"></i>');
    }

    // Toggle theme on click
    $darkModeToggle.on("click", function () {
        if ($body.attr("data-theme") === "dark") {
            $body.removeAttr("data-theme");
            localStorage.setItem("theme", "light");
            $darkModeToggle.html('<i class="fas fa-moon"></i>');
        } else {
            $body.attr("data-theme", "dark");
            localStorage.setItem("theme", "dark");
            $darkModeToggle.html('<i class="fas fa-sun"></i>');
        }
    });
}
$(document).ready(function () {
    initializeDarkTheme();
});
