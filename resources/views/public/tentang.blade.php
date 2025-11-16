@extends('layoutes.public.app')

@section('content')
<!-- ===== HERO SECTION ===== -->
<section class="about-hero">
  <div class="container text-center">
    <h1 class="fade-up">Tentang Akari Point</h1>
    <p class="fade-up delay-1">
      Titik terang untuk para pecinta Jepang — tempat di mana gaya, budaya, dan keunikan Jepang berpadu dalam setiap merchandise.
    </p>
  </div>
</section>

<!-- ===== CERITA KAMI ===== -->
<section class="about-story">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 fade-left">
        <img src="{{ asset('image/akari.png') }}" alt="Cerita Akari Point" class="img-fluid rounded-4 shadow-sm anime-img">
      </div>
      <div class="col-md-6 fade-right">
        <h2>Cerita Kami</h2>
        <p>
          Akari Point lahir dari kecintaan terhadap Jepang — dari anime, budaya pop, hingga seni klasik yang menenangkan. 
          Kami ingin menghadirkan pengalaman belanja merchandise Jepang yang autentik, modern, dan terpercaya bagi semua penggemar di Indonesia.
        </p>
        <p>
          Di sini, setiap produk bukan sekadar barang. Tapi potongan kecil dari dunia yang kamu cintai, dikurasi dengan perhatian dan rasa.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- ===== VISI DAN NILAI ===== -->
<section class="about-vision">
  <div class="container text-center">
    <h2 class="fade-up">Visi & Nilai Kami</h2>
    <p class="fade-up delay-1">
      Kami ingin menghadirkan dunia Jepang kecil untukmu — dari anime, merchandise, hingga pengalaman belanja yang hangat dan menyenangkan.
    </p>

    <div class="row mt-5 justify-content-center">
      <div class="col-md-4 fade-up delay-1">
        <div class="vision-card anime-card">
          <h5>🌸 本物 – Honmono</h5>
          <p>
            Setiap barang dipilih dengan cermat, menjaga keaslian dan detail khas Jepang agar kamu merasakan sentuhan dunia favoritmu.
          </p>
        </div>
      </div>
      <div class="col-md-4 fade-up delay-2">
        <div class="vision-card anime-card">
          <h5>💜 スタイリッシュ – Sutairisshu</h5>
          <p>
            Desain dan koleksi selalu mengikuti tren, tapi tetap membawa nuansa Jepang yang manis dan elegan di setiap produknya.
          </p>
        </div>
      </div>
      <div class="col-md-4 fade-up delay-3">
        <div class="vision-card anime-card">
          <h5>🕊️ 暖かい – Atatakai</h5>
          <p>
            Kami ingin setiap interaksi membuatmu nyaman dan senang, karena Akari Point lebih dari toko — ini komunitas pecinta Jepang.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== KATEGORI ANIME / GAMBAR ===== -->
<section class="anime-gallery">
  <div class="container">
    <div class="text-center mb-4">
      <h2 class="fade-up">Anime & Merch Keren</h2>
      <p class="fade-up delay-1">Temukan berbagai koleksi anime favoritmu di sini.</p>
    </div>

    <div class="anime-scroll fade-up delay-2">
      <div class="anime-card-horizontal">
        <img src="{{ asset('image/kimono1.png') }}" alt="Anime 1">
      </div>
      <div class="anime-card-horizontal">
        <img src="{{ asset('image/aksesoris.jpg') }}" alt="Anime 2">
      </div>
      <div class="anime-card-horizontal">
        <img src="{{ asset('image/diy.jpg') }}" alt="Anime 3">
      </div>
      <div class="anime-card-horizontal">
        <img src="{{ asset('image/action.jpg') }}" alt="Anime 4">
      </div>
       <div class="anime-card-horizontal">
        <img src="{{ asset('image/smartwatch.png') }}" alt="Anime 4">
      </div>
       <div class="anime-card-horizontal">
        <img src="{{ asset('image/tws.png') }}" alt="Anime 4">
      </div>
      
      <!-- Tambah lebih banyak gambar sesuai kategori -->
    </div>
  </div>
</section>
<!-- ===== PENUTUP / SELAMAT BERBELANJA ===== -->
<section class="about-closing fade-up">
  <div class="container text-center">
    <h2>🛍️ Selamat Berbelanja di Akari Point!</h2>
    <p class="jp-text">楽しいお買い物を！<br><span class="romaji">Tanoshii okaimono o!</span></p>
    <p class="subtext">Semoga belanjamu penuh kebahagiaan dan cahaya seperti namanya — Akari ✨</p>
  </div>
</section>

@endsection

<style>
/* ===== GENERAL ===== */
body {
  font-family: 'Poppins', sans-serif;
  color: #333;
  background-color: #faf7ff;
}
/* ===== PENUTUP ===== */
.about-closing {
  background: linear-gradient(135deg, #f9f0ff 0%, #fdefff 100%);
  padding: 80px 0;
  border-radius: 40px 40px 0 0;
  color: #4a3d75;
  margin-top: 50px;
}
.about-closing h2 {
  font-weight: 700;
  font-size: 2rem;
  margin-bottom: 20px;
}
.jp-text {
  font-family: 'Noto Sans JP', sans-serif;
  font-size: 1.8rem;
  color: #6a3d85;
  margin-bottom: 10px;
}
.jp-text .romaji {
  display: block;
  font-size: 1rem;
  color: #a184c8;
}
.subtext {
  color: #555;
  font-size: 1rem;
  margin-top: 10px;
}

/* ===== HERO ===== */
.about-hero {
  background: linear-gradient(135deg, #f2dfff 0%, #f9f0ff 100%);
  padding: 100px 0 80px;
  color: #3a2d5f;
  text-align: center;
  border-radius: 0 0 50px 50px;
}
.about-hero h1 {
  font-size: 2.8rem;
  font-weight: 700;
}
.about-hero p {
  font-size: 1.1rem;
  max-width: 700px;
  margin: 20px auto 0;
  line-height: 1.8;
}

/* ===== STORY ===== */
.about-story {
  padding: 100px 0;
}
.about-story h2 {
  color: #4a3d75;
  font-weight: 700;
  margin-bottom: 20px;
}
.about-story p {
  color: #555;
  line-height: 1.8;
}
.anime-img {
  border: 3px solid #f0e1ff;
  width: 300px;      /* tentukan ukuran tetap */
  height: 300px;     /* tinggi sama dengan lebar */
  object-fit: cover; /* biar gambar penuh dalam lingkaran */
  margin: 0 auto;
  display: block;
  border-radius: 50%; /* bikin bundar */
}



/* ===== VISI ===== */
.vision-card {
  background: #fff;
  border-radius: 25px;
  padding: 30px 25px; /* lebih lega */
  margin-bottom: 30px;
  box-shadow: 0 4px 20px rgba(0,0,0,0.05);
  transition: all 0.3s;
}
.vision-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 25px rgba(0,0,0,0.08);
}
.vision-card h5 {
  color: #6a3d85;
  font-weight: 600;
  font-size: 1.2rem;
  margin-bottom: 12px;
}
.vision-card p {
  font-size: 1rem;
  color: #555;
  line-height: 1.6; /* lebih “nafas” */
}
.vision-card:nth-child(1) { background: #fff0f7; }
.vision-card:nth-child(2) { background: #f0f0ff; }
.vision-card:nth-child(3) { background: #fffaf0; }

/* ===== ANIME SCROLL ===== */
.anime-gallery {
  padding: 80px 0;
  background-color: #f9f0ff;
}
.anime-scroll {
  display: flex;
  overflow-x: auto;
  gap: 20px;
  padding-bottom: 10px;
  scroll-behavior: smooth;
}
.anime-card-horizontal {
  max-width: 250px;
  flex: 0 0 auto;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 4px 15px rgba(0,0,0,0.05);
  transition: transform 0.3s, box-shadow 0.3s;
}
.anime-card-horizontal img {
  width: 100%;
  height: auto;
  display: block;
}
.anime-card-horizontal:hover {
  transform: scale(1.05);
  box-shadow: 0 8px 25px rgba(0,0,0,0.08);
}

/* ===== ANIMATIONS ===== */
.fade-up { opacity: 0; transform: translateY(30px); animation: fadeUp 0.8s ease forwards; }
.fade-left { opacity: 0; transform: translateX(-30px); animation: fadeLeft 0.8s ease forwards; }
.fade-right { opacity: 0; transform: translateX(30px); animation: fadeRight 0.8s ease forwards; }
.delay-1 { animation-delay: 0.2s; }
.delay-2 { animation-delay: 0.4s; }
.delay-3 { animation-delay: 0.6s; }
.delay-4 { animation-delay: 0.8s; }

@keyframes fadeUp { to { opacity: 1; transform: translateY(0); } }
@keyframes fadeLeft { to { opacity: 1; transform: translateX(0); } }
@keyframes fadeRight { to { opacity: 1; transform: translateX(0); } }
</style>
