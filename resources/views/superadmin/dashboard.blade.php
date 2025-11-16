@extends('layoutes.superadmin.app')

@section('content')
<style>
.admin-dashboard {
    background: linear-gradient(135deg, #f5f7fa 0%, #e8eef3 100%);
    min-height: 100vh;
    padding-bottom: 40px;
}

/* Dashboard Header */
.dashboard-header {
background: linear-gradient(135deg, #eeb4b3ff 0%, #eeb4b3ff 100%);
    color: white;
    padding: 35px 0;
    margin: 0 20px 35px 20px;
    margin-top: 20px;
    border-radius: 24px;
    box-shadow: 0 8px 30px rgba(107, 79, 51, 0.2);
    position: relative;
    overflow: hidden;
    border: 6px solid rgba(255, 255, 255, 0.15);
}

.dashboard-header::before {
    content: "";
    position: absolute;
    top: -50%;
    right: -5%;
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
    border-radius: 50%;
}

.dashboard-header::after {
    content: "";
    position: absolute;
    inset: -6px;
    background: linear-gradient(135deg, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0.05) 100%);
    border-radius: 24px;
    z-index: -1;
    padding: 6px;
    -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
}

.dashboard-title {
    font-size: 2.2rem;
    font-weight: 800;
    margin-bottom: 8px;
    letter-spacing: -0.5px;
}

.dashboard-subtitle {
    font-size: 1.05rem;
    opacity: 0.95;
    margin: 0;
    font-weight: 400;
}

.dashboard-date {
    background: rgba(255,255,255,0.2);
    backdrop-filter: blur(10px);
    padding: 12px 24px;
    border-radius: 12px;
    display: inline-block;
    border: 1px solid rgba(255,255,255,0.3);
}

.dashboard-date small {
    color: white;
    font-weight: 600;
    font-size: 0.95rem;
}

/* Stats Cards - Enhanced */
.stat-card {
    background: white;
    border-radius: 20px;
    padding: 28px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    border: 2px solid transparent;
    position: relative;
    overflow: hidden;
}

.stat-card::before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    width: 120px;
    height: 120px;
    background: linear-gradient(135deg, rgba(107,79,51,0.08) 0%, rgba(107,79,51,0.02) 100%);
    border-radius: 50%;
    transform: translate(40%, -40%);
    transition: all 0.4s;
}

.stat-card::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, transparent 0%, currentColor 50%, transparent 100%);
    transform: scaleX(0);
    transition: transform 0.4s ease;
}

.stat-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 35px rgba(0,0,0,0.15);
    border-color: rgba(0,0,0,0.05);
}

.stat-card:hover::before {
    transform: translate(35%, -35%) scale(1.1);
}

.stat-card:hover::after {
    transform: scaleX(1);
}

/* Individual card colors for bottom border */
.stat-card-primary::after {
    color: #6b4f33;
}

.stat-card-warning::after {
    color: #f39c12;
}

.stat-card-info::after {
    color: #3498db;
}

.stat-card-success::after {
    color: #27ae60;
}

.stat-icon {
    width: 65px;
    height: 65px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 18px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    position: relative;
}

.stat-icon::before {
    content: "";
    position: absolute;
    inset: 0;
    border-radius: 16px;
    padding: 2px;
    background: linear-gradient(135deg, rgba(255,255,255,0.4), rgba(255,255,255,0.1));
    -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.stat-card:hover .stat-icon {
    transform: scale(1.1) rotate(5deg);
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}

.stat-card:hover .stat-icon::before {
    opacity: 1;
}

.stat-icon svg {
    filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
}

.stat-card-primary .stat-icon {
    background: linear-gradient(135deg, #6b4f33 0%, #9d6b42 100%);
    color: white;
}

.stat-card-warning .stat-icon {
    background: linear-gradient(135deg, #f39c12 0%, #f4a942 100%);
    color: white;
}

.stat-card-info .stat-icon {
    background: linear-gradient(135deg, #3498db 0%, #5dade2 100%);
    color: white;
}

.stat-card-success .stat-icon {
    background: linear-gradient(135deg, #27ae60 0%, #52c77a 100%);
    color: white;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 900;
    color: #1a1a1a;
    margin-bottom: 5px;
    line-height: 1;
    background: linear-gradient(135deg, #1a1a1a 0%, #4a4a4a 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    transition: all 0.3s ease;
}

.stat-card:hover .stat-number {
    transform: scale(1.05);
    letter-spacing: 1px;
}

.stat-label {
    color: #7a7a7a;
    font-size: 0.95rem;
    margin: 0;
    font-weight: 500;
    transition: color 0.3s ease;
}

.stat-card:hover .stat-label {
    color: #5a5a5a;
}

/* Section Header */
.section-header {
    margin-bottom: 25px;
}

.section-title {
    font-size: 1.6rem;
    font-weight: 800;
    color: #1a1a1a;
    margin-bottom: 5px;
}

.section-subtitle {
    color: #7a7a7a;
    font-size: 0.95rem;
}

/* Action Cards - Enhanced */
.action-card {
    background: white;
    border-radius: 18px;
    padding: 28px;
    display: flex;
    align-items: center;
    gap: 22px;
    text-decoration: none;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    border: none;
    position: relative;
    overflow: hidden;
}

.action-card::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
    background: linear-gradient(180deg, #6b4f33 0%, #9d6b42 100%);
    transform: scaleY(0);
    transition: transform 0.3s;
}

.action-card:hover {
    transform: translateX(8px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.15);
}

.action-card:hover::after {
    transform: scaleY(1);
}

.action-icon {
    width: 75px;
    height: 75px;
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    transition: all 0.3s;
}

.action-card:hover .action-icon {
    transform: rotate(5deg) scale(1.05);
}

.action-icon-primary {
    background: linear-gradient(135deg, rgba(107,79,51,0.15) 0%, rgba(107,79,51,0.08) 100%);
    color: #6b4f33;
}

.action-icon-warning {
    background: linear-gradient(135deg, rgba(243,156,18,0.15) 0%, rgba(243,156,18,0.08) 100%);
    color: #f39c12;
}

.action-icon-info {
    background: linear-gradient(135deg, rgba(52,152,219,0.15) 0%, rgba(52,152,219,0.08) 100%);
    color: #3498db;
}

.action-content {
    flex: 1;
}

.action-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 6px;
}

.action-desc {
    color: #7a7a7a;
    font-size: 0.9rem;
    margin: 0;
}

.action-arrow {
    color: #6b4f33;
    transition: transform 0.3s;
}

.action-card:hover .action-arrow {
    transform: translateX(8px);
}

/* Content Card - Enhanced */
.content-card {
    background: white;
    border-radius: 20px;
    padding: 28px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    border: none;
    height: 100%;
}

.card-header-custom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
    padding-bottom: 18px;
    border-bottom: 2px solid #f0f0f0;
}

.card-title {
    font-size: 1.3rem;
    font-weight: 800;
    color: #1a1a1a;
    margin: 0;
}

.btn-link {
    color: #6b4f33;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 600;
    transition: all 0.3s;
    padding: 6px 12px;
    border-radius: 8px;
}

.btn-link:hover {
    background-color: rgba(107, 79, 51, 0.1);
    color: #5d4037;
}

/* Activity List - Enhanced */
.activity-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.activity-item {
    display: flex;
    gap: 16px;
    padding: 18px;
    border-radius: 14px;
    background-color: #f8f9fa;
    transition: all 0.3s;
    border: 1px solid transparent;
}

.activity-item:hover {
    background-color: #fff;
    border-color: #e8e8e8;
    transform: translateX(4px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.06);
}

.activity-icon {
    width: 45px;
    height: 45px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.activity-icon-success {
    background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
    color: #27ae60;
}

.activity-icon-warning {
    background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
    color: #f39c12;
}

.activity-icon-info {
    background: linear-gradient(135deg, #d1ecf1 0%, #bee5eb 100%);
    color: #3498db;
}

.activity-icon-primary {
    background: linear-gradient(135deg, #e8dfd1 0%, #d4c5b0 100%);
    color: #6b4f33;
}

.activity-content {
    flex: 1;
}

.activity-text {
    color: #1a1a1a;
    font-size: 0.95rem;
    margin-bottom: 6px;
    font-weight: 500;
}

.activity-time {
    color: #999;
    font-size: 0.85rem;
}

/* Popular List - Enhanced */
.popular-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.popular-item {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 18px;
    border-radius: 14px;
    background-color: #f8f9fa;
    transition: all 0.3s;
    border: 1px solid transparent;
}

.popular-item:hover {
    background-color: #fff;
    border-color: #e8e8e8;
    transform: translateX(6px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.06);
}

.popular-rank {
    width: 45px;
    height: 45px;
    border-radius: 12px;
    background: linear-gradient(135deg, #6b4f33 0%, #9d6b42 100%);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 800;
    font-size: 1.2rem;
    flex-shrink: 0;
    box-shadow: 0 4px 12px rgba(107, 79, 51, 0.3);
}

.popular-content h4 {
    font-size: 1.05rem;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 4px;
}

.popular-content p {
    color: #7a7a7a;
    font-size: 0.85rem;
    margin: 0;
    font-weight: 500;
}

/* Responsive */
@media (max-width: 768px) {
    .dashboard-title {
        font-size: 1.6rem;
    }
    
    .action-card {
        padding: 22px;
    }
    
    .action-icon {
        width: 60px;
        height: 60px;
    }
    
    .stat-number {
        font-size: 2rem;
    }

    .section-title {
        font-size: 1.3rem;
    }
}
</style>

<div class="admin-dashboard">
    <!-- Header Section -->
    <div class="dashboard-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="dashboard-title">Dashboard Superadmin</h1>
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
                        <p class="stat-label">Total MAKANANNN</p>
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
                        <p class="stat-label">Bahan Tersedia</p>
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
                        <h3 class="stat-number">3</h3>
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
                    <h2 class="section-title">Quick Actions</h2>
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
                        <h3 class="action-title">Kelola Menu</h3>
                        <p class="action-desc">Tambah, edit, dan hapus menu makanan & minuman</p>
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
                    <div class="action-icon action-icon-warning">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"/>
                            <line x1="1" y1="10" x2="23" y2="10"/>
                        </svg>
                    </div>
                    <div class="action-content">
                        <h3 class="action-title">HALOO</h3>
                        <p class="action-desc">Monitor dan kelola stok bahan baku</p>
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
                        <h3 class="action-title">Kelola Kategori</h3>
                        <p class="action-desc">Atur dan organisir kategori menu</p>
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
                        <h3 class="card-title">Aktivitas Terbaru</h3>
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
                                <p class="activity-text"><strong>Menu baru ditambahkan:</strong> Soto Lamongan Spesial</p>
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
                                <p class="activity-text"><strong>Stok menipis:</strong> Bawang Merah (Sisa 2kg)</p>
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
                                <p class="activity-text"><strong>Kategori diperbarui:</strong> Minuman Tradisional</p>
                                <span class="activity-time">1 jam yang lalu</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="content-card">
                    <div class="card-header-custom">
                        <h3 class="card-title">Menu Terpopuler</h3>
                    </div>
                    <div class="popular-list">
                        <div class="popular-item">
                            <div class="popular-rank">1</div>
                            <div class="popular-content">
                                <h4>Nasi Gudeg Jogja</h4>
                                <p>243 pesanan</p>
                            </div>
                        </div>
                        <div class="popular-item">
                            <div class="popular-rank">2</div>
                            <div class="popular-content">
                                <h4>Rawon Setan</h4>
                                <p>198 pesanan</p>
                            </div>
                        </div>
                        <div class="popular-item">
                            <div class="popular-rank">3</div>
                            <div class="popular-content">
                                <h4>Ayam Penyet</h4>
                                <p>167 pesanan</p>
                            </div>
                        </div>
                        <div class="popular-item">
                            <div class="popular-rank">4</div>
                            <div class="popular-content">
                                <h4>Soto Lamongan</h4>
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