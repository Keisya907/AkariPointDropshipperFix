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
            background-color: #ffffffff;
            padding: 18px 0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: #305373 !important;
            letter-spacing: 0.5px;
        }
        .nav-link {
            color: #5a5a5a !important;
            font-weight: 500;
            transition: color 0.3s;
            margin: 0 10px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }
        .nav-link:hover {
            color: #305373c4 !important;
            scale: 1.05;
        }
        .btn-login {
            background-color: #ffffffff;
            border: 2px solid #305373c4;
            color: #305373c4;
            padding: 8px 28px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
            font-size: 0.95rem;
        }
        .btn-login:hover {
            background-color: #305373c4;
            transform: translateY(-2px);
            color: white;
            box-shadow: 0 4px 12px rgba(107,79,51,0.3);
        }

        /* 🌸 Hero Section - Floating Purple Container */
        .hero {
            background-color: #fff;
            padding: 50px 0;
            position: relative;
        }

        /* Container ungu di tengah */
        .hero-wrapper {
            background: linear-gradient(135deg, #cdb5f5 0%, #e5d8fb 100%);
            border-radius: 30px;
            padding: 60px 50px;
            margin: 0 auto;
            width: 90%;
            max-width: 1200px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: visible;
        }

        /* Konten kiri */
        .hero-content {
            max-width: 550px;
            z-index: 2;
            position: relative;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .hero h1 .highlight {
            color: #1f415c;
        }

        .hero p {
            color: #222;
            font-size: 1.1rem;
            margin-bottom: 35px;
            line-height: 1.7;
        }

        /* 🧚🏻‍♀️ Gambar karakter yang float keluar container */
        .hero-image {
            position: absolute;
            right: -15px;
            bottom: -50px;
            z-index: 3;
            animation: float 3s ease-in-out infinite;
        }

        .hero-image img {
            width: 480px;
            height: auto;
            filter: drop-shadow(0 20px 40px rgba(0, 0, 0, 0.2));
        }

        /* ✨ Animasi lembut mengambang */
        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        /* Buttons */
        .btn-primary-custom {
            background-color: #305373ff;
            border: none;
            padding: 14px 35px;
            font-weight: 600;
            color: white;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s;
            display: inline-block;
            text-decoration: none;
        }
        .btn-primary-custom:hover {
            background-color: #3053739a;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(107,79,51,0.3);
            color: white;
        }
        .btn-outline-custom {
            background-color: transparent;
            border: 2px solid #305373c4;
            color: #305373c4;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 10px;
            margin-left: 15px;
            transition: all 0.3s;
            text-decoration: none;
        }
        .btn-outline-custom:hover {
            background-color: #305373c4;
            transform: translateY(-2px);
            color: white;
            box-shadow: 0 4px 12px rgba(107,79,51,0.3);
        }

        /* Section Header */
        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }
       .section-badge, .hero-badge {
    display: inline-block;
    background: linear-gradient(135deg, #f3e5ff 0%, #e8dff8 100%);
    color: #6a4d8f;
    padding: 8px 18px;
    border-radius: 25px;
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 15px;
    box-shadow: 0 2px 8px rgba(205, 181, 245, 0.2);
}
        
        .section-title {
            font-size: 2.3rem;
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

        /* kategori Cards - Modern & Clean with Purple Shadow ✨ */
        .kategori-section {
            padding: 80px 0;
            background: linear-gradient(180deg, #fafafade 0%, #f8f5ff 100%);
        }
        .kategori-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            margin-bottom: 30px;
            border: 2px solid #e8dff8;
            box-shadow: 0 4px 20px rgba(205, 181, 245, 0.15);
            position: relative;
        }
        .kategori-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(205, 181, 245, 0.05) 0%, rgba(149, 117, 205, 0.05) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
            pointer-events: none;
        }
        .kategori-card:hover::before {
            opacity: 1;
        }
        .kategori-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 20px 40px rgba(205, 181, 245, 0.4), 
                        0 8px 16px rgba(149, 117, 205, 0.2),
                        0 0 0 1px rgba(205, 181, 245, 0.3);
            border-color: #d4c0f5;
        }
        .kategori-card-img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            background: linear-gradient(135deg, #f8f5ff 0%, #faf8fc 100%);
            transition: transform 0.4s ease;
        }
        .kategori-card:hover .kategori-card-img {
            transform: scale(1.05);
        }
        .kategori-card-body {
            padding: 25px;
            background: linear-gradient(to bottom, #ffffff 0%, #fdfcff 100%);
        }
        .kategori-card-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #5a4a7d;
            margin-bottom: 8px;
            transition: color 0.3s;
        }
        .kategori-card:hover .kategori-card-title {
            color: #7d5ba6;
        }
        .kategori-card-desc {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 15px;
            line-height: 1.6;
        }
        .kategori-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .kategori-card-price {
            color: #2d2d2d;
            font-size: 1.4rem;
            font-weight: 700;
        }
        .btn-add {
            background-color: #7d5ba6;
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
            background-color: #6a4d8f;
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(125, 91, 166, 0.4);
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
            color: #305373;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px #6a4d8f;
        }
        .stat-label {
            color: #666;
            font-size: 1.1rem;
        }

        /* Footer with Floating Characters 👧✨ */
       footer {
  background-color: #1d2f41ff;
  padding: 70px 0 40px;
  color: #fff;
  border-top: 1px solid rgba(255,255,255,0.1);
  font-family: 'Poppins', sans-serif;
  position: relative;
  overflow: hidden;
}

/* Floating Character Images */
.footer-character-left {
  position: absolute;
  bottom: 0;
  left: 20px;
  width: 180px;
  height: auto;
  z-index: 2;
  animation: floatLeft 4s ease-in-out infinite;
  filter: drop-shadow(0 10px 25px rgba(0, 0, 0, 0.3));
}

.footer-character-right {
  position: absolute;
  bottom: 0;
  right: 20px;
  width: 190px;
  height: auto;
  z-index: 2;
  animation: floatRight 3.5s ease-in-out infinite;
  filter: drop-shadow(0 10px 25px rgba(0, 0, 0, 0.3));
}

@keyframes floatLeft {
  0%, 100% { transform: translateY(0) rotate(-2deg); }
  50% { transform: translateY(-15px) rotate(2deg); }
}

@keyframes floatRight {
  0%, 100% { transform: translateY(0) rotate(2deg); }
  50% { transform: translateY(-12px) rotate(-2deg); }
}

footer .container {
  position: relative;
  z-index: 3;
}

footer h5 {
  font-weight: 700;
  font-size: 1.1rem;
  margin-bottom: 18px;
  color: #ffffff;
  letter-spacing: 0.3px;
}

footer p {
  color: rgba(255, 255, 255, 0.8);
  font-size: 0.95rem;
  line-height: 1.8;
  margin-bottom: 8px;
}

.footer-links {
  display: flex;
  flex-direction: column;
}

.footer-links a {
  text-decoration: none;
  color: rgba(255, 255, 255, 0.85);
  margin-bottom: 8px;
  font-size: 0.95rem;
  transition: color 0.3s, transform 0.2s;
}

.footer-links a:hover {
  color: #ffffff;
  transform: translateX(4px);
}

.footer-bottom {
  border-top: 1px solid #404040;
  width: 80%;
  margin: 30px auto 0;
  padding-top: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  color: #888;
  text-align: center;
}

.footer-bottom small {
  color: rgba(255,255,255,0.7);
  font-size: 0.9rem;
  letter-spacing: 0.3px;
}

/* Responsive Floating Characters */
@media (max-width: 768px) {
  .footer-character-left,
  .footer-character-right {
    width: 140px;
  }
  .footer-character-left { left: 10px; }
  .footer-character-right { right: 10px; }
}

@media (max-width: 576px) {
  .footer-character-left,
  .footer-character-right {
    width: 100px;
    opacity: 0.8;
  }
}

        /* Modal */
        .modal-content {
            border-radius: 15px;
            border: none;
        }
        .modal-header {
            background-color: #305373;
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
            border-color: #000000ff;
            box-shadow: 0 0 0 3px rgba(163,124,64,0.1);
        }
        
        /* 📱 RESPONSIVE DESIGN */
        @media (max-width: 992px) {
            .hero-wrapper {
                padding: 50px 40px;
            }
            .hero-image {
                right: 0;
            }
            .hero-image img {
                width: 400px;
            }
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.2rem;
            }
            .hero-wrapper {
                padding: 40px 30px;
                width: 95%;
            }
            .hero-image {
                position: static;
                text-align: center;
                margin-top: 30px;
            }
            .hero-image img {
                width: 100%;
                max-width: 350px;
            }
            .btn-outline-custom {
                margin-left: 0;
                margin-top: 10px;
                display: inline-block;
            }
            .section-title {
                font-size: 1.9rem;
            }
            .kategori-card-img {
                height: 200px;
            }
            .footer-character-left,
            .footer-character-right {
                width: 140px;
            }
            .footer-character-left {
                left: 10px;
            }
            .footer-character-right {
                right: 10px;
            }
            .stat-number {
                font-size: 2.5rem;
            }
        }
        
        @media (max-width: 576px) {
            .hero h1 {
                font-size: 1.8rem;
            }
            .hero p {
                font-size: 1rem;
            }
            .btn-primary-custom {
                padding: 12px 25px;
                font-size: 0.95rem;
                display: block;
                text-align: center;
            }
            .btn-outline-custom {
                padding: 10px 20px;
                display: block;
                text-align: center;
                width: 100%;
                margin-top: 10px;
            }
            .section-badge, .hero-badge {
                font-size: 0.8rem;
                padding: 6px 15px;
            }
            .section-title {
                font-size: 1.5rem;
            }
            .section-desc {
                font-size: 0.95rem;
            }
            .footer-character-left,
            .footer-character-right {
                width: 100px;
                opacity: 0.8;
            }
            .kategori-card-body {
                padding: 20px;
            }
            .kategori-card-title {
                font-size: 1.1rem;
            }
            .kategori-card-price {
                font-size: 1.2rem;
            }
            .stat-number {
                font-size: 2rem;
            }
            .stat-label {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/">AkariPoint.com</a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav" style="border:none;">
            <span style="font-size:1.5rem; color:#6b4f33;">☰</span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="nav">
            <ul class="navbar-nav me-3">
                       <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('kategori.public') }}">Produk</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('tentang') }}">Tentang</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('kontak') }}">Kontak</a></li>

            </ul>
            <button class="btn btn-login" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        </div>
    </div>
</nav>

<!-- HERO SECTION -->
<section class="hero" id="beranda">
    <div class="hero-wrapper">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1>Level Up Gayamu dengan <span class="highlight">Sentuhan Jepang!</span></h1>
                    <p>Dapatkan produk original, keren, dan limited edition untuk para penggemar budaya Jepang sejati! Dari figure hingga style Jepang—semua ada di sini, siap bikin harimu makin berwarna!</p>
                    <div>
                        <a href="#kategori" class="btn-primary-custom">Best Seller Product</a>
                        <a href="#tentang" class="btn-outline-custom">Tentang Kami</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-image">
                    <img src="{{ asset('image/dashboard.png') }}" alt="Dashboard">

                </div>
            </div>
        </div>
    </div>
</section>

<!-- BEST SELLER SECTION -->
<section class="kategori-section" id="kategori">
    <div class="container">
        <div class="section-header">
            <span class="hero-badge">🛍 Best Seller Product</span>
            <h2 class="section-title">Koleksi Pilihan Terbaik!</h2>
            <p class="section-desc">Temukan berbagai barang nuansa jepang berkualitas untuk Anda</p>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="kategori-card">
                    <img src="{{ asset('image/best1.jpg') }}" class="kategori-card-img" alt="Kimono">
                    <div class="kategori-card-body">
                        <h3 class="kategori-card-title">Kimono Barongsai</h3>
                        <p class="kategori-card-desc">Kimono jepang dengan motif barongsai</p>
                        <div class="kategori-card-footer">
                            <span class="kategori-card-price">Rp 52.000</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="kategori-card">
                     <img src="{{ asset('image/best2.jpg') }}" class="kategori-card-img" alt="Miniature">
                    <div class="kategori-card-body">
                        <h3 class="kategori-card-title">Mini Home Miniature</h3>
                        <p class="kategori-card-desc">Miniatur rumah yang lucu dan elegan</p>
                        <div class="kategori-card-footer">
                            <span class="kategori-card-price">Rp 25.000</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="kategori-card">
                     <img src="{{ asset('image/best3.jpg') }}" class="kategori-card-img" alt="Kimono">
                    <div class="kategori-card-body">
                        <h3 class="kategori-card-title">Kimono Mega Mendung</h3>
                        <p class="kategori-card-desc">Kimono jepang dengan motif mega mendung</p>
                        <div class="kategori-card-footer">
                            <span class="kategori-card-price">Rp 60.000</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="kategori-card">
                     <img src="{{ asset('image/best4.jpg') }}" class="kategori-card-img" alt="Kimono">
                    <div class="kategori-card-body">
                        <h3 class="kategori-card-title">Kimono Kucing Laut</h3>
                        <p class="kategori-card-desc">Kimono jepang bermotif kucing yang lucu</p>
                        <div class="kategori-card-footer">
                            <span class="kategori-card-price">Rp 22.000</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('kategori.public') }}"class="btn-primary-custom">Lihat Semua Produk >></a>
        </div>
    </div>
</section>

<!-- STATS SECTION -->
<section class="stats-section" id="tentang">
    <div class="container">
        <div class="section-header mb-5">
            <span class="hero-badge">Pencapaian Kami</span>
            <h2 class="section-title">Dipercaya Ribuan Pelanggan</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-number">1.2K+</div>
                    <div class="stat-label">Pelanggan Setia</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-number">10+</div>
                    <div class="stat-label">Kategori Tersedia</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-number">4.9★</div>
                    <div class="stat-label">Rating Pelanggan</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer id="kontak">
    <!-- Floating Characters -->
    <img src="{{ asset('image/chibicadangan.png') }}" alt="Chibi Character" class="footer-character-left">
    <img src="{{ asset('image/chibi2.png') }}" alt="Chibi Character" class="footer-character-right">

    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5>Akari Point Dropshipper</h5>
                <p style="color:#b0b0b0; line-height:1.7;">
                    Menyediakan platform jual - beli barang nuansa Jepang yang lengkap dan berkualitas.
                </p>
            </div>

            <div class="col-md-2 mb-4 footer-links">
                <h5>Menu</h5>
                <a href="#beranda">Beranda</a>
                <a href="#kategori">Produk</a>
                <a href="#tentang">Tentang</a>
                <a href="#kontak">Kontak</a>
            </div>

            <div class="col-md-3 mb-4">
                <h5>Kontak</h5>
                <p>📧 info@akaripoint.com</p>
                <p>📞 +62 895 3603 22053</p>
                <p>📍 Jl. Merdeka No. 123, Malang</p>
            </div>

            <div class="col-md-3 mb-4 footer-links">
                <h5>Ikuti Kami</h5>
                <a href="#">Instagram</a>
                <a href="#">Facebook</a>
                <a href="#">Twitter</a>
            </div>
        </div>

        <div class="footer-bottom">
            <small>© 2025 Akari Point Dropshipper. Buat dunia otakumu menjadi nyata.</small>
        </div>
    </div>
</footer>

<!-- MODAL LOGIN -->
<div class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login ke Akun Anda</h5>
                <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">

                @if ($errors->has('email'))
                    <div class="alert alert-danger">
                        {{ $errors->first('email') }}
                    </div>
                @endif

                <form action="{{ route('modal.login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="nama@email.com"
                            required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input
                            type="password"
                            name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Masukkan password"
                            required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn-primary-custom w-100">Masuk</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Buka modal lagi kalau gagal login -->
@if(session('openLoginModal'))
<script>
    var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
    loginModal.show();
</script>
@endif
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>