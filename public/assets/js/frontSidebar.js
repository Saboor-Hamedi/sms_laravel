        const menuToggle = document.querySelector('.menu-toggle');
        const sidebarWrapper = document.querySelector('.sidebar-wrapper');

        // Mobile menu toggle
        menuToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            const isExpanded = sidebarWrapper.classList.toggle('active');
            menuToggle.setAttribute('aria-expanded', isExpanded);
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', (e) => {
            if (window.innerWidth <= 768 &&
                !sidebarWrapper.contains(e.target) &&
                !menuToggle.contains(e.target) &&
                sidebarWrapper.classList.contains('active')) {
                sidebarWrapper.classList.remove('active');
                menuToggle.setAttribute('aria-expanded', 'false');
            }
        });

        // Show more functionality
        document.querySelectorAll('.show-more').forEach(button => {
            button.addEventListener('click', (e) => {
                const card = e.target.closest('.blog-card');
                const paragraph = card.querySelector('p');
                paragraph.classList.toggle('expanded');
                e.target.textContent = paragraph.classList.contains('expanded') ?
                    'Show Less ←' : 'Read More →';
            });
        });

        // Ensure sidebar is closed by default on small screens
        window.addEventListener('load', () => {
            if (window.innerWidth <= 768) {
                sidebarWrapper.classList.remove('active');
                menuToggle.setAttribute('aria-expanded', 'false');
            }
        });

        // Handle resize to close sidebar on small screens
        window.addEventListener('resize', () => {
            if (window.innerWidth <= 768 && sidebarWrapper.classList.contains('active')) {
                sidebarWrapper.classList.remove('active');
                menuToggle.setAttribute('aria-expanded', 'false');
            }
        });
 