<?php 
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (isset($_SESSION["login"])) {
  header("Location: cart.php");
  exit;
}

$fileName = 'bootstrap-custom.css'; 
require 'components/header.php';
?>

<div class="min-vh-100 d-flex align-items-center justify-content-center bg-light py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="card shadow-lg border-0">
          <div class="card-body p-5">
            <div class="text-center mb-4">
              <h1 class="fw-bold mb-3">Buat Akun</h1>
              <p class="text-muted">Daftar untuk bergabung di <span class="text-danger fw-semibold">WARMINDO</span> <span class="text-success fw-semibold">MASBRO</span></p>
            </div>

            <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <div class="d-flex align-items-center">
                <i data-feather="x-circle" class="me-2"></i>
                <span>
                  <?php 
                    if ($_GET['error'] === 'empty') echo 'Semua field harus diisi!';
                    if ($_GET['error'] === 'emailtaken') echo 'Email sudah terdaftar!';
                    if ($_GET['error'] === 'weak') echo 'Password terlalu lemah (min 6 karakter).';
                    if ($_GET['error'] === 'invalid') echo 'Input tidak valid.';
                  ?>
                </span>
              </div>
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>

            <?php if (isset($_GET['success']) && $_GET['success'] === '1'): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <div class="d-flex align-items-center">
                <i data-feather="check-circle" class="me-2"></i>
                <span>Akun berhasil dibuat — silakan login!</span>
              </div>
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>

            <form action="process_register.php" method="POST">
              <div class="mb-3">
                <label for="full_name" class="form-label fw-semibold">
                  <i data-feather="user" class="me-1" style="width: 16px; height: 16px;"></i>
                  Full Name
                </label>
                <input
                  type="text"
                  id="full_name"
                  name="full_name"
                  class="form-control form-control-lg"
                  placeholder="Masukkan nama lengkap"
                  required
                  maxlength="255"
                />
              </div>

              <div class="mb-3">
                <label for="email" class="form-label fw-semibold">
                  <i data-feather="mail" class="me-1" style="width: 16px; height: 16px;"></i>
                  Email
                </label>
                <input
                  type="email"
                  id="email"
                  name="email"
                  class="form-control form-control-lg"
                  placeholder="Masukkan email"
                  required
                />
              </div>

              <div class="mb-3">
                <label for="password" class="form-label fw-semibold">
                  <i data-feather="lock" class="me-1" style="width: 16px; height: 16px;"></i>
                  Password
                </label>
                <input
                  type="password"
                  id="password"
                  name="password"
                  class="form-control form-control-lg"
                  placeholder="Buat password (min 6 karakter)"
                  required
                  minlength="6"
                />
              </div>

              <div class="mb-4">
                <small class="text-muted">Dengan mendaftar, kamu setuju dengan <a href="#" class="text-danger">Syarat & Ketentuan</a>.</small>
              </div>

              <button type="submit" name="register" class="btn btn-danger btn-lg w-100 mb-3">
                <i data-feather="user-plus" class="me-2" style="width: 18px; height: 18px;"></i>
                Daftar
              </button>

              <div class="text-center">
                <span class="text-muted">Sudah punya akun?</span> 
                <a href="login.php" class="text-danger fw-semibold text-decoration-none">Login Sekarang</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require 'components/footer.php'; ?>