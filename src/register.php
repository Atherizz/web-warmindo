<?php 
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}


if (isset($_SESSION["login"])) {
  header("Location: cart.php");
  exit;
}

$fileName = 'register.css'; 
require 'components/header.php';
?>

<section class="login-section">
  <div class="login-container">
    <div class="login-header">
      <h1>Buat Akun</h1>
      <p>Daftar untuk bergabung di <span class="brand-red">WARMINDO</span> <span class="brand-green">MASBRO</span></p>
    </div>

    <?php if (isset($_GET['error'])): ?>
    <div class="alert alert-error">
      <i data-feather="x-circle"></i>
      <?php 
        if ($_GET['error'] === 'empty') echo 'Semua field harus diisi!';
        if ($_GET['error'] === 'emailtaken') echo 'Email sudah terdaftar!';
        if ($_GET['error'] === 'weak') echo 'Password terlalu lemah (min 6 karakter).';
        if ($_GET['error'] === 'invalid') echo 'Input tidak valid.';
      ?>
    </div>
    <?php endif; ?>

    <!-- Success message -->
    <?php if (isset($_GET['success']) && $_GET['success'] === '1'): ?>
    <div class="alert alert-success">
      <i data-feather="check-circle"></i>
      Akun berhasil dibuat — silakan login!
    </div>
    <?php endif; ?>

    <form action="process_register.php" method="POST" class="login-form">
      <div class="form-group">
        <label for="full_name">
          <i data-feather="user"></i>
          Full Name
        </label>
        <input
          type="text"
          id="full_name"
          name="full_name"
          placeholder="Masukkan nama lengkap"
          required
          maxlength="255"
        />
      </div>

      <div class="form-group">
        <label for="email">
          <i data-feather="mail"></i>
          Email
        </label>
        <input
          type="email"
          id="email"
          name="email"
          placeholder="Masukkan email"
          required
        />
      </div>

      <div class="form-group">
        <label for="password">
          <i data-feather="lock"></i>
          Password
        </label>
        <input
          type="password"
          id="password"
          name="password"
          placeholder="Buat password (min 6 karakter)"
          required
          minlength="6"
        />
      </div>

      <div class="form-options" style="justify-content:flex-start;">
        <small>Dengan mendaftar, kamu setuju dengan <a href="#">Syarat & Ketentuan</a>.</small>
      </div>

      <button type="submit" name="register" class="btn-login">
        <i data-feather="user-plus"></i>
        Daftar
      </button>

      <div class="register-link">
        Sudah punya akun? <a href="login.php">Login Sekarang</a>
      </div>
    </form>
  </div>
</section>

<script>
  feather.replace();
</script>
</body>
</html>
