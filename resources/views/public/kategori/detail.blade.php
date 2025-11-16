@extends('layoutes.public.app')

@section('content')
<style>
/* 🌸 GENERAL */
body {
  font-family: 'Poppins', sans-serif;
  background-color: #f8f6ff;
  color: #2d2d2d;
}

/* 🌸 BACK BUTTON */
.back-button-wrapper {
  margin-bottom: 30px;
}
.back-button {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 12px 24px;
  background: white;
  color: #8c6cff;
  border: 2px solid #8c6cff;
  border-radius: 12px;
  font-weight: 600;
  transition: all 0.3s ease;
  text-decoration: none;
}
.back-button:hover {
  background: #8c6cff;
  color: white;
  transform: translateX(-4px);
  box-shadow: 0 4px 16px rgba(140, 108, 255, 0.3);
}

/* 🌸 DETAIL GRID */
.detail-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 30px;
  margin-bottom: 40px;
}
@media (max-width: 1024px) {
  .detail-grid { grid-template-columns: 1fr; }
}

/* 🌸 LEFT COLUMN */
.left-column { display: flex; flex-direction: column; gap: 20px; }

/* 🌸 MENU IMAGE */
.menu-image-container {
  width: 100%;
  height: 320px;
  overflow: hidden;
  border-radius: 20px;
  background: linear-gradient(135deg, #d8c4ff 0%, #ede4ff 100%);
}
.menu-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}
.menu-image:hover { transform: scale(1.05); }

/* 🌸 MENU INFO */
.menu-info {
  background: white;
  padding: 25px;
  border-radius: 20px;
  box-shadow: 0 4px 16px rgba(140, 108, 255, 0.1);
}
.menu-title {
  font-size: 1.8rem;
  font-weight: 700;
  color: #2d2d2d;
  margin-bottom: 16px;
}
.menu-meta {
  display: flex;
  gap: 20px;
  margin-bottom: 16px;
}
.meta-item { display: flex; align-items: center; gap: 6px; color: #666; font-size: 0.95rem; }
.meta-item.price { color: #8c6cff; font-weight: 700; font-size: 1.2rem; }

/* 🌸 DESCRIPTION */
.menu-description { font-size: 1rem; color: #555; line-height: 1.6; margin-bottom: 20px; }

/* 🌸 INGREDIENTS */
.ingredients-section { margin-top: 20px; }
.section-subtitle {
  display: flex; align-items: center; gap: 8px;
  font-weight: 600; color: #2d2d2d; margin-bottom: 12px;
}
.ingredients-list {
  list-style: none; padding: 0; margin: 0;
  display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;
}
.ingredients-list li {
  background: #fff; padding: 10px 14px;
  border-radius: 12px; color: #555; font-size: 0.95rem;
  border: 1px solid rgba(140,108,255,0.2);
  transition: all 0.2s ease;
}
.ingredients-list li:hover { background: #f3eaff; }

/* 🌸 RIGHT COLUMN: REVIEWS */
.right-column { display: flex; flex-direction: column; }
.reviews-list {
  background: white;
  border-radius: 20px;
  padding: 25px;
  box-shadow: 0 4px 16px rgba(140,108,255,0.1);
  display: flex; flex-direction: column;
}
.review-title { font-weight: 600; margin-bottom: 20px; color: #2d2d2d; }
.review-items { display: flex; flex-direction: column; gap: 12px; max-height: 400px; overflow-y: auto; }
.review-card {
  padding: 16px; border-radius: 12px;
  background: #f8f6ff; border: 1px solid rgba(140,108,255,0.2);
  transition: all 0.2s ease;
}
.review-card:hover {
  box-shadow: 0 4px 16px rgba(140,108,255,0.2);
  border-color: #8c6cff;
}
.reviewer-name { font-weight: 600; color: #2d2d2d; }
.review-comment { color: #555; font-size: 0.95rem; line-height: 1.5; }

/* 🌸 WRITE REVIEW FORM */
.review-form { display: flex; flex-direction: column; gap: 16px; }
.form-group { display: flex; flex-direction: column; gap: 6px; }
.form-label { font-weight: 600; color: #2d2d2d; font-size: 0.95rem; }
.form-input, .form-textarea, .form-select {
  width: 100%; padding: 12px 14px; border-radius: 12px; border: 1px solid rgba(140,108,255,0.3);
  box-shadow: 0 2px 8px rgba(140,108,255,0.05);
  font-family: inherit; font-size: 0.95rem; transition: all 0.2s ease;
}
.form-input:focus, .form-textarea:focus, .form-select:focus {
  outline: none; border-color: #8c6cff;
  box-shadow: 0 0 6px rgba(140,108,255,0.3);
}
.form-textarea { min-height: 100px; resize: vertical; }
.submit-button {
  background: #8c6cff;
  color: white;
  padding: 12px 28px;
  border-radius: 12px;
  border: none;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
}
.submit-button:hover {
  background: #a88bff;
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(140,108,255,0.3);
}

/* 🌸 RESPONSIVE */
@media (max-width: 768px) {
  .detail-grid { grid-template-columns: 1fr; }
  .ingredients-list { grid-template-columns: 1fr; }
}
</style>
<title>Akari Point</title>
<section class="detail-section">
  <div class="container">
    <!-- Back Button -->
    <div class="back-button-wrapper">
      <a href="{{ route('menu.public') }}" class="back-button">← Kembali ke Menu</a>
    </div>

    <div class="detail-grid">
      <!-- LEFT: Image & Info -->
      <div class="left-column">
        <div class="menu-image-container">
          <img src="{{ $menu->foto ? asset('storage/foto_menu/'.$menu->foto) : asset('storage/foto_menu/nophoto.jpg') }}" 
               alt="{{ $menu->nama_menu }}" class="menu-image">
        </div>

        <div class="menu-info">
          <h1 class="menu-title">{{ $menu->nama_menu }}</h1>
          <div class="menu-meta">
            <div class="meta-item">{{ $menu->kategori->nama_kategori }}</div>
            <div class="meta-item price">Rp {{ number_format($menu->harga,0,',','.') }}</div>
          </div>
          <p class="menu-description">{{ $menu->deskripsi }}</p>

          <div class="ingredients-section">
            <h2 class="section-subtitle">Bahan-Bahan</h2>
            <ul class="ingredients-list">
              @foreach($menu->bahans as $bahan)
                <li>{{ $bahan->nama_bahan }}</li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>

      <!-- RIGHT: Reviews -->
      <div class="right-column">
        <div class="reviews-list">
          <h2 class="review-title">Ulasan Pengguna</h2>

          @if($menu->ulasan->count() > 0)
            <div class="review-items">
              @foreach($menu->ulasan as $u)
                <div class="review-card">
                  <div class="reviewer-name">{{ $u->nama ?? 'Anonim' }}</div>
                  <p class="review-comment">{{ $u->komentar }}</p>
                </div>
              @endforeach
            </div>
          @else
            <p class="text-muted">Belum ada ulasan.</p>
          @endif
        </div>
      </div>
    </div>

    <!-- Write Review -->
   <!-- Bottom: Write Review Form -->
<div class="write-review-section">
    <div class="write-review">
        <h2 class="review-title">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
            </svg>
            Tulis Ulasan Anda
        </h2>

        <form action="{{ route('ulasan.store') }}" method="POST" class="review-form">
            @csrf
            <input type="hidden" name="menu_id" value="{{ $menu->id }}">

            <!-- Row: Rating & Nama -->
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Rating</label>
                    <select name="rating" class="form-select" required>
                        <option value="">-- Pilih Rating --</option>
                        <option value="5">⭐⭐⭐⭐⭐ Sangat Enak</option>
                        <option value="4">⭐⭐⭐⭐ Enak</option>
                        <option value="3">⭐⭐⭐ Biasa Aja</option>
                        <option value="2">⭐⭐ Kurang</option>
                        <option value="1">⭐ Gak Suka</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Nama (Opsional)</label>
                    <input type="text" name="nama" class="form-input" placeholder="Nama Anda">
                </div>
            </div>

            <!-- Textarea untuk komentar -->
            <div class="form-group">
                <label class="form-label">Ulasan</label>
                <textarea name="komentar" class="form-textarea" placeholder="Ceritakan pengalaman Anda dengan hidangan ini..." required></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="submit-button">
                <span>Kirim Ulasan</span>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/>
                </svg>
            </button>
        </form>
    </div>
</div>
