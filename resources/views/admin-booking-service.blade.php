<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Dashboard Admin - Bookings</title>
    <link rel="stylesheet" href="/css/admin-dashboard.css">
    <link rel="stylesheet" href="/css/admin-booking.css">
    <link rel="stylesheet" href="/css/sidebar.css">
</head>
<body>
    <div class="dashboard-container">
        <div class="sidebar">
            <div class="logo-section">
                <div class="logo">
                    <span>MMS - Admin Dashboard</span>
                </div>
            </div>
            
            <nav class="nav-menu">
                <a href="/admin/dashboard" class="nav-item">
                    <span>Home</span>
                </a>
                <a href="/admin/testimoni" class="nav-item">
                    <span>Testimonials</span>
                </a>
                <a href="/admin/produk" class="nav-item">
                    <span>Products</span>
                </a>
                <a href="/admin/booking" class="nav-item active">
                    <span>Booking</span>
                    <img class="chevron-right" src="/images/chevron-right.png" alt="">
                </a>
                <a href="/admin/berita" class="nav-item">
                    <span>News</span>
                </a>
            </nav>
            
            <div class="logout-section">
                <a href="/logout" class="logout-btn">
                    <span>Log Out</span>
                </a>
            </div>
        </div>

        <div class="main-content">
            <div class="header">
                <h1>Booking Service</h1>
                <div class="header-right">
                    
                <div class="user-profile">
                    <span>{{ Auth::user()->nama ?? 'Admin' }}</span>
                </div>
                </div>
            </div>
            
            <div class="content">
                <div class="booking-list">
                    <!-- Booking items will be dynamically inserted here -->
                </div>
                
                <div class="booking-actions">
                    <button id="addBookingBtn" class="btn">Add Booking</button>
                </div>
            </div>
            
            <div class="content-wrapper">
                <div class="stats-section">
                    <div class="stat-card">
                        <div class="stat-content">
                            <div class="stat-label">Total Products</div>
                            <div class="stat-value">{{ $services->count() ?? 0 }}</div>
                        </div>
                        <div class="stat-icon blue">📦</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-content">
                            <div class="stat-label">Available</div>
                            <div class="stat-value">{{ $produk->where('stok', '>', 0)->count() ?? 0 }}</div>
                        </div>
                        <div class="stat-icon green">✅</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-content">
                            <div class="stat-label">Out of Stock</div>
                            <div class="stat-value">{{ $produk->where('stok', '<=', 0)->count() ?? 0 }}</div>
                        </div>
                        <div class="stat-icon red">❌</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-content">
                            <div class="stat-label">Low Stock</div>
                            <div class="stat-value">{{ $produk->where('stok', '<=', 5)->where('stok', '>', 0)->count() ?? 1 }}</div>
                        </div>
                        <div class="stat-icon orange">⚠️</div>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>