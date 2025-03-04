function initializeSidebar() {
    const $menuToggle = $("#menu-toggle");
    const $sidebar = $("#sidebar");
    const $sidebarOverlay = $("#sidebar-overlay");

    if (!$menuToggle.length || !$sidebar.length || !$sidebarOverlay.length) {
        return;
    }

    $menuToggle.on("click", function () {
        $sidebar.toggleClass("active");
        $sidebarOverlay.toggleClass("active");
    });

    $sidebarOverlay.on("click", function () {
        $sidebar.removeClass("active");
        $sidebarOverlay.removeClass("active");
    });
}

$(document).ready(function () {
    initializeSidebar();
});
