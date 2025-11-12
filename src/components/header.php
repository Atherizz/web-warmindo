<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>WARMINDO MASBRO</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&family=Teko:wght@300..700&display=swap" rel="stylesheet">

  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/<?= $fileName ?>">
</head>

<body>
  <nav class="navbar">
    <a href="/uts-desprog/src/" class="navbar-logo">WARMINDO <span>MASBRO</span></a>

    <div class="navbar-nav">
      <a href="#home">Home</a>
      <a href="#about">About Us</a>
      <a href="#menu">Menu</a>
      <a href="review.php">Review</a>
      <a href="#contact">Contact</a>
      <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true): ?>
        <!-- Tampilkan dashboard kalau ADMIN -->
        <?php if (isset($_SESSION['role']) && strtoupper($_SESSION['role']) === 'ADMIN'): ?>
          <a href="dashboard.php">Dashboard</a>
        <?php endif; ?>
      <?php endif; ?>
    </div>

    <div class="navbar-extra">
      <a href="#" id="search"><i data-feather="search"></i></a>
      <a href="cart.php" id="shopping-cart"><i data-feather="shopping-cart"></i></a>

      <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true): ?>
        <!-- Sudah login → tampilkan logout -->
        <a href="logout.php" id="logout-btn"><i data-feather="log-out"></i></a>
      <?php else: ?>
        <!-- Belum login → tampilkan login -->
        <a href="login.php" id="login-btn"><i data-feather="user"></i></a>
      <?php endif; ?>

      <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>
  </nav>

  <script>
    feather.replace();
  </script>
