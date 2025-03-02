document.addEventListener("DOMContentLoaded", function () {
    // Toggle profile dropdown
    const userProfile = document.getElementById("user-profile");
    const profileDropdown = document.getElementById("profile-dropdown");

    userProfile.addEventListener("click", () => {
        profileDropdown.classList.toggle("active");
    });

    // Close dropdown when clicking outside
    document.addEventListener("click", (event) => {
        if (!userProfile.contains(event.target)) {
            profileDropdown.classList.remove("active");
        }
    });
});
