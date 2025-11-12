<?php 
$fileName = 'bootstrap-custom.css';
require 'components/header.php';  
?>

<div class="container py-5" style="margin-top: 80px;">
    <section>
        <h2 class="text-center fw-bold fs-1 mb-5">Apa Kata <span class="text-danger">Pelanggan</span> Kami?</h2>

        <div class="row justify-content-center mb-5">
            <div class="col-md-6 col-lg-4">
                <div class="card text-center border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h1 class="display-1 fw-bold text-danger mb-2">4.8</h1>
                        <div class="text-warning fs-3 mb-2">★★★★★</div>
                        <p class="text-muted mb-0">(Berdasarkan 289 Ulasan)</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start mb-3">
                            <img src="img/user.jpg" alt="User Avatar" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h4 class="fw-bold mb-0">Rangga Prawira</h4>
                                        <span class="badge bg-success">Verified Order</span>
                                    </div>
                                    <span class="text-muted">1 week ago</span>
                                </div>
                            </div>
                        </div>
                        
                        <h5 class="fw-bold mb-2">Rasa Klasik yang Selalu Juara!</h5>
                        <p class="text-muted mb-3">Indomie Goreng Special-nya selalu mantap, bumbunya pas, dan porsinya mengenyangkan. Pelayanan cepat dan ramah, sangat direkomendasikan untuk nongkrong.</p>
                        
                        <div class="d-flex align-items-center">
                            <span class="text-warning me-2">★★★★★</span>
                            <span class="fw-bold">5.0</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start mb-3">
                            <img src="img/user.jpg" alt="User Avatar" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h4 class="fw-bold mb-0">Siti Aisyah</h4>
                                        <span class="badge bg-success">Verified Order</span>
                                    </div>
                                    <span class="text-muted">1 month ago</span>
                                </div>
                            </div>
                        </div>
                        
                        <h5 class="fw-bold mb-2">Kuah Soto Terbaik di Malang!</h5>
                        <p class="text-muted mb-3">Kuah sotonya kaya rasa, toppingnya lengkap. Cuma butuh waktu sedikit lama saat ramai, tapi sepadan dengan rasanya.</p>
                        
                        <div class="d-flex align-items-center">
                            <span class="text-warning me-2">★★★★☆</span>
                            <span class="fw-bold">4.5</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start mb-3">
                            <img src="img/user.jpg" alt="User Avatar" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h4 class="fw-bold mb-0">Bima Sakti</h4>
                                        <span class="badge bg-success">Verified Order</span>
                                    </div>
                                    <span class="text-muted">2 days ago</span>
                                </div>
                            </div>
                        </div>
                        
                        <h5 class="fw-bold mb-2">Tempat Nongkrong Santai</h5>
                        <p class="text-muted mb-3">Roti Bakar Keju-nya enak, manis dan asinnya balance. Suasana tempatnya cozy, cocok buat nugas sambil ngopi susu.</p>
                        
                        <div class="d-flex align-items-center">
                            <span class="text-warning me-2">★★★★★</span>
                            <span class="fw-bold">5.0</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12 text-center">
                <button class="btn btn-outline-danger btn-lg px-5">Lihat Ulasan Sebelumnya</button>
            </div>
        </div>
        
    </section>
</div> 

<?php require 'components/footer.php';  ?>