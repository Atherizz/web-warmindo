<?php 
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (isset($_SESSION["login"])) {
  header("Location: dashboard.php");
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
              <h1 class="fw-bold mb-3">Welcome Back!</h1>
              <p class="text-muted">Login ke akun <span class="text-danger fw-semibold">WARMINDO</span> <span class="text-success fw-semibold">MASBRO</span></p>
            </div>

            <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <div class="d-flex align-items-center">
                <i data-feather="x-circle" class="me-2"></i>
                <span>
                  <?php 
                    if ($_GET['error'] == 'empty') echo 'Email dan password harus diisi!';
                    if ($_GET['error'] == 'notfound') echo 'Email tidak ditemukan!';
                    if ($_GET['error'] == 'wrong') echo 'Email atau password salah!';
                  ?>
                </span>
              </div>
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>

            <form action="process_login.php" method="POST">
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
                  placeholder="Masukkan password"
                  required
                />
              </div>

              <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                  <input type="checkbox" id="remember" name="remember" class="form-check-input" />
                  <label for="remember" class="form-check-label">Ingat Saya</label>
                </div>
                <a href="forgot_password.php" class="text-decoration-none">Lupa Password?</a>
              </div>

              <button type="submit" name="login" class="btn btn-danger btn-lg w-100 mb-3">
                <i data-feather="log-in" class="me-2" style="width: 18px; height: 18px;"></i>
                Login
              </button>

              <div class="text-center">
                <span class="text-muted">Belum punya akun?</span> 
                <a href="register.php" class="text-danger fw-semibold text-decoration-none">Daftar Sekarang</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require 'components/footer.php'; ?>