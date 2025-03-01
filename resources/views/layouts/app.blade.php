<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enterprise Admin Dashboard</title>
    @vite(entrypoints: ['resources/css/app.css'])
    <link href="{{ URL::asset('assets/main.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="dashboard">
        <!-- Header -->

        @include('components.header')

        <!-- Sidebar -->
        @include('components.sidebar')

        <!-- Main content -->
        @include('components.main-content')

        <!-- Footer -->
        @include('components.footer')
    </div>

    <script>
        // JavaScript for interactivity
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle sidebar on mobile
            const menuToggle = document.getElementById('menu-toggle');
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebar-overlay');

            menuToggle.addEventListener('click', () => {
                sidebar.classList.toggle('active');
                sidebarOverlay.classList.toggle('active');
            });

            sidebarOverlay.addEventListener('click', () => {
                sidebar.classList.remove('active');
                sidebarOverlay.classList.remove('active');
            });

            // Toggle profile dropdown
            const userProfile = document.getElementById('user-profile');
            const profileDropdown = document.getElementById('profile-dropdown');

            userProfile.addEventListener('click', () => {
                profileDropdown.classList.toggle('active');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', (event) => {
                if (!userProfile.contains(event.target)) {
                    profileDropdown.classList.remove('active');
                }
            });
        });
    </script>
    @vite('resources/js/app.js')
</body>

</html>
