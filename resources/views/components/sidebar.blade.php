<!-- Sidebar overlay for mobile -->

<div class="sidebar-overlay" id="sidebar-overlay"></div>
<aside class="sidebar" id="sidebar">
    <div class="sidebar-menu">
        <div class="menu-section">
            <div class="menu-title">Main</div>
            {{-- dashboard --}}
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </x-nav-link>

            {{-- profile --}}

            <x-nav-link :href="route('profile')" :active="request()->routeIs('profile')">
                <i class="fas fa-user"></i>
                <span>Profil</span>
            </x-nav-link>
            {{-- Post --}}
            <x-nav-link :href="route('post.index')" :active="request()->routeIs('post.index')">
                <i class="fas fa-user"></i>
                {{ __('Posts') }}
            </x-nav-link>
            <div class="menu-item">
                <i class="fas fa-file-alt"></i>
                <span>Reports</span>
                <span class="menu-badge">New</span>
            </div>
        </div>

        <div class="menu-section">
            <div class="menu-title">Management</div>
            <div class="menu-item">
                <i class="fas fa-users"></i>
                <span>Users</span>
            </div>
            <div class="menu-item">
                <i class="fas fa-box"></i>
                <span>Products</span>
            </div>
            <div class="menu-item">
                <i class="fas fa-shopping-cart"></i>
                <span>Orders</span>
                <span class="menu-badge">8</span>
            </div>
            <div class="menu-item">
                <i class="fas fa-tag"></i>
                <span>Promotions</span>
            </div>
        </div>

        <div class="menu-section">
            <div class="menu-title">System</div>
            <div class="menu-item">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </div>
            <div class="menu-item">
                <i class="fas fa-bell"></i>
                <span>Notifications</span>
            </div>
            <div class="menu-item">
                <i class="fas fa-shield-alt"></i>
                <span>Security</span>
            </div>
            <div class="menu-item">
                <i class="fas fa-database"></i>
                <span>Backups</span>
            </div>
        </div>
    </div>
</aside>
