<main class="main-content">
    <header class="header-section">
        <div>
            <h1 class="page-title">Dashboard</h1>
            <p class="page-subtitle">View all status from the dashboard</p>
        </div>

        <div class="user-profile">
            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/8bb0745711ce6133076d46e9679fb39046eda8008659709e00d84e588f01f7b1?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                alt="User Profile" class="profile-image">
            <div class="profile-info">
                <span class="profile-name">Nguyen Phuong</span>
                <span class="profile-email">dsun.agency@gmail.com</span>
            </div>
            <button aria-label="User menu" class="profile-menu">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d06db6e006919a5ea636ac00218298dc8ea375846d2fc7f39ffddf2b532ee929?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                    alt="">
            </button>
        </div>
    </header>

    <section class="stats-grid" aria-label="Dashboard Statistics">
        <article class="stat-card">
            <p class="stat-value">653</p>
            <p class="stat-label">Total Leads</p>
        </article>

        <article class="stat-card">
            <p class="stat-value">201</p>
            <p class="stat-label">Number of bookings</p>
        </article>

        <article class="stat-card">
            <p class="stat-value">34</p>
            <p class="stat-label">Number of clients</p>
        </article>

        <article class="stat-card">
            <p class="stat-value">3,024</p>
            <p class="stat-label">Number of photos taken</p>
        </article>

        <article class="stat-card">
            <p class="stat-value">5.000đ</p>
            <p class="stat-label">Current month's revenue</p>
        </article>
    </section>
    <h2 class="text-main">Revenue</h2>
    <div class="charts-container">
        <section class="analytics-chart">
            <div class="sort-options">
                <!-- Các nút để thay đổi chế độ sắp xếp dữ liệu -->
                <span>Sort by:</span>
                <button id="sort-date">Date</button>
                <button id="sort-month" class="active">Month</button>
                <button id="sort-year">Year</button>
            </div>
            <canvas id="revenueChart"></canvas>
        </section>

        <section class="status-distribution">
            <h2>Application status</h2>
            <div class="chart">
                <canvas id="pieChart" width="220" height="220"></canvas>
            </div>
            <div class="legend">
                <div><span class="color-box yellow"></span> Victoria Phan Thiet Studio</div>
                <div><span class="color-box blue"></span> The Sailing Bay Studio</div>
                <div><span class="color-box red"></span> Le House Boutique Studio</div>
                <div><span class="color-box orange"></span> Four Seasons Studio</div>
            </div>
        </section>

    </div>

    <h2 class="text-main">Most-used services chart</h2>
    <section class="services-section">
        <div class="scroll-container">
            <div class="chart-container">
                <canvas id="barChart"></canvas>
            </div>
        </div>
    </section>
</main>
</div>
<script src="../../app/admin/view/main.js"></script>
</body>

</html>