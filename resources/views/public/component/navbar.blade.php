<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="/">AkariPoint.com</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav" style="border:none;">
      <span style="font-size:1.5rem; color:#305373;">☰</span>
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

<!-- ✅ MODAL LOGIN -->
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
            <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
          </div>
          <button type="submit" class="btn-primary-custom w-100">Masuk</button>
        </form>
      </div>
    </div>
  </div>
</div>

@if(session('openLoginModal'))
<script>
  var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
  loginModal.show();
</script>
@endif

<!-- ✅ STYLE NAVBAR + MODAL -->
<style>
/* Font dan reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body {
  font-family: 'Poppins', sans-serif;
  color: #2d2d2d;
}

/* Navbar - clean & elegan */
.navbar {
  background-color: #fff;
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

/* Tombol login */
.btn-login {
  background-color: #fff;
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
  color: white;
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(107,79,51,0.3);
}

/* Tombol submit modal */
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

/* Modal styling */
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
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
