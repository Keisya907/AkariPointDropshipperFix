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

/* 🌸 IMAGE */
.product-image-container {
  width: 100%;
  height: 500px;
  overflow: hidden;
  border-radius: 20px;
  background: linear-gradient(135deg, #d8c4ff 0%, #ede4ff 100%);
}
.product-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}
.product-image:hover { transform: scale(1.05); }

/* 🌸 INFO CARD */
.product-info {
  background: white;
  padding: 25px;
  border-radius: 20px;
  box-shadow: 0 4px 16px rgba(140, 108, 255, 0.1);
}
.product-title {
  font-size: 1.8rem;
  font-weight: 700;
  color: #2d2d2d;
  margin-bottom: 16px;
}
.product-meta {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  margin-bottom: 16px;
}
.meta-item { color: #555; font-size: 0.95rem; }
.meta-item.price {
  color: #8c6cff;
  font-weight: 700;
  font-size: 1.3rem;
}

/* 🌸 DESCRIPTION - INI YANG DIPERBAIKI */
.product-description {
  font-size: 1rem;
  color: #555;
  line-height: 1.8;
  margin-bottom: 20px;
  white-space: pre-line; /* ✅ BIAR ENTER KEBACA */
  background-color: #f9f9f9;
  padding: 16px;
  border-radius: 12px;
  border-left: 4px solid #8c6cff;
}

/* 🌸 BUTTONS */
.btn-buy {
  display: inline-block;
  background: #8c6cff;
  color: white;
  border: none;
  padding: 12px 28px;
  font-weight: 600;
  border-radius: 12px;
  text-decoration: none;
  transition: all 0.3s ease;
}
.btn-buy:hover {
  background: #a88bff;
  box-shadow: 0 4px 12px rgba(140,108,255,0.3);
  transform: translateY(-2px);
}

/* 🌸 WRITE REVIEW */
.write-review-section {
  margin-top: 60px;
  background: white;
  padding: 30px;
  border-radius: 20px;
  box-shadow: 0 4px 16px rgba(140,108,255,0.1);
}
.review-title {
  font-weight: 700;
  font-size: 1.3rem;
  color: #2d2d2d;
  display: flex;
  align-items: center;
  gap: 8px;
  margin-bottom: 20px;
}
.review-form {
  display: flex;
  flex-direction: column;
  gap: 16px;
}
.form-group {
  display: flex;
  flex-direction: column;
  gap: 6px;
}
.form-label {
  font-weight: 600;
  color: #2d2d2d;
  font-size: 0.95rem;
}
.form-input, .form-textarea, .form-select {
  width: 100%;
  padding: 12px 14px;
  border-radius: 12px;
  border: 1px solid rgba(140,108,255,0.3);
  box-shadow: 0 2px 8px rgba(140,108,255,0.05);
  font-family: inherit;
  font-size: 0.95rem;
  transition: all 0.2s ease;
}
.form-input:focus, .form-textarea:focus, .form-select:focus {
  outline: none;
  border-color: #8c6cff;
  box-shadow: 0 0 6px rgba(140,108,255,0.3);
}
.form-textarea {
  min-height: 100px;
  resize: vertical;
}
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

@media (max-width: 768px) {
  .detail-grid { grid-template-columns: 1fr; }
}
</style>

<section class="detail-section">
  <div class="container">
    <!-- Back Button -->
    <div class="back-button-wrapper">
      <a href="{{ route('kategori.public') }}" class="back-button">← Kembali ke Produk</a>
    </div>

    <!-- DETAIL -->
    <div class="detail-grid">
      <!-- LEFT: Image -->
      <div class="left-column">
        <div class="product-image-container">
          <img src="{{ $product->foto ? asset('storage/' . $product->foto) : asset('images/nophoto.jpg') }}"
               alt="{{ $product->nama_produk }}"
               class="product-image">
        </div>
      </div>

      <!-- RIGHT: Info -->
      <div class="right-column">
        <div class="product-info">
          <h1 class="product-title">{{ $product->nama_produk }}</h1>

          <div class="product-meta">
            <div class="meta-item price">Rp {{ number_format($product->harga, 0, ',', '.') }}</div>
            <div class="meta-item"><strong>Kategori:</strong> {{ $product->category->nama_kategori ?? '-' }}</div>
            <div class="meta-item"><strong>Stok:</strong> {{ $product->stok }}</div>
          </div>

          <p class="product-description">
            {{ $product->deskripsi ?? 'Tidak ada deskripsi untuk produk ini.' }}
          </p>

          @if($product->link)
    <a href="{{ $product->link }}"
       class="btn-buy"
       target="_blank"
       rel="noopener noreferrer">
        🛒 Beli Sekarang
    </a>
@else
    <button class="btn-buy" style="opacity: 0.6; cursor: not-allowed;" disabled>
        🛒 Link tidak tersedia
    </button>
@endif


        </div>
      </div>
    </div>

   

  </div>
</section>
<script>
document.addEventListener("DOMContentLoaded", function() {
  const form = document.getElementById('review-form');
  const reviewList = document.getElementById('review-list');

  form.addEventListener('submit', function(e) {
    e.preventDefault(); // biar gak reload

    const formData = new FormData(form);

    fetch(form.action, {
  method: 'POST',
  headers: {
    'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value
  },
  body: formData
})
.then(response => response.json())
.then(data => {
  if (data.success) {
    const newReview = document.createElement('div');
    newReview.classList.add('review-item');
    newReview.style.marginBottom = '16px';
    newReview.style.padding = '16px';
    newReview.style.background = '#f9f9ff';
    newReview.style.borderRadius = '12px';
    newReview.innerHTML = `
      <div><strong>${data.review.nama || 'Anonim'}</strong></div>
      <div>⭐ ${data.review.rating}/5</div>
      <p>${data.review.comment}</p>
    `;
    document.getElementById('review-list').appendChild(newReview);
    form.reset();
  } else {
    alert('Gagal menambahkan ulasan.');
  }
})
.catch(err => console.error('Error:', err));

  });
});
</script>

@endsection