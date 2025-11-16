<!-- FOOTER -->
<footer id="kontak">
    <!-- Floating Characters -->
     <img src="{{ asset('image/chibicadangan.png') }}" alt="Chibi Character" class="footer-character-left">
     <img src="{{ asset('image/chibi2.png') }}" alt="Chibi Character" class="footer-character-right">
    
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5>Akari Point Dropshipper</h5>
                <p style="color:#b0b0b0; line-height:1.7;">Menyediakan platform jual - beli barang nuansa jepang yang lengkap dan berkualitas.</p>
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
                <p style="color:#b0b0b0;">📧 info@akaripoint.com</p>
                <p style="color:#b0b0b0;">📞 +62 895 3603 22053</p>
                <p style="color:#b0b0b0;">📍 Jl. Merdeka No. 123, Malang</p>
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

<!-- ✅ STYLE FOOTER (versi warna kebalik) -->
<style>
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
  0%, 100% {
    transform: translateY(0) rotate(-2deg);
  }
  50% {
    transform: translateY(-15px) rotate(2deg);
  }
}

@keyframes floatRight {
  0%, 100% {
    transform: translateY(0) rotate(2deg);
  }
  50% {
    transform: translateY(-12px) rotate(-2deg);
  }
}

footer .container {
  position: relative;
  z-index: 3;
}

.footer-title {
  font-weight: 700;
  font-size: 1.1rem;
  margin-bottom: 18px;
  color: #ffffff;
  letter-spacing: 0.3px;
}

.footer-desc {
  color: rgba(255, 255, 255, 0.8);
  line-height: 1.8;
  font-size: 0.95rem;
  margin-top: 10px;
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

footer p {
  color: rgba(255, 255, 255, 0.8);
  font-size: 0.95rem;
  line-height: 1.8;
  margin-bottom: 8px;
}

.footer-bottom {
  border-top: 1px solid #404040;
  width: 80%;
  margin: 30px auto 0; /* biar center juga secara horizontal */
  padding-top: 20px;
  
  display: flex;
  justify-content: center; /* horizontal center */
  align-items: center;     /* vertical center */
  
  color: #888;
  text-align: center;
}

.footer-bottom small {
  color: rgba(255,255,255,0.7);
  font-size: 0.9rem;
  letter-spacing: 0.3px;
}

/* Responsive untuk chibi characters */
@media (max-width: 768px) {
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
}

@media (max-width: 576px) {
  .footer-character-left,
  .footer-character-right {
    width: 100px;
    opacity: 0.8;
  }
}
</style>