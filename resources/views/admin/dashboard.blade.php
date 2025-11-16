@extends('layoutes.admin.app')

@section('content')
<style>
/* 🌸 JAPANESE THEME - GENERAL */
body {
    background: linear-gradient(135deg, #fdfbff 0%, #fff5f8 100%);
    font-family: 'Poppins', 'Noto Sans JP', sans-serif;
    color: #2d2d2d;
}

/* 🌸 DASHBOARD HEADER */
.admin-dashboard {
    padding: 0;
}
.dashboard-header {
    background: linear-gradient(135deg, #1e3a5f 0%, #2c4a6f 100%);
    color: white;
    padding: 30px 0;
    margin-bottom: 30px;
    box-shadow: 0 4px 20px rgba(30, 58, 95, 0.2);
    position: relative;
    overflow: hidden;
}
.dashboard-header::before {
    content: '🌸';
    position: absolute;
    font-size: 120px;
    opacity: 0.08;
    right: 50px;
    top: -20px;
    transform: rotate(-15deg);
}
.dashboard-header::after {
    content: '⛩️';
    position: absolute;
    font-size: 100px;
    opacity: 0.08;
    left: 50px;
    bottom: -20px;
}
.dashboard-title {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 8px;
    color: white;
}
.dashboard-subtitle {
    font-size: 15px;
    color: rgba(255, 255, 255, 0.85);
    margin: 0;
}
.dashboard-date {
    background: rgba(255, 255, 255, 0.15);
    padding: 10px 20px;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    display: inline-block;
}
.dashboard-date small {
    color: white;
    font-weight: 500;
}

/* 🌸 STAT CARDS */
.stat-card {
    background: white;
    border-radius: 16px;
    padding: 24px;
    display: flex;
    align-items: center;
    gap: 20px;
    border: 2px solid transparent;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}
.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, #ff9a9e 0%, #fad0c4 100%);
}
.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
}

/* Stat Card Variants */
.stat-card-primary::before {
    background: linear-gradient(90deg, #a88bff 0%, #8c6cff 100%);
}
.stat-card-warning::before {
    background: linear-gradient(90deg, #ffd89b 0%, #19547b 100%);
}
.stat-card-info::before {
    background: linear-gradient(90deg, #89f7fe 0%, #66a6ff 100%);
}
.stat-card-success::before {
    background: linear-gradient(90deg, #56ccf2 0%, #2f80ed 100%);
}

.stat-icon {
    width: 64px;
    height: 64px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #f6e7ff 0%, #ede4ff 100%);
    color: #8c6cff;
    flex-shrink: 0;
}
.stat-card-warning .stat-icon {
    background: linear-gradient(135deg, #fff4e0 0%, #ffe9c4 100%);
    color: #e09e3a;
}
.stat-card-info .stat-icon {
    background: linear-gradient(135deg, #e0f4ff 0%, #c4e8ff 100%);
    color: #3a9be0;
}
.stat-card-success .stat-icon {
    background: linear-gradient(135deg, #e0fff4 0%, #c4ffe8 100%);
    color: #3ae09e;
}

.stat-content {
    flex-grow: 1;
}
.stat-number {
    font-size: 32px;
    font-weight: 700;
    color: #2d2d2d;
    margin: 0;
    line-height: 1;
}
.stat-label {
    font-size: 14px;
    color: #7b6fa6;
    margin: 5px 0 0 0;
    font-weight: 500;
}

/* 🌸 SECTION HEADER */
.section-header {
    margin-bottom: 20px;
}
.section-title {
    font-size: 24px;
    font-weight: 700;
    color: #2c4a6f;
    margin-bottom: 5px;
}
.section-subtitle {
    font-size: 14px;
    color: #7b6fa6;
    margin: 0;
}

/* 🌸 ACTION CARDS */
.action-card {
    background: white;
    border-radius: 16px;
    padding: 24px;
    display: flex;
    align-items: center;
    gap: 20px;
    border: 2px solid #f0e6ff;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    text-decoration: none;
    color: inherit;
    position: relative;
    overflow: hidden;
}
.action-card::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100px;
    height: 100px;
    background: radial-gradient(circle, rgba(168, 139, 255, 0.1) 0%, transparent 70%);
    transform: translate(30%, -30%);
    transition: all 0.3s ease;
}
.action-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 30px rgba(140, 108, 255, 0.15);
    border-color: #a88bff;
}
.action-card:hover::before {
    transform: translate(30%, -30%) scale(1.5);
}

.action-icon {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.action-icon-primary {
    background: linear-gradient(135deg, #a88bff 0%, #8c6cff 100%);
    color: white;
}
.action-icon-warning {
    background: linear-gradient(135deg, #ffd89b 0%, #e0b85a 100%);
    color: white;
}
.action-icon-info {
    background: linear-gradient(135deg, #89f7fe 0%, #66a6ff 100%);
    color: white;
}

.action-content {
    flex-grow: 1;
}
.action-title {
    font-size: 18px;
    font-weight: 700;
    color: #2d2d2d;
    margin-bottom: 5px;
}
.action-desc {
    font-size: 13px;
    color: #7b6fa6;
    margin: 0;
}
.action-arrow {
    color: #8c6cff;
    flex-shrink: 0;
    transition: transform 0.3s ease;
}
.action-card:hover .action-arrow {
    transform: translateX(5px);
}

/* 🌸 CONTENT CARD */
.content-card {
    background: white;
    border-radius: 16px;
    padding: 24px;
    border: 2px solid #f0e6ff;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    height: 100%;
}
.card-header-custom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 2px solid #f6e7ff;
}
.card-title {
    font-size: 20px;
    font-weight: 700;
    color: #2c4a6f;
    margin: 0;
}
.btn-link {
    color: #8c6cff;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    transition: color 0.3s ease;
}
.btn-link:hover {
    color: #7554ff;
}

/* 🌸 ACTIVITY LIST */
.activity-list {
    display: flex;
    flex-direction: column;
    gap: 16px;
}
.activity-item {
    display: flex;
    gap: 15px;
    align-items: flex-start;
    padding: 15px;
    background: #fdfbff;
    border-radius: 12px;
    border: 1px solid #f6e7ff;
    transition: all 0.3s ease;
}
.activity-item:hover {
    background: #fff8ff;
    border-color: #e6d4ff;
}
.activity-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.activity-icon-success {
    background: linear-gradient(135deg, #e0fff4 0%, #c4ffe8 100%);
    color: #3ae09e;
}
.activity-icon-warning {
    background: linear-gradient(135deg, #fff4e0 0%, #ffe9c4 100%);
    color: #e09e3a;
}
.activity-icon-info {
    background: linear-gradient(135deg, #e0f4ff 0%, #c4e8ff 100%);
    color: #3a9be0;
}
.activity-icon-primary {
    background: linear-gradient(135deg, #f6e7ff 0%, #ede4ff 100%);
    color: #8c6cff;
}
.activity-content {
    flex-grow: 1;
}
.activity-text {
    font-size: 14px;
    color: #2d2d2d;
    margin-bottom: 5px;
}
.activity-time {
    font-size: 12px;
    color: #7b6fa6;
}

/* 🌸 POPULAR LIST */
.popular-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}
.popular-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    background: #fdfbff;
    border-radius: 12px;
    border: 1px solid #f6e7ff;
    transition: all 0.3s ease;
}
.popular-item:hover {
    background: #fff8ff;
    border-color: #e6d4ff;
    transform: translateX(5px);
}
.popular-rank {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    background: linear-gradient(135deg, #a88bff 0%, #8c6cff 100%);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 16px;
    flex-shrink: 0;
}
.popular-item:first-child .popular-rank {
    background: linear-gradient(135deg, #ffd700 0%, #ffed4e 100%);
    color: #2d2d2d;
}
.popular-content h4 {
    font-size: 15px;
    font-weight: 600;
    color: #2d2d2d;
    margin: 0 0 3px 0;
}
.popular-content p {
    font-size: 13px;
    color: #7b6fa6;
    margin: 0;
}

/* 🌸 RESPONSIVE */
@media (max-width: 768px) {
    .dashboard-header {
        padding: 20px 0;
    }
    .dashboard-title {
        font-size: 24px;
    }
    .stat-card {
        padding: 20px;
    }
    .stat-icon {
        width: 52px;
        height: 52px;
    }
    .stat-number {
        font-size: 26px;
    }
    .action-card {
        padding: 20px;
    }
    .action-icon {
        width: 50px;
        height: 50px;
    }
}

/* 🌸 JAPANESE DECORATIVE ELEMENTS */
.content-card::after {
    content: '桜';
    position: absolute;
    font-size: 80px;
    opacity: 0.03;
    right: 20px;
    bottom: 20px;
    font-weight: 700;
    pointer-events: none;
}
</style>

<div class="admin-dashboard">
    <!-- Header Section -->
    <div class="dashboard-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="dashboard-title">Dashboard Admin 🎌</h1>
                    <p class="dashboard-subtitle">Selamat datang kembali, <strong>{{ Auth::user()->name ?? 'Admin' }}</strong>! 👋</p>
                </div>
                <div class="col-md-4 text-end">
                    <div class="dashboard-date">
                        <small>{{ now()->format('l, d F Y') }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-4">
        <!-- Stats Cards -->
        <div class="row g-4 mb-4">
            <!-- Total Menu -->
            <div class="col-xl-3 col-md-6">
                <div class="stat-card stat-card-primary">
                    <div class="stat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2"/>
                            <path d="M7 2v20"/>
                            <path d="M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3z"/>
                            <path d="M18.5 22v-7"/>
                        </svg>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">4</h3>
                        <p class="stat-label">Total Stores</p>
                    </div>
                </div>
            </div>

            <!-- Bahan Tersedia -->
            <div class="col-xl-3 col-md-6">
                <div class="stat-card stat-card-warning">
                    <div class="stat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"/>
                            <line x1="12" y1="22.08" x2="12" y2="12"/>
                        </svg>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">8</h3>
                        <p class="stat-label">Produk Tersedia</p>
                    </div>
                </div>
            </div>

            <!-- Kategori -->
            <div class="col-xl-3 col-md-6">
                <div class="stat-card stat-card-info">
                    <div class="stat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                        </svg>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">6</h3>
                        <p class="stat-label">Kategori</p>
                    </div>
                </div>
            </div>

            <!-- Ulasan -->
            <div class="col-xl-3 col-md-6">
                <div class="stat-card stat-card-success">
                    <div class="stat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                        </svg>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">4</h3>
                        <p class="stat-label">Ulasan Tersedia</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row g-4 mb-4">
            <div class="col-12">
                <div class="section-header">
                    <h2 class="section-title">Quick Actions ⚡</h2>
                    <p class="section-subtitle">Akses cepat ke fitur utama</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <a href="{{ route('admin.kategori.index') }}" class="action-card">
                    <div class="action-icon action-icon-primary">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                            <polyline points="9 22 9 12 15 12 15 22"/>
                        </svg>
                    </div>
                    <div class="action-content">
                        <h3 class="action-title">Kelola Kategori</h3>
                        <p class="action-desc">Tambah, edit, dan hapus kategori produk</p>
                    </div>
                    <div class="action-arrow">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <line x1="5" y1="12" x2="19" y2="12"/>
                            <polyline points="12 5 19 12 12 19"/>
                        </svg>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6">
                <a href="{{ route('admin.products.index') }}" class="action-card">
                    <div class="action-icon action-icon-warning">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"/>
                            <line x1="1" y1="10" x2="23" y2="10"/>
                        </svg>
                    </div>
                    <div class="action-content">
                        <h3 class="action-title">Kelola Products</h3>
                        <p class="action-desc">Monitor dan kelola stok produk</p>
                    </div>
                    <div class="action-arrow">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <line x1="5" y1="12" x2="19" y2="12"/>
                            <polyline points="12 5 19 12 12 19"/>
                        </svg>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6">
                <a href="{{ route('admin.kategori.index') }}" class="action-card">
                    <div class="action-icon action-icon-info">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <rect x="3" y="3" width="7" height="7"/>
                            <rect x="14" y="3" width="7" height="7"/>
                            <rect x="14" y="14" width="7" height="7"/>
                            <rect x="3" y="14" width="7" height="7"/>
                        </svg>
                    </div>
                    <div class="action-content">
                        <h3 class="action-title">Kelola Ulasan</h3>
                        <p class="action-desc">Atur dan organisir ulasan pelanggan</p>
                    </div>
                    <div class="action-arrow">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <line x1="5" y1="12" x2="19" y2="12"/>
                            <polyline points="12 5 19 12 12 19"/>
                        </svg>
                    </div>
                </a>
            </div>
        </div>

        <!-- Recent Activity & Popular Menu -->
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="content-card">
                    <div class="card-header-custom">
                        <h3 class="card-title">Aktivitas Terbaru 📋</h3>
                        <a href="#" class="btn-link">Lihat Semua</a>
                    </div>
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon activity-icon-success">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                            </div>
                            <div class="activity-content">
                                <p class="activity-text"><strong>Produk baru ditambahkan:</strong> Cute Kimino yaiba Keychain</p>
                                <span class="activity-time">5 menit yang lalu</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon activity-icon-warning">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                    <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/>
                                    <line x1="12" y1="9" x2="12" y2="13"/>
                                    <line x1="12" y1="17" x2="12.01" y2="17"/>
                                </svg>
                            </div>
                            <div class="activity-content">
                                <p class="activity-text"><strong>Stok menipis:</strong> Kimono AO (Sisa 2)</p>
                                <span class="activity-time">15 menit yang lalu</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon activity-icon-info">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                    <circle cx="12" cy="12" r="10"/>
                                    <polyline points="12 6 12 12 16 14"/>
                                </svg>
                            </div>
                            <div class="activity-content">
                                <p class="activity-text"><strong>Pesanan baru:</strong> 3 pesanan masuk</p>
                                <span class="activity-time">32 menit yang lalu</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon activity-icon-primary">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                    <polyline points="14 2 14 8 20 8"/>
                                </svg>
                            </div>
                            <div class="activity-content">
                                <p class="activity-text"><strong>Kategori diperbarui:</strong> Merch Anime</p>
                                <span class="activity-time">1 jam yang lalu</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="content-card">
                    <div class="card-header-custom">
                        <h3 class="card-title">Produk Terpopuler 🔥</h3>
                    </div>
                    <div class="popular-list">
                        <div class="popular-item">
                            <div class="popular-rank">1</div>
                            <div class="popular-content">
                                <h4>Kimono AOI Hiroshini</h4>
                                <p>243 pesanan</p>
                            </div>
                        </div>
                        <div class="popular-item">
                            <div class="popular-rank">2</div>
                            <div class="popular-content">
                                <h4>Genshin Impact Keychain</h4>
                                <p>198 pesanan</p>
                            </div>
                        </div>
                        <div class="popular-item">
                            <div class="popular-rank">3</div>
                            <div class="popular-content">
                                <h4>Chibi Merch</h4>
                                <p>167 pesanan</p>
                            </div>
                        </div>
                        <div class="popular-item">
                            <div class="popular-rank">4</div>
                            <div class="popular-content">
                                <h4>R3 Green Bike Merch</h4>
                                <p>142 pesanan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection