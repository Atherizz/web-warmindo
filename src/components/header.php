<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>WARMINDO MASBRO</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&family=Teko:wght@300..700&display=swap" rel="stylesheet">

  <!-- Feather Icons -->
  <script src="https://unpkg.com/feather-icons"></script>
  
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/<?= $fileName ?>">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top border-bottom border-danger">
    <div class="container-fluid px-4">
      <a href="/uts-desprog/src/" class="navbar-brand fw-bold fs-4 text-danger">
        WARMINDO <span class="text-success">MASBRO</span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"><a href="#home" class="nav-link fw-semibold text-danger">Home</a></li>
          <li class="nav-item"><a href="#about" class="nav-link fw-semibold text-danger">About Us</a></li>
          <li class="nav-item"><a href="#menu" class="nav-link fw-semibold text-danger">Menu</a></li>
          <li class="nav-item"><a href="review.php" class="nav-link fw-semibold text-danger">Review</a></li>
          <li class="nav-item"><a href="#contact" class="nav-link fw-semibold text-danger">Contact</a></li>
          <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true): ?>
            <?php if (isset($_SESSION['role']) && strtoupper($_SESSION['role']) === 'ADMIN'): ?>
              <li class="nav-item"><a href="dashboard.php" class="nav-link fw-semibold text-danger">Dashboard</a></li>
            <?php endif; ?>
          <?php endif; ?>
        </ul>

        <div class="d-flex align-items-center gap-3">
          <a href="#" class="text-danger"><i data-feather="search"></i></a>
          <a href="cart.php" class="text-danger"><i data-feather="shopping-cart"></i></a>
          <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true): ?>
            <a href="logout.php" class="text-danger"><i data-feather="log-out"></i></a>
          <?php else: ?>
            <a href="login.php" class="text-danger"><i data-feather="user"></i></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </nav>

  <script>
    feather.replace();
  </script>
