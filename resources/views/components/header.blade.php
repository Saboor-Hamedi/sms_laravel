  <header class="header">
      <div class="left-section">
          <div class="menu-toggle" id="menu-toggle">
              <i class="fas fa-bars"></i>
          </div>
          <div class="logo">
              <a href="{{ route('welcome') }}"><i class="fa-solid fa-arrow-left"></i></a>
          </div>
      </div>

      <div class="header-actions">
          <div class="search-bar">
              <i class="fas fa-search search-icon"></i>
              <input type="text" placeholder="Search...">
          </div>

          <div class="notification-icon">
              <i class="fas fa-bell"></i>
              <span class="notification-badge">5</span>
          </div>

          <div class="user-profile" id="user-profile">
              <div class="avatar">JD</div>
              <span>John Doe</span>
              <i class="fas fa-chevron-down" style="margin-left: 8px; font-size: 12px;"></i>

              <div class="profile-dropdown" id="profile-dropdown">
                  <div class="dropdown-item">
                      <i class="fas fa-user"></i>
                      <span>My Profile</span>
                  </div>
                  <div class="dropdown-item">
                      <i class="fas fa-cog"></i>
                      <span>Settings</span>
                  </div>
                  <div class="dropdown-divider"></div>
                  <div class="dropdown-item">
                      <i class="fas fa-question-circle"></i>
                      <span>Help Center</span>
                  </div>
                  <div class="dropdown-divider"></div>
                  <div class="dropdown-item">
                      <i class="fas fa-sign-out-alt"></i>
                      {{-- @livewire('logout') --}}

                      @auth
                          <form method="POST" action="{{ route('logout') }}" class="inline">
                              @csrf
                              <button type="submit" class="front-nav-link logout-btn">Logout</button>
                          </form>
                      @endauth
                  </div>
              </div>
          </div>
          <!-- Dark Mode Toggle Button -->
          <button id="dark-mode-toggle" class="btn btn-outline">
              <i class="fas fa-moon"></i> <!-- Moon icon for dark mode -->
          </button>
      </div>
  </header>
