<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akari Point Dropshipper</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #ffffff;
            font-family: 'Poppins', sans-serif;
            color: #2d2d2d;
        }
        
        /* Navbar - Clean & Minimal */
        .navbar {
            background-color: #ffffff;
            padding: 18px 0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: #6b4f33 !important;
            letter-spacing: 0.5px;
        }
        .nav-link {
            color: #5a5a5a !important;
            font-weight: 500;
            transition: color 0.3s;
            margin: 0 10px;
            font-size: 0.95rem;
        }
        .nav-link:hover {
            color: #a37c40 !important;
        }
        .btn-login {
            background-color: #6b4f33;
            border: none;
            color: #fff;
            padding: 10px 28px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
            font-size: 0.95rem;
        }
        .btn-login:hover {
            background-color: #5d4037;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(107,79,51,0.3);
        }

        /* Hero Section - Clean White */
        .hero {
            padding: 100px 20px;
            background-color: #fefdfb;
            position: relative;
        }
        .hero-content {
            max-width: 550px;
        }
        .hero-badge {
            display: inline-block;
            background-color: #fff3e6;
            color: #a37c40;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .hero h1 {
            font-size: 3.2rem;
            font-weight: 800;
            color: #2d2d2d;
            margin-bottom: 20px;
            line-height: 1.2;
        }
        .hero h1 .highlight {
            color: #6b4f33;
        }
        .hero p {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 35px;
            line-height: 1.7;
        }
        .hero-image {
            position: relative;
            animation: float 3s ease-in-out infinite;
        }
        .hero-image img {
            width: 100%;
            max-width: 500px;
            filter: drop-shadow(0 20px 40px rgba(0,0,0,0.1));
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        /* Buttons */
        .btn-primary-custom {
            background-color: #6b4f33;
            border: none;
            padding: 14px 35px;
            font-weight: 600;
            color: white;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s;
            display: inline-block;
            margin-top: 20px;
        }
        .btn-primary-custom:hover {
            background-color: #5d4037;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(107,79,51,0.3);
            color: white;
        }
        .btn-outline-custom {
            background-color: transparent;
            border: 2px solid #6b4f33;
            color: #6b4f33;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 10px;
            margin-left: 15px;
            transition: all 0.3s;
        }
        .btn-outline-custom:hover {
            background-color: #6b4f33;
            color: white;
        }

        /* Promo Banner */
        .promo-banner {
            padding: 60px 0;
            background-color: #fff;
        }
        .promo-card {
            background: linear-gradient(135deg, #8b5a3c 0%, #6b4f33 100%);
            border-radius: 20px;
            padding: 50px;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .promo-card::before {
            content: "";
            position: absolute;
            top: -50%;
            right: -10%;
            width: 300px;
            height: 300px;
            background: rgba(255,255,255,0.08);
            border-radius: 50%;
        }
        .promo-content {
            position: relative;
            z-index: 2;
        }
        .promo-card h3 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 15px;
        }
        .promo-card p {
            font-size: 1.1rem;
            opacity: 0.95;
            margin-bottom: 25px;
        }
        .btn-promo {
            background-color: white;
            color: #6b4f33;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            border: none;
            transition: all 0.3s;
        }
        .btn-promo:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(255,255,255,0.3);
        }

        /* Section Header */
        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }
        .section-badge {
            display: inline-block;
            background-color: #fff3e6;
            color: #a37c40;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 15px;
        }
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2d2d2d;
            margin-bottom: 15px;
        }
        .section-desc {
            color: #666;
            font-size: 1.05rem;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Menu Cards - Modern & Clean */
        .menu-section {
            padding: 80px 0;
            background-color: #fafafa;
        }
        .menu-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s;
            margin-bottom: 30px;
            border: 1px solid #f0f0f0;
        }
        .menu-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 35px rgba(0,0,0,0.08);
        }
        .menu-card-img {
            width: 100%;
            height: 240px;
            object-fit: cover;
            background-color: #f8f8f8;
        }
        .menu-card-body {
            padding: 25px;
        }
        .menu-card-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #2d2d2d;
            margin-bottom: 8px;
        }
        .menu-card-desc {
            color: #888;
            font-size: 0.9rem;
            margin-bottom: 15px;
            line-height: 1.5;
        }
        .menu-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .menu-card-price {
            color: #6b4f33;
            font-size: 1.4rem;
            font-weight: 700;
        }
        .btn-add {
            background-color: #6b4f33;
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            font-size: 1.3rem;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btn-add:hover {
            background-color: #5d4037;
            transform: scale(1.1);
        }

        /* Stats Section */
        .stats-section {
            padding: 80px 0;
            background-color: #fff;
        }
        .stat-card {
            text-align: center;
            padding: 30px 20px;
        }
        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            color: #6b4f33;
            margin-bottom: 10px;
        }
        .stat-label {
            color: #666;
            font-size: 1.1rem;
        }

        /* Footer */
        footer {
            background-color: #2d2d2d;
            color: #e0e0e0;
            padding: 40px 0 20px;
        }
        footer h5 {
            color: white;
            font-weight: 700;
            margin-bottom: 20px;
        }
        footer a {
            color: #b0b0b0;
            text-decoration: none;
            transition: color 0.3s;
            display: block;
            margin-bottom: 10px;
        }
        footer a:hover {
            color: #a37c40;
        }
        .footer-bottom {
            border-top: 1px solid #404040;
            margin-top: 30px;
            padding-top: 20px;
            text-align: center;
            color: #888;
        }

        /* Modal */
        .modal-content {
            border-radius: 15px;
            border: none;
        }
        .modal-header {
            background-color: #6b4f33;
            color: white;
            border: none;
            padding: 20px 30px;
        }
        .modal-body {
            padding: 30px;
        }
        .form-label {
            font-weight: 600;
            color: #2d2d2d;
            margin-bottom: 8px;
        }
        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 2px solid #e8e8e8;
            transition: all 0.3s;
        }
        .form-control:focus {
            border-color: #a37c40;
            box-shadow: 0 0 0 3px rgba(163,124,64,0.1);
        }
        
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.2rem;
            }
            .hero-image {
                margin-top: 40px;
            }
            .btn-outline-custom {
                margin-left: 0;
                margin-top: 10px;
            }
            .section-title {
                font-size: 1.8rem;
            }
            .promo-card {
                padding: 30px 25px;
            }
        }
    </style>
</head>
<body>
    @include('public.component.navbar')  {{-- navbar dipakai di semua halaman publik --}}

    <div class="container my-5">
        @yield('content')
    </div>

    @include('public.component.footer')  {{-- footer dipakai di semua halaman publik --}}
</body>

</html>
