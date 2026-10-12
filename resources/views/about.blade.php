@extends('layouts.app')

@section('content')
<!-- Header Banner -->
<div class="bg-primary text-white py-5 mb-5" style="background: linear-gradient(135deg, #0118d8 0%, #000836 100%);">
    <div class="container text-center">
        <h1 class="display-4 fw-bold mb-3">Tentang Karcis.in</h1>
        <p class="lead mb-0">Transformasi Digital Akses Event Masa Kini yang Ekonomis & Terpercaya</p>
    </div>
</div>

<div class="container mb-5">
    <!-- Section 1: Filosofi -->
    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <!-- GAMBAR ABOUT YANG DIUBAH -->
            <!-- Pastikan file 'about.jpg' ada di folder public/img -->
            <img src="{{ asset('img/about.jpg') }}" 
                 class="img-fluid rounded-4 shadow-lg w-100" 
                 alt="Tentang Karcisin"
                 style="object-fit: cover; height: 350px;"
                 onerror="this.src='https://via.placeholder.com/800x600?text=Gambar+About+Tidak+Ditemukan';">
        </div>
        <div class="col-md-6 ps-md-5 mt-4 mt-md-0">
            <h2 class="fw-bold text-primary mb-3">Siapa Kami?</h2>
            <p class="text-muted fs-5">
                <strong>Karcis.in</strong> adalah platform E-Ticketing inovatif karya anak bangsa. Nama kami berasal dari dua elemen:
            </p>
            <ul class="list-unstyled">
                <li class="mb-3">
                    <i class="bi bi-check-circle-fill text-primary me-2"></i>
                    <strong>"Karcis"</strong>: Melambangkan akses dan hak masuk yang familiar bagi masyarakat Indonesia, menjangkau semua kalangan tanpa sekat elit.
                </li>
                <li class="mb-3">
                    <i class="bi bi-check-circle-fill text-primary me-2"></i>
                    <strong>".in" (Dot In)</strong>: Simbol <em>Innovation</em> (Inovasi digital), <em>Indonesia</em> (Karya lokal), dan ajakan persuasif <em>"Ayo Masuk!"</em>.
                </li>
            </ul>
            <p class="text-muted">
                Kami hadir untuk mengubah selembar kertas konvensional menjadi data digital yang aman, cepat, dan mudah diakses oleh siapa saja.
            </p>
        </div>
    </div>

    <hr class="my-5 text-muted">

    <!-- Section 2: Visi Misi -->
    <div class="row text-center mb-5">
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm py-4">
                <div class="card-body">
                    <div class="display-4 text-primary mb-3"><i class="bi bi-rocket-takeoff"></i></div>
                    <h4 class="fw-bold">Visi Kami</h4>
                    <p class="text-muted">Menjadi ekosistem manajemen event digital nomor satu di lingkungan kampus dan komunitas lokal Indonesia.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm py-4">
                <div class="card-body">
                    <div class="display-4 text-primary mb-3"><i class="bi bi-lightbulb"></i></div>
                    <h4 class="fw-bold">Misi Kami</h4>
                    <p class="text-muted">Menghapus inefisiensi pendaftaran manual, mengurangi penggunaan kertas, dan mempercepat proses validasi tiket.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm py-4">
                <div class="card-body">
                    <div class="display-4 text-primary mb-3"><i class="bi bi-shield-check"></i></div>
                    <h4 class="fw-bold">Nilai Kami</h4>
                    <p class="text-muted">Ekonomis, Transparan, Cepat, dan Amanah dalam setiap transaksi tiket yang terjadi.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 3: Kontak -->
    <div class="bg-light rounded-4 p-5 text-center shadow-sm">
        <h3 class="fw-bold mb-4">Hubungi Tim Kami</h3>
        <div class="row justify-content-center">
            <div class="col-md-3 mb-3">
                <i class="bi bi-geo-alt fs-2 text-primary d-block mb-2"></i>
                <h6 class="fw-bold">Lokasi</h6>
                <p class="small text-muted">Bogor, Indonesia</p>
            </div>
            <div class="col-md-3 mb-3">
                <i class="bi bi-envelope fs-2 text-primary d-block mb-2"></i>
                <h6 class="fw-bold">Email</h6>
                <p class="small text-muted">support@karcis.in</p>
            </div>
            <div class="col-md-3 mb-3">
                <i class="bi bi-whatsapp fs-2 text-primary d-block mb-2"></i>
                <h6 class="fw-bold">WhatsApp</h6>
                <p class="small text-muted">+62 812-3456-7890</p>
            </div>
        </div>
    </div>
</div>
@endsection