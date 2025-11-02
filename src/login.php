<?php 
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (isset($_SESSION["login"])) {
  header("Location: dashboard.php");
  exit;
}

$fileName = 'login.css';
require 'components/header.php';  
?>

  <section class="login-section">
    <div class="login-container">
      <div class="login-header">
        <h1>Welcome Back!</h1>
        <p>Login ke akun <span class="brand-red">WARMINDO</span> <span class="brand-green">MASBRO</span></p>
      </div>

      <?php if (isset($_GET['error'])): ?>
      <div class="alert alert-error">
        <i data-feather="x-circle"></i>
        <?php 
          if ($_GET['error'] == 'empty') echo 'Email dan password harus diisi!';
          if ($_GET['error'] == 'notfound') echo 'Email tidak ditemukan!';
          if ($_GET['error'] == 'wrong') echo 'Email atau password salah!';
        ?>
      </div>
      <?php endif; ?>

      <form action="process_login.php" method="POST" class="login-form">
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
            placeholder="Masukkan password"
            required
          />
        </div>

        <div class="form-options">
          <div class="remember-me">
            <input type="checkbox" id="remember" name="remember" />
            <label for="remember">Ingat Saya</label>
          </div>
          <a href="forgot_password.php" class="forgot-password">Lupa Password?</a>
        </div>

        <button type="submit" name="login" class="btn-login">
          <i data-feather="log-in"></i>
          Login
        </button>

        <div class="register-link">
          Belum punya akun? <a href="register.php">Daftar Sekarang</a>
        </div>
      </form>

    </div>
  </section>

  <script>
    feather.replace();
  </script>
</body>
</html>