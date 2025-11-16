@extends('layoutes.public.app')
<style>
/* Container Utama */
.container-fluid.px-4 {
    padding-top: 2rem;
    padding-bottom: 3rem;
    background-color: #fafafa;
}

/* Header Section */
.header-section {
    text-align: center;
    margin-bottom: 3rem;
    padding: 2rem 0;
}

.header-section h1 {
    font-size: 2.5rem;
    font-weight: 800;
    color: #2d2d2d;
    margin-bottom: 0.5rem;
}

.header-section h1 .highlight {
    color: #305373;
}

.header-section p {
    font-size: 1.1rem;
    color: #666;
    margin: 0;
}

/* Form Card */
.form-card {
    background: #ffffff;
    border-radius: 16px;
    padding: 2.5rem;
    transition: all 0.3s ease;
    height: 100%;
    border: 1px solid rgba(48, 83, 115, 0.3);
    border-radius: 8px;
    box-shadow: 0 0 14px rgba(48, 83, 115, 0.25);
    transition: box-shadow 0.3s ease-in-out;
}

.form-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 35px rgba(48, 83, 115, 0.3);
}

.form-card h3 {
    font-size: 1.8rem;
    font-weight: 700;
    color: #305373;
    margin-bottom: 1.5rem;
}

/* Form Controls */
.form-label {
    font-weight: 600;
    color: #2d2d2d;
    margin-bottom: 8px;
}

.form-control {
    border: 2px solid #e8e8e8;
    border-radius: 10px;
    padding: 12px 15px;
    font-size: 1rem;
    transition: all 0.3s;
    font-family: 'Poppins', sans-serif;
}

.form-control:focus {
    border-color: #305373;
    box-shadow: 0 0 0 3px rgba(48, 83, 115, 0.1);
    outline: none;
}

.form-control::placeholder {
    color: #adb5bd;
}

/* Button Send */
.btn-send {
    background-color: #305373;
    border: none;
    color: white;
    padding: 14px 35px;
    font-size: 1rem;
    font-weight: 600;
    border-radius: 10px;
    transition: all 0.3s;
}

.btn-send:hover {
    background-color: #1f415c;
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(48, 83, 115, 0.4);
    color: white;
}

.btn-send:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none;
}

/* Contact Card */
.contact-card {
    background: linear-gradient(135deg, #cdb5f5 0%, #e5d8fb 100%);
    border-radius: 16px;
    padding: 2.5rem;
    box-shadow: 0 12px 35px rgba(0,0,0,0.08);
    height: 100%;
    color: #2d2d2d;
    position: relative;
    overflow: hidden;
}

.contact-card::before {
    content: "";
    position: absolute;
    top: -50%;
    right: -10%;
    width: 300px;
    height: 300px;
    background: rgba(255,255,255,0.15);
    border-radius: 50%;
}

.contact-card .section-title {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 2rem;
    color: #305373;
    position: relative;
    z-index: 2;
}

/* Contact Item */
.contact-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 1.5rem;
    padding: 1.5rem;
    background: rgba(255, 255, 255, 0.4);
    border-radius: 12px;
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
    position: relative;
    z-index: 2;
}

.contact-item:hover {
    background: rgba(255, 255, 255, 0.6);
    transform: translateX(5px);
}

.contact-item:last-child {
    margin-bottom: 0;
}

/* Contact Icon */
.contact-icon {
    width: 50px;
    height: 50px;
    background: rgba(48, 83, 115, 0.2);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 1.25rem;
    flex-shrink: 0;
}

.contact-icon i {
    font-size: 1.4rem;
    color: #305373;
}

/* Contact Info */
.contact-info {
    flex: 1;
}

.contact-label {
    font-size: 0.85rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 0.5rem;
    color: #305373;
    opacity: 0.9;
}

.contact-value {
    font-size: 1.05rem;
    margin: 0;
    font-weight: 500;
    line-height: 1.5;
    color: #2d2d2d;
}

.contact-value a {
    color: #305373;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-block;
    font-weight: 600;
}

.contact-value a:hover {
    transform: translateX(3px);
    opacity: 0.8;
}

/* Responsive Design */
@media (max-width: 991.98px) {
    .header-section h1 {
        font-size: 2rem;
    }
    
    .header-section p {
        font-size: 1rem;
    }
    
    .form-card,
    .contact-card {
        padding: 2rem;
        margin-bottom: 2rem;
    }
    
    .form-card h3,
    .contact-card .section-title {
        font-size: 1.5rem;
    }
}

@media (max-width: 768px) {
    .container-fluid.px-4 {
        padding-left: 1rem !important;
        padding-right: 1rem !important;
    }
    
    .header-section {
        margin-bottom: 2rem;
        padding: 1rem 0;
    }
    
    .header-section h1 {
        font-size: 1.8rem;
    }
    
    .form-card,
    .contact-card {
        padding: 1.5rem;
    }
    
    .contact-icon {
        width: 45px;
        height: 45px;
    }
    
    .contact-icon i {
        font-size: 1.2rem;
    }
    
    .contact-item {
        padding: 1.25rem;
    }
}
</style>
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="container mt-5">
                <!-- Header -->
              <div class="header-section">
    <h1>ようこそ！<span class="highlight"> Mari Berkenalan</span></h1>
    <p class="mt-2">Selangkah lebih dekat dengan kami. <br> 
    Bersama, mari wujudkan kolaborasi yang bermakna — <em>Issho ni, mirai e.</em></p>
</div>


                <div class="row g-4">
                    <!-- Kolom Kiri: Form Contact -->
                    <div class="col-lg-6">
                        <div class="form-card">
                            <h3>Kirimkan Pesan Anda</h3>
                            <form id="contactForm" action="https://script.google.com/macros/s/AKfycbwT0ES9z2gtt5fPygmPE5AAKthTSFh16nB5uhYKa-4DBU5K_W0WjGF3zIK8r4WOB_9f/exec" method="POST">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="contoh@email.com" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="5" placeholder="Masukkan pesan anda..." required></textarea>
                                </div>
                                
                                <button type="submit" class="btn-send w-100">
                                    <i class="fas fa-paper-plane me-2"></i>
                                    Kirim Pesan
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Kolom Kanan: Contact Info -->
                    <div class="col-lg-6">
                        <div class="contact-card">
                            <h3 class="section-title">Informasi Kontak</h3>
                            
                            <!-- Email -->
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="contact-info">
                                    <div class="contact-label">Email Tim</div>
                                    <p class="contact-value">
                                        <a href="mailto:keisyacayadewi@gmail.com">akaripointdp@gmail.com
                                    </p>
                                </div>
                            </div>

                            <!-- Tiktok -->
                            <div class="contact-item">
                                <div class="contact-icon">
                                   <i class="fab fa-tiktok"></i>
                                </div>
                                <div class="contact-info">
                                    <div class="contact-label">Tiktok</div>
                                    <p class="contact-value">
                                        <a href="https://instagram.com/Keisya_AC" target="_blank">@Keisya_AC</a>
                                    </p>
                                </div>
                            </div>

                            <!-- WhatsApp -->
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fab fa-whatsapp"></i>
                                </div>
                                <div class="contact-info">
                                    <div class="contact-label">WhatsApp Tim</div>
                                    <p class="contact-value">
                                        <a href="https://wa.me/6285360322053" target="_blank">0895360322053</a>
                                    </p>
                                </div>
                            </div>

                            <!-- LinkedIn -->
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-globe"></i>
                                </div>
                                <div class="contact-info">
                                    <div class="contact-label">Website Resmi</div>
                                    <p class="contact-value">
                                        <a href="https://wa.me/6285360322053" target="_blank">AkariPointDP.com</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="text-center mt-5" style="color:#999;font-size:0.9rem;">
    <em>「誠意・信頼・共創」– Keikaku o, tomoni. <br> (Integritas, Kepercayaan, dan Kolaborasi)</em>
</p>

    </main>
</div>

<script>
const form = document.getElementById('contactForm');

form.addEventListener('submit', function(e) {
    e.preventDefault();

    const submitButton = form.querySelector('button[type="submit"]');
    submitButton.disabled = true;
    submitButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Sending...';

    fetch(form.action, {
        method: 'POST',
        body: new FormData(form)
    })
    .then(response => {
        // ✅ popup sukses
        Swal.fire({
            icon: 'success',
            title: 'Message Sent!',
            text: 'Thank you! Your message has been sent successfully.',
            confirmButtonColor: '#305373'
        });

        form.reset();
        submitButton.disabled = false;
        submitButton.innerHTML = '<i class="fas fa-paper-plane me-2"></i> Kirim Pesan';
    })
    .catch(error => {
        // ❌ popup error
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong! Please try again later.',
            confirmButtonColor: '#d33'
        });

        submitButton.disabled = false;
        submitButton.innerHTML = '<i class="fas fa-paper-plane me-2"></i> Kirim Pesan';
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection