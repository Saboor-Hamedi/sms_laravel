<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enterprise Admin Dashboard</title>
    @vite(['resources/css/app.css'])
    <style>
        :root {
            --primary: #1a237e;
            --primary-light: #534bae;
            --primary-dark: #000051;
            --secondary: #0277bd;
            --secondary-light: #58a5f0;
            --secondary-dark: #004c8c;
            --text-light: #ffffff;
            --text-dark: #263238;
            --background: #f5f5f5;
            --card-bg: #ffffff;
            --success: #2e7d32;
            --warning: #f57f17;
            --danger: #c62828;
            --gray-light: #eceff1;
            --gray-medium: #b0bec5;
            --gray-dark: #455a64;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
            --shadow-lg: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
            --radius: 4px;
            --header-height: 60px;
            --sidebar-width: 240px;
            --footer-height: 40px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--background);
            color: var(--text-dark);
            line-height: 1.6;
            height: 100vh;
            overflow: hidden;
        }

        /* Layout structure */
        .dashboard {
            display: grid;
            grid-template-areas:
                "header header"
                "sidebar main-content"
                "footer footer";
            grid-template-columns: var(--sidebar-width) 1fr;
            grid-template-rows: var(--header-height) 1fr var(--footer-height);
            height: 100vh;
        }

        /* Header styling */
        .header {
            grid-area: header;
            background-color: var(--primary);
            color: var(--text-light);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            box-shadow: var(--shadow-sm);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: var(--header-height);
            z-index: 1000;
        }

        .logo {
            display: flex;
            align-items: center;
            font-weight: 700;
            font-size: 20px;
        }

        .logo-icon {
            margin-right: 8px;
            font-size: 24px;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.15);
            border-radius: var(--radius);
            padding: 6px 12px;
            width: 300px;
        }

        .search-bar input {
            background: transparent;
            border: none;
            color: var(--text-light);
            flex: 1;
            outline: none;
            padding: 5px;
        }

        .search-bar input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .search-icon {
            margin-right: 8px;
            color: rgba(255, 255, 255, 0.7);
        }

        .notification-icon {
            position: relative;
            cursor: pointer;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: var(--danger);
            color: white;
            border-radius: 50%;
            width: 16px;
            height: 16px;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-profile {
            display: flex;
            align-items: center;
            cursor: pointer;
            position: relative;
        }

        .avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: var(--primary-light);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 10px;
        }

        .profile-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 8px;
            background-color: var(--card-bg);
            border-radius: var(--radius);
            box-shadow: var(--shadow-md);
            width: 200px;
            display: none;
            z-index: 1001;
        }

        .profile-dropdown.active {
            display: block;
        }

        .dropdown-item {
            padding: 12px 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--text-dark);
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .dropdown-item:hover {
            background-color: var(--gray-light);
        }

        .dropdown-item i {
            font-size: 16px;
            opacity: 0.7;
        }

        .dropdown-divider {
            height: 1px;
            background-color: var(--gray-light);
            margin: 5px 0;
        }

        /* Sidebar styling */
        .sidebar {
            grid-area: sidebar;
            background-color: var(--card-bg);
            position: fixed;
            left: 0;
            top: var(--header-height);
            bottom: var(--footer-height);
            width: var(--sidebar-width);
            overflow-y: auto;
            box-shadow: var(--shadow-sm);
            z-index: 900;
        }

        .sidebar-menu {
            padding: 15px 0;
        }

        .menu-section {
            margin-bottom: 15px;
        }

        .menu-title {
            padding: 8px 20px;
            text-transform: uppercase;
            color: var(--gray-dark);
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            color: var(--text-dark);
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .menu-item:hover {
            background-color: var(--gray-light);
        }

        .menu-item.active {
            background-color: rgba(26, 35, 126, 0.1);
            color: var(--primary);
            font-weight: 500;
            border-left: 3px solid var(--primary);
        }

        .menu-item i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
            opacity: 0.7;
        }

        .menu-badge {
            margin-left: auto;
            background-color: var(--secondary);
            color: white;
            font-size: 11px;
            padding: 2px 6px;
            border-radius: 10px;
        }

        /* Main content area */
        .main-content {
            grid-area: main-content;
            padding: 20px;
            overflow-y: auto;
            margin-top: var(--header-height);
            margin-bottom: var(--footer-height);
            margin-left: var(--sidebar-width);
        }

        .page-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .title {
            font-size: 24px;
            font-weight: 500;
            color: var(--text-dark);
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 8px 16px;
            border-radius: var(--radius);
            font-weight: 500;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: background-color 0.2s;
            border: none;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--gray-medium);
            color: var(--text-dark);
        }

        .btn-outline:hover {
            background-color: var(--gray-light);
        }

        /* Dashboard cards */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background-color: var(--card-bg);
            border-radius: var(--radius);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
        }

        .stat-card {
            padding: 20px;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .card-title {
            font-size: 16px;
            font-weight: 500;
            color: var(--gray-dark);
        }

        .card-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: var(--radius);
            background-color: rgba(26, 35, 126, 0.1);
            color: var(--primary);
        }

        .card-icon.success {
            background-color: rgba(46, 125, 50, 0.1);
            color: var(--success);
        }

        .card-icon.warning {
            background-color: rgba(245, 127, 23, 0.1);
            color: var(--warning);
        }

        .card-icon.danger {
            background-color: rgba(198, 40, 40, 0.1);
            color: var(--danger);
        }

        .stat-value {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 14px;
            color: var(--gray-dark);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .trend-up {
            color: var(--success);
        }

        .trend-down {
            color: var(--danger);
        }

        /* Chart and table cards */
        .chart-card,
        .table-card {
            background-color: var(--card-bg);
            border-radius: var(--radius);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            margin-bottom: 20px;
        }

        .card-body {
            padding: 20px;
        }

        .chart-container {
            height: 300px;
            position: relative;
        }

        /* Table styling */
        .table-responsive {
            overflow-x: auto;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th {
            background-color: var(--gray-light);
            text-align: left;
            padding: 12px 16px;
            font-weight: 500;
            color: var(--gray-dark);
            border-bottom: 1px solid var(--gray-medium);
        }

        .data-table td {
            padding: 12px 16px;
            border-bottom: 1px solid var(--gray-light);
        }

        .data-table tr:hover {
            background-color: rgba(236, 239, 241, 0.5);
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            border-bottom: 1px solid var(--gray-light);
        }

        .table-actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .table-search {
            display: flex;
            align-items: center;
            background: var(--gray-light);
            border-radius: var(--radius);
            padding: 6px 12px;
        }

        .table-search input {
            background: transparent;
            border: none;
            outline: none;
            padding: 5px;
            width: 200px;
        }

        .status-pill {
            padding: 4px 8px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 500;
            display: inline-block;
        }

        .status-active {
            background-color: rgba(46, 125, 50, 0.1);
            color: var(--success);
        }

        .status-pending {
            background-color: rgba(245, 127, 23, 0.1);
            color: var(--warning);
        }

        .status-inactive {
            background-color: rgba(198, 40, 40, 0.1);
            color: var(--danger);
        }

        .row-actions {
            display: flex;
            gap: 10px;
        }

        .action-icon {
            cursor: pointer;
            opacity: 0.7;
            transition: opacity 0.2s;
        }

        .action-icon:hover {
            opacity: 1;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: flex-end;
            padding: 15px 20px;
            align-items: center;
            border-top: 1px solid var(--gray-light);
        }

        .page-info {
            color: var(--gray-dark);
            margin-right: 20px;
        }

        .page-controls {
            display: flex;
            gap: 5px;
        }

        .page-btn {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: var(--radius);
            background-color: transparent;
            border: 1px solid var(--gray-medium);
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .page-btn:hover {
            background-color: var(--gray-light);
        }

        .page-btn.active {
            background-color: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        /* Footer */
        .footer {
            grid-area: footer;
            background-color: var(--primary-dark);
            color: var(--text-light);
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: var(--footer-height);
            z-index: 900;
        }

        .footer-links a {
            color: var(--text-light);
            margin-left: 15px;
            text-decoration: none;
            opacity: 0.8;
            transition: opacity 0.2s;
        }

        .footer-links a:hover {
            opacity: 1;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .search-bar {
                width: 200px;
            }

            .card-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 768px) {
            .dashboard {
                grid-template-areas:
                    "header"
                    "main-content"
                    "footer";
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: fixed;
                left: -100%;
                transition: left 0.3s ease;
            }

            .sidebar.active {
                left: 0;
            }

            .main-content {
                margin-left: 0;
            }

            .menu-toggle {
                display: block !important;
            }

            .card-grid {
                grid-template-columns: 1fr;
            }

            .search-bar {
                display: none;
            }
        }

        /* Mobile menu toggle */
        .menu-toggle {
            display: none;
            cursor: pointer;
            margin-right: 15px;
        }

        /* Overlay for mobile sidebar */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 899;
            display: none;
        }

        .sidebar-overlay.active {
            display: block;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="dashboard">
        <!-- Header -->
        <header class="header">
            <div class="left-section">
                <div class="menu-toggle" id="menu-toggle">
                    <i class="fas fa-bars"></i>
                </div>
                <div class="logo">
                    <i class="fas fa-cube logo-icon"></i>
                    <span>Enterprise Admin</span>
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
                            <span>Logout</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Sidebar overlay for mobile -->
        <div class="sidebar-overlay" id="sidebar-overlay"></div>

        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-menu">
                <div class="menu-section">
                    <div class="menu-title">Main</div>
                    <div class="menu-item active">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </div>
                    <div class="menu-item">
                        <i class="fas fa-chart-line"></i>
                        <span>Analytics</span>
                    </div>
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

        <!-- Main content -->
        <main class="main-content">
            <div class="page-title">
                <h1 class="title">Dashboard Overview</h1>
                <div class="actions">
                    <button class="btn btn-outline">
                        <i class="fas fa-download"></i>
                        <span>Export</span>
                    </button>
                    <button class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        <span>Create Report</span>
                    </button>
                </div>
            </div>

            <!-- Stat Cards -->
            <div class="card-grid">
                <div class="card stat-card">
                    <div class="card-header">
                        <div class="card-title">Total Revenue</div>
                        <div class="card-icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>
                    <div class="stat-value">$847,382</div>
                    <div class="stat-label">
                        <i class="fas fa-arrow-up trend-up"></i>
                        <span class="trend-up">12.5%</span>
                        <span>vs last month</span>
                    </div>
                </div>

                <div class="card stat-card">
                    <div class="card-header">
                        <div class="card-title">New Customers</div>
                        <div class="card-icon success">
                            <i class="fas fa-user-plus"></i>
                        </div>
                    </div>
                    <div class="stat-value">1,248</div>
                    <div class="stat-label">
                        <i class="fas fa-arrow-up trend-up"></i>
                        <span class="trend-up">8.2%</span>
                        <span>vs last month</span>
                    </div>
                </div>

                <div class="card stat-card">
                    <div class="card-header">
                        <div class="card-title">Conversion Rate</div>
                        <div class="card-icon warning">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>
                    <div class="stat-value">4.8%</div>
                    <div class="stat-label">
                        <i class="fas fa-arrow-down trend-down"></i>
                        <span class="trend-down">1.2%</span>
                        <span>vs last month</span>
                    </div>
                </div>

                <div class="card stat-card">
                    <div class="card-header">
                        <div class="card-title">Active Tasks</div>
                        <div class="card-icon danger">
                            <i class="fas fa-tasks"></i>
                        </div>
                    </div>
                    <div class="stat-value">78</div>
                    <div class="stat-label">
                        <i class="fas fa-arrow-up trend-up"></i>
                        <span class="trend-up">5.3%</span>
                        <span>vs last week</span>
                    </div>
                </div>
            </div>

            <!-- Chart Card -->
            <div class="chart-card">
                <div class="card-body">
                    <div class="card-header">
                        <div class="card-title">Revenue Trends</div>
                        <div class="dropdown">
                            <select id="chart-timeframe" class="form-select">
                                <option value="weekly">Weekly</option>
                                <option value="monthly" selected>Monthly</option>
                                <option value="quarterly">Quarterly</option>
                                <option value="yearly">Yearly</option>
                            </select>
                        </div>
                    </div>
                    <div class="chart-container" id="revenue-chart">
                        <!-- Chart will be rendered here by JavaScript -->
                    </div>
                </div>
            </div>

            <!-- Table Card -->
            <div class="table-card">
                <div class="table-header">
                    <div class="card-title">Recent Orders</div>
                    <div class="table-actions">
                        <div class="table-search">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" placeholder="Search orders...">
                        </div>
                        <select class="form-select">
                            <option value="all">All</option>
                            <option value="active">Active</option>
                            <option value="pending">Pending</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#ORD-2587</td>
                                <td>Alice Johnson</td>
                                <td>Feb 24, 2025</td>
                                <td>$1,254.00</td>
                                <td><span class="status-pill status-active">Completed</span></td>
                                <td>
                                    <div class="row-actions">
                                        <i class="fas fa-eye action-icon"></i>
                                        <i class="fas fa-edit action-icon"></i>
                                        <i class="fas fa-trash action-icon"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>#ORD-2586</td>
                                <td>Robert Smith</td>
                                <td>Feb 23, 2025</td>
                                <td>$876.50</td>
                                <td><span class="status-pill status-active">Completed</span></td>
                                <td>
                                    <div class="row-actions">
                                        <i class="fas fa-eye action-icon"></i>
                                        <i class="fas fa-edit action-icon"></i>
                                        <i class="fas fa-trash action-icon"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>#ORD-2585</td>
                                <td>Michael Brown</td>
                                <td>Feb 23, 2025</td>
                                <td>$432.25</td>
                                <td><span class="status-pill status-pending">Processing</span></td>
                                <td>
                                    <div class="row-actions">
                                        <i class="fas fa-eye action-icon"></i>
                                        <i class="fas fa-edit action-icon"></i>
                                        <i class="fas fa-trash action-icon"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>#ORD-2584</td>
                                <td>Emily Davis</td>
                                <td>Feb 22, 2025</td>
                                <td>$1,089.75</td>
                                <td><span class="status-pill status-active">Completed</span></td>
                                <td>
                                    <div class="row-actions">
                                        <i class="fas fa-eye action-icon"></i>
                                        <i class="fas fa-edit action-icon"></i>
                                        <i class="fas fa-trash action-icon"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>#ORD-2583</td>
                                <td>David Wilson</td>
                                <td>Feb 21, 2025</td>
                                <td>$567.30</td>
                                <td><span class="status-pill status-inactive">Cancelled</span></td>
                                <td>
                                    <div class="row-actions">
                                        <i class="fas fa-eye action-icon"></i>
                                        <i class="fas fa-edit action-icon"></i>
                                        <i class="fas fa-trash action-icon"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>#ORD-2582</td>
                                <td>Sarah Martinez</td>
                                <td>Feb 20, 2025</td>
                                <td>$1,432.00</td>
                                <td><span class="status-pill status-active">Completed</span></td>
                                <td>
                                    <div class="row-actions">
                                        <i class="fas fa-eye action-icon"></i>
                                        <i class="fas fa-edit action-icon"></i>
                                        <i class="fas fa-trash action-icon"></i>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="pagination">
                    <div class="page-info">Showing 1 to 6 of 50 entries</div>
                    <div class="page-controls">
                        <button class="page-btn"><i class="fas fa-chevron-left"></i></button>
                        <button class="page-btn active">1</button>
                        <button class="page-btn">2</button>
                        <button class="page-btn">3</button>
                        <button class="page-btn">4</button>
                        <button class="page-btn">5</button>
                        <button class="page-btn"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="footer">
            <div class="copyright">&copy; 2025 Enterprise Admin. All rights reserved.</div>
            <div class="footer-links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Contact Us</a>
            </div>
        </footer>
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
