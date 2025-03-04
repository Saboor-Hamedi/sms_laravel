function initializeProfile() {
    // 1. Remove nested DOMContentLoaded since we're already using $(document).ready()
    const $userProfile = $("#user-profile");
    const $profileDropdown = $("#profile-dropdown");

    if (!$userProfile.length || !$profileDropdown.length) {
        return;
    }

    $userProfile.on("click", function (e) {
        e.stopPropagation(); // 5. Added to prevent event bubbling
        $profileDropdown.toggleClass("active");
    });

    $(document).on("click", function (event) {
        if (
            !$userProfile.is(event.target) &&
            $userProfile.has(event.target).length === 0
        ) {
            $profileDropdown.removeClass("active");
        }
    });
}

$(document).ready(function () {
    initializeProfile();
});
