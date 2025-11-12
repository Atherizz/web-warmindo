<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
  $_SESSION['error'] = '⚠️ Silakan login terlebih dahulu untuk mengakses keranjang belanja!';
  header('Location: index.php');
  exit;
}

if (!isset($_SESSION['role']) || strtoupper(trim($_SESSION['role'])) !== 'USER') {
  $_SESSION['error'] = '❌ Akses ditolak: halaman ini khusus untuk pengguna dengan role USER.';
  header('Location: index.php');
  exit;
}

$fileName = 'bootstrap-custom.css';
require 'components/header.php';
?>

<div class="container py-5" style="margin-top: 80px;">
    <section>
        <h2 class="text-center fw-bold fs-1 mb-2"><span class="text-danger">Menu</span> Spesial</h2>
        <p class="text-center text-muted mb-5">Pilih menu favoritmu dan tambahkan ke keranjang</p>

        <div class="row g-4">
            
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm position-relative">
                    <span class="badge bg-danger position-absolute top-0 start-0 m-3">Popular</span>
                    <img src="img/indomiefix.png" alt="Indomie Goreng" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h3 class="card-title fw-bold fs-5">Indomie Goreng Special</h3>
                        <p class="card-text text-muted">Indomie Goreng dengan tambahan telur mata sapi, sayuran, dan bakso.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-danger fw-bold fs-5">IDR 15K</span>
                            <button class="btn btn-danger btn-sm rounded-circle" style="width: 40px; height: 40px;">
                                <i data-feather="plus" style="width: 18px; height: 18px;"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="img/indomiefix.png" alt="Indomie Kuah Kari" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h3 class="card-title fw-bold fs-5">Indomie Kuah Kari Ayam</h3>
                        <p class="card-text text-muted">Kuah kari kental, ayam suwir, dan perasan jeruk limau segar.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-danger fw-bold fs-5">IDR 14K</span>
                            <button class="btn btn-danger btn-sm rounded-circle" style="width: 40px; height: 40px;">
                                <i data-feather="plus" style="width: 18px; height: 18px;"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm position-relative">
                    <span class="badge bg-success position-absolute top-0 start-0 m-3">Diskon 10%</span>
                    <img src="img/indomiefix.png" alt="Roti Bakar Keju" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h3 class="card-title fw-bold fs-5">Roti Bakar Keju Meleleh</h3>
                        <p class="card-text text-muted">Roti bakar lembut dengan isian keju cheddar dan mozzarella.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-danger fw-bold fs-5">IDR 11.7K</span>
                                <span class="text-muted text-decoration-line-through ms-2">IDR 13K</span>
                            </div>
                            <button class="btn btn-danger btn-sm rounded-circle" style="width: 40px; height: 40px;">
                                <i data-feather="plus" style="width: 18px; height: 18px;"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="img/indomiefix.png" alt="Nasi Goreng" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h3 class="card-title fw-bold fs-5">Nasi Goreng Kampung</h3>
                        <p class="card-text text-muted">Nasi goreng pedas dengan ayam, telur orak-arik, dan kerupuk udang.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-danger fw-bold fs-5">IDR 18K</span>
                            <button class="btn btn-danger btn-sm rounded-circle" style="width: 40px; height: 40px;">
                                <i data-feather="plus" style="width: 18px; height: 18px;"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm position-relative">
                    <span class="badge bg-danger position-absolute top-0 start-0 m-3">Best Seller</span>
                    <img src="img/indomiefix.png" alt="Es Teh Manis" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h3 class="card-title fw-bold fs-5">Es Teh Manis Jumbo</h3>
                        <p class="card-text text-muted">Minuman wajib, teh segar dengan es batu melimpah.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-danger fw-bold fs-5">IDR 6K</span>
                            <button class="btn btn-danger btn-sm rounded-circle" style="width: 40px; height: 40px;">
                                <i data-feather="plus" style="width: 18px; height: 18px;"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="img/indomiefix.png" alt="Kopi Susu" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h3 class="card-title fw-bold fs-5">Kopi Susu Hangat</h3>
                        <p class="card-text text-muted">Perpaduan kopi hitam dan susu kental yang pas.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-danger fw-bold fs-5">IDR 12K</span>
                            <button class="btn btn-danger btn-sm rounded-circle" style="width: 40px; height: 40px;">
                                <i data-feather="plus" style="width: 18px; height: 18px;"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
</div> 
<?php 
$jsName = 'cart.js';
require 'components/footer.php';  ?>