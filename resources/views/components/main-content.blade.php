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
