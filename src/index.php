<?php
session_start();
require 'function/function.php';

$sql = 'SELECT name, price, image_url FROM menu_items ORDER BY id';
$result = pg_query($conn, $sql);
if (!$result) {
  die('Query gagal: ' . pg_last_error($conn));
}
$menuItems = pg_fetch_all($result) ?: [];

$fileName = 'bootstrap-custom.css';
require 'components/header.php';
?>

<!-- Alert Messages -->
<?php if (isset($_SESSION['error'])): ?>
<div class="position-fixed top-0 end-0 p-3" style="z-index: 11000; margin-top: 80px;">
    <div class="alert alert-danger alert-dismissible fade show shadow-lg" role="alert" id="alertMessage">
        <div class="d-flex align-items-center">
            <i data-feather="alert-circle" class="me-2"></i>
            <span><?= htmlspecialchars($_SESSION['error']) ?></span>
            <button type="button" class="btn-close ms-auto" onclick="closeAlert()"></button>
        </div>
    </div>
</div>
<?php unset($_SESSION['error']); endif; ?>

<?php if (isset($_SESSION['success'])): ?>
<div class="position-fixed top-0 end-0 p-3" style="z-index: 11000; margin-top: 80px;">
    <div class="alert alert-success alert-dismissible fade show shadow-lg" role="alert" id="alertMessage">
        <div class="d-flex align-items-center">
            <i data-feather="check-circle" class="me-2"></i>
            <span><?= htmlspecialchars($_SESSION['success']) ?></span>
            <button type="button" class="btn-close ms-auto" onclick="closeAlert()"></button>
        </div>
    </div>
</div>
<?php unset($_SESSION['success']); endif; ?>

<!-- Hero Section -->
<section class="hero d-flex align-items-center" id="home" style="min-height: 100vh; background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 1)), url('img/indomie.jpg'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="display-3 fw-bold mb-3">Nikmati Kenikmatan <span class="text-danger">Indomie</span> Setiap Suapan</h1>
                <p class="lead fs-4 mb-4">Indomie Hangat, Cita Rasa Khas, Harga Bersahabat!</p>
                <a href="cart.php" class="btn btn-danger btn-lg px-5 py-3">Pesan Sekarang & Rasakan Sensasinya!</a>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-5">
    <div class="container py-5">
        <h2 class="text-center mb-5 fw-bold fs-1"><span class="text-danger">About</span> Us</h2>
        <div class="row align-items-center g-4">
            <div class="col-lg-6">
                <img src="img/indomie1.jpg" alt="About Us" class="img-fluid rounded-3 shadow">
            </div>
            <div class="col-lg-6">
                <h3 class="fw-bold mb-3 fs-2">Apa yang berbeda dari <span class="text-danger">Warmindo</span> <span class="text-success">MASBRO?</span></h3>
                <p class="fs-6 lh-lg">Selamat datang di Warmindo MASBRO, tempat di mana kelezatan dan keunikan bertemu!
                    Apa yang membedakan kami dari tempat lain? Kami menyajikan hidangan dengan cita rasa autentik dan
                    bahan-bahan segar yang dipilih secara hati-hati. Dari bumbu khas yang memanjakan lidah hingga resep rahasia
                    yang membuat setiap suapan istimewa, Warmindo MASBRO menawarkan pengalaman kuliner yang tak tertandingi.</p>
                <p class="fs-6 lh-lg">Nikmati suasana hangat dan pelayanan ramah kami, dan rasakan perbedaan yang membuat setiap kunjungan menjadi momen berharga.
                    Ayo, cicipi kelezatan yang membedakan kami dan jadikan setiap hidangan sebagai kenangan tak terlupakan!</p>
            </div>
        </div>
    </div>
</section>

<!-- Menu Section -->
<section id="menu" class="py-5 bg-light">
    <div class="container py-5">
        <h2 class="text-center mb-2 fw-bold fs-1"><span class="text-danger">Our</span> Menu</h2>
        <p class="text-center mb-5 fs-5">Berikut adalah menu andalan kami di Warmindo MASBRO</p>
        <div class="row g-4">
            <?php foreach ($menuItems as $item): ?>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="<?= htmlspecialchars($item['image_url']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="card-img-top" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h3 class="card-title fw-bold fs-5"><?= htmlspecialchars($item['name']) ?></h3>
                        <p class="card-text text-danger fw-bold fs-4">IDR <?= number_format($item['price'], 0, ',', '.') ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-6">
                <h2 class="fw-bold fs-2 mb-3">Ajukan Pertanyaan Melalui <span class="text-danger">Email</span></h2>
                <p class="text-muted mb-4">Isi formulir di bawah ini dan kami akan menghubungi Anda sesegera mungkin.</p>
                <form>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Name</label>
                        <input type="text" class="form-control form-control-lg" placeholder="Nama Anda" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" class="form-control form-control-lg" placeholder="email@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Message</label>
                        <textarea class="form-control form-control-lg" rows="5" placeholder="Silakan berikan detail tentang pertanyaan Anda..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger btn-lg px-5">Kirim Pesan</button>
                </form>
            </div>
            <div class="col-lg-6">
                <h3 class="fw-bold mb-3">Outlet Warmindo MASBRO</h3>
                <p class="mb-4">Jl. Soekarno Hatta No.9, Jatimulyo, Kec. Lowokwaru, <br>Kota Malang, Jawa Timur 65141</p>
                <div class="d-flex align-items-center mb-3">
                    <div class="badge bg-warning text-dark me-2 fs-6">★ 4.7</div>
                    <a href="#" class="text-decoration-none">226 reviews</a>
                </div>
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.502734311529!2d112.61354597403435!3d-7.946885879164739!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78827687d272e7%3A0x789ce9a636cd3aa2!2sPoliteknik%20Negeri%20Malang!5e0!3m2!1sid!2sid!4v1760360797821!5m2!1sid!2sid" class="rounded-3" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require 'components/footer.php';

pg_free_result($result);
pg_close($conn);
?>