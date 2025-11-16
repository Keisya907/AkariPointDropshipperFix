<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --brown-primary: #795548;
            --brown-dark: #5D4037;
            --brown-light: #A1887F;
            --cream: #EFEBE9;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #EFEBE9;
            min-height: 100vh;
        }

        .main-container {
            display: flex;
            min-height: 100vh;
        }

        /* Content Area */
        .content-area {
            flex: 1;
            padding: 40px;
            overflow-y: auto;
        }

        /* Back Button */
        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: white;
            color: var(--brown-dark);
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 25px;
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            background: var(--brown-primary);
            color: white;
            transform: translateX(-5px);
        }

        /* Profile Card */
        .profile-card {
            background: white;
            border-radius: 25px;
            padding: 40px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
            margin-bottom: 25px;
        }

        .profile-header-section {
            display: flex;
            gap: 30px;
            align-items: center;
            padding-bottom: 30px;
            border-bottom: 2px solid #f0f0f0;
            margin-bottom: 30px;
        }

        .profile-photo {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid var(--brown-primary);
            box-shadow: 0 8px 20px rgba(93, 64, 55, 0.3);
        }

        .profile-info h1 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--brown-dark);
            margin-bottom: 8px;
        }

        .profile-date {
            color: #6b7280;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .profile-location {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            background: #f3f4f6;
            border-radius: 20px;
            font-size: 0.85rem;
            color: #4b5563;
        }

        /* About Section */
        .about-section {
            margin-bottom: 25px;
        }

        .about-section h3 {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--brown-dark);
            margin-bottom: 15px;
        }

        .about-text {
            color: #4b5563;
            line-height: 1.7;
            font-size: 0.95rem;
        }

        /* Info Grid */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
            margin-top: 30px;
        }

        .info-section {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .info-section h3 {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--brown-dark);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-section h3 i {
            color: var(--brown-primary);
        }

        /* Timeline */
        .timeline {
            position: relative;
            padding-left: 30px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 8px;
            top: 5px;
            bottom: 5px;
            width: 2px;
            background: linear-gradient(to bottom, var(--brown-dark), var(--brown-light));
        }

        .timeline-item {
            position: relative;
            margin-bottom: 18px;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -25px;
            top: 3px;
            width: 10px;
            height: 10px;
            background: var(--brown-primary);
            border: 2px solid white;
            border-radius: 50%;
            box-shadow: 0 0 0 2px var(--brown-primary);
        }

        .timeline-school {
            font-weight: 700;
            color: var(--brown-dark);
            font-size: 0.95rem;
        }

        .timeline-year {
            color: #6b7280;
            font-size: 0.85rem;
        }

        /* Skills */
        .skills-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .skill-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            background: linear-gradient(135deg, var(--brown-dark), var(--brown-primary));
            color: white;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(93, 64, 55, 0.2);
            transition: all 0.3s ease;
        }

        .skill-badge:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(93, 64, 55, 0.35);
        }

        /* Stats */
        .stats-section {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 25px;
        }

        .stat-box {
            background: linear-gradient(135deg, var(--brown-dark), var(--brown-primary));
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            color: white;
            box-shadow: 0 4px 15px rgba(93, 64, 55, 0.3);
        }

        .stat-number {
            display: block;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 0.85rem;
            opacity: 0.9;
        }

        @media (max-width: 992px) {
            .main-container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .profile-header-section {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">

        <!-- Content Area -->
        <div class="content-area">
            <a href="{{ route('admin.dashboard') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                Sudah" kembali yuk
            </a>

            <!-- Profile Card -->
            <div class="profile-card">
                <div class="profile-header-section">
                    <img src="{{ asset('image/fotoku.jpeg') }}" alt="Foto Profil" class="profile-photo">
                    <div class="profile-info">
                        <h1>Keisya Ananda Cayadewi</h1>
                        <div class="profile-date">
                            <i class="far fa-calendar"></i> Bergabung sejak 24 November 2024
                        </div>
                        <span class="profile-location">
                            <i class="fas fa-map-marker-alt"></i>
                            Lumajang, Jawa Timur
                        </span>
                    </div>
                </div>

                <!-- About -->
                <div class="about-section">
                    <h3>Tentang Saya</h3>
                    <p class="about-text">
                        Haloo! Perkenalkan nama saya Keisya Ananda Cayadewi. Saya biasa dipanggil Keisya/Kei. Saya lahir di Lumajang pada tanggal 20 November 2007. Hobi saya diantaranya adalah membaca buku, mendengarkan musik (Kpop, RnB, Pop dll), menonton film, menyanyi, dan lain lain.
                    </p>
                </div>

                <!-- Stats -->
                <div class="stats-section">
                    <div class="stat-box">
                        <span class="stat-number">2+ Tahun</span>
                        <span class="stat-label">Pengalaman</span>
                    </div>
                    <div class="stat-box">
                        <span class="stat-number">3+</span>
                        <span class="stat-label">Project Selesai</span>
                    </div>
                    <div class="stat-box">
                        <span class="stat-number">6+</span>
                        <span class="stat-label">Sertifikat</span>
                    </div>
                </div>
            </div>

            <!-- Info Grid -->
            <div class="info-grid">
                <!-- Education -->
                <div class="info-section">
                    <h3>
                        <i class="fas fa-graduation-cap"></i>
                        Riwayat Pendidikan
                    </h3>
                    <p class="about-text" style="margin-bottom: 20px;">
                        Saya sekarang adalah pelajar SMK kelas 12 di SMKN 8 Malang dengan Jurusan Rekayasa Perangkat Lunak.
                    </p>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-school">SD Pandanwangi 5</div>
                            <div class="timeline-year">2015 - 2021</div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-school">SMPN 16 Malang</div>
                            <div class="timeline-year">2021 - 2023</div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-school">SMKN 8 Malang - RPL</div>
                            <div class="timeline-year">2023 - Berlanjut</div>
                        </div>
                    </div>
                </div>

                <!-- Skills -->
                <div class="info-section">
                    <h3>
                        <i class="fas fa-star"></i>
                        Keahlian & Minat
                    </h3>
                    <p class="about-text" style="margin-bottom: 20px;">
                        Saya memiliki minat dalam bidang Pengembangan web dan Web design. Beberapa keahlian saya diantaranya :
                    </p>
                    <div class="skills-grid">
                        <span class="skill-badge">
                            <i class="fas fa-pen-fancy"></i>
                            Technical Writing
                        </span>
                        <span class="skill-badge">
                            <i class="fas fa-code"></i>
                            HTML, CSS, JS
                        </span>
                        <span class="skill-badge">
                            <i class="fas fa-palette"></i>
                            UI/UX Design
                        </span>
                        <span class="skill-badge">
                            <i class="fas fa-lightbulb"></i>
                            Creative
                        </span>
                        <span class="skill-badge">
                            <i class="fas fa-rocket"></i>
                            Fast Learner
                        </span>
                        <span class="skill-badge">
                            <i class="fas fa-language"></i>
                            English
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>