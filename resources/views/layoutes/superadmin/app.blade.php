<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --brown-dark: #5D4037;
            --brown-primary: #795548;
            --brown-light: #A1887F;
            --cream: #EFEBE9;
            --gold: #ffffffff;
        }
        .badge-bahan {
                background-color: #8B4513; /* coklat */
                color: white;
                margin-right: 3px;
                font-size: 12px;
            }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        /* Sidebar Styling */
        .sidebar {
            height: 100vh;
            background-color: #305373;
            color: white;
            position: fixed;
            width: 260px;
            top: 0;
            left: 0;
            padding-top: 0;
            box-shadow: 4px 0 15px rgba(0,0,0,0.1);
            overflow-y: auto;
            transition: all 0.3s ease;
        }

        .sidebar-header {
            padding: 25px 20px;
            background: rgba(0,0,0,0.2);
            border-bottom: 2px solid var(--gold);
            text-align: center;
        }

        .sidebar-header h5 {
            font-size: 1.4rem;
            font-weight: 700;
            margin: 0;
            color: var(--gold);
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .sidebar-header .subtitle {
            font-size: 0.75rem;
            color: var(--cream);
            margin-top: 5px;
            letter-spacing: 1px;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .sidebar a {
            color: var(--cream);
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 25px;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
            font-size: 0.95rem;
        }

        .sidebar a i {
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        .sidebar a:hover {
            background: rgba(255,255,255,0.1);
            border-left-color: var(--gold);
            padding-left: 30px;
            color: white;
        }

        .sidebar a.active {
            background: rgba(212, 175, 55, 0.2);
            border-left-color: var(--gold);
            color: var(--gold);
            font-weight: 600;
        }

        /* Navbar Styling */
        .navbar {
            position: fixed;
            top: 0;
            left: 260px;
            right: 0;
            background: white;
            border-bottom: none;
            padding: 15px 30px;
            z-index: 10;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            backdrop-filter: blur(10px);
        }

        .navbar-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #305373;
            margin: 0;
        }

        .navbar-title .highlight {
            color: #305373;
        }

        .admin-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 15px;
            background: var(--cream);
            border-radius: 25px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .admin-profile:hover {
            background: var(--brown-light);
            transform: translateY(-2px);
        }

        .admin-profile .avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--brown-primary), var(--brown-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .admin-profile .admin-name {
            color: var(--brown-dark);
            font-weight: 600;
            font-size: 0.9rem;
        }

        .btn-logout {
            background: linear-gradient(135deg, #C62828, #D32F2F);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(198, 40, 40, 0.2);
        }

        .btn-logout:hover {
            background: linear-gradient(135deg, #B71C1C, #C62828);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(198, 40, 40, 0.3);
            color: white;
        }

        /* Content Area */
        .content {
            margin-left: 260px;
            margin-top: 70px;
            padding: 30px;
        }

        /* Scrollbar Styling */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(0,0,0,0.1);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: var(--gold);
            border-radius: 10px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                overflow: hidden;
            }
            
            .navbar {
                left: 0;
            }
            
            .content {
                margin-left: 0;
            }
        }
        
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h5>AkariPoint.com</h5>
            <div class="subtitle">Selamat Datang ADMIN</div>
        </div>
        
        <div class="sidebar-menu">
            <a href="{{ route('admin.kategori.index') }}" class="menu-item">
                <i class="fas fa-carrot"></i>
                <span>Kelola Admin</span>
            </a>
            <a href="{{ route('admin.kategori.index') }}" class="menu-item">
                <i class="fas fa-th-large"></i>
                <span>Kategori</span>
            </a>
            <a href="{{ route('admin.kategori.index') }}" class="menu-item">
                <i class="fas fa-utensils"></i>
                <span>Produk</span>
            </a>
            <a href="{{ route('admin.ulasan.index') }}" class="menu-item">
                <i class="fas fa-star"></i>
                <span>Kelola Ulasan</span>
            </a>
        </div>
    </div>

    <!-- Navbar -->
    <div class="navbar d-flex justify-content-between align-items-center">
        <h6 class="navbar-title">
            <a href="{{ route('admin.dashboard') }}" style="text-decoration: none; color: inherit;">
            Manajemen <span class="highlight">Akari Point</span></a>
        </h6>

        <div class="admin-section">
            <a class="admin-profile" href="{{ route('superadmin.toko.index') }}">
                <div class="avatar">
                    <i class="fas fa-user"></i>
                </div>
                <span class="admin-name">Profil Toko</span>
            </a>
            
            <form action="{{ route('modal.logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button class="btn btn-logout" type="submit">
                    <i class="fas fa-sign-out-alt me-1"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Active menu highlighting
        const currentPath = window.location.pathname;
        document.querySelectorAll('.sidebar a').forEach(link => {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('active');
            }
        });
    </script>
</body>
</html>