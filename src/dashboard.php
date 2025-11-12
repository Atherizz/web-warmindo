<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

if ($_SESSION["role"] !== "ADMIN") {
  header("Location: cart.php");
  exit;
}

require 'function/function.php';

// Ambil data menu
$sql = 'SELECT id, name, price, image_url FROM menu_items ORDER BY id';
$result = pg_query($conn, $sql);

if (!$result) {
  die('Query gagal: ' . pg_last_error($conn));
}

$menuItems = pg_fetch_all($result);
if ($menuItems === false) {
  $menuItems = [];
}

// Handle delete
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
  $id = (int)$_POST['delete'];
  $delete_sql = "DELETE FROM menu_items WHERE id = $1";
  $delete_result = pg_query_params($conn, $delete_sql, [$id]);

  if ($delete_result) {
    header("Location: dashboard.php?success=delete");
    exit;
  } else {
    $error = "Gagal menghapus menu: " . pg_last_error($conn);
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard - WARMINDO MASBRO</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

  <!-- Feather Icons -->
  <script src="https://unpkg.com/feather-icons"></script>
  
  <style>
    body { font-family: 'Montserrat', sans-serif; }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid px-4">
      <a href="/uts-desprog/src/" class="navbar-brand fw-bold fs-4">
        WARMINDO <span class="text-success">MASBRO</span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="dashboard.php" class="nav-link active">Dashboard</a></li>
          <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
        </ul>
        <div class="d-flex align-items-center text-white">
          <i data-feather="user" class="me-2"></i>
          <?= htmlspecialchars($_SESSION['email']) ?>
        </div>
      </div>
    </div>
  </nav>

  <!-- Dashboard Section -->
  <div class="container-fluid py-4">
    <div class="container">

      <!-- Header -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h1 class="fw-bold mb-1">Menu Management</h1>
          <p class="text-muted mb-0">Kelola menu makanan WARMINDO MASBRO</p>
        </div>
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#menuModal" onclick="openModal('add')">
          <i data-feather="plus-circle" class="me-2" style="width: 18px; height: 18px;"></i>
          Tambah Menu
        </button>
      </div>

      <!-- Success Message -->
      <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <i data-feather="check-circle" class="me-2"></i>
          <?php
          if ($_GET['success'] == 'add') echo 'Menu berhasil ditambahkan!';
          if ($_GET['success'] == 'edit') echo 'Menu berhasil diupdate!';
          if ($_GET['success'] == 'delete') echo 'Menu berhasil dihapus!';
          ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      <?php endif; ?>

      <?php if (isset($error)): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <i data-feather="x-circle" class="me-2"></i>
          <?= $error ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      <?php endif; ?>

      <!-- Menu Table -->
      <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover mb-0">
              <thead class="table-dark">
                <tr>
                  <th>ID</th>
                  <th>Gambar</th>
                  <th>Nama Menu</th>
                  <th>Harga</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php if (empty($menuItems)): ?>
                  <tr>
                    <td colspan="5" class="text-center py-5">
                      <i data-feather="inbox" class="mb-3" style="width: 48px; height: 48px;"></i>
                      <p class="text-muted mb-0">Belum ada menu. Tambahkan menu pertama Anda!</p>
                    </td>
                  </tr>
                <?php else: ?>
                  <?php foreach ($menuItems as $item): ?>
                    <tr>
                      <td><?= htmlspecialchars($item['id']) ?></td>
                      <td>
                        <img src="<?= htmlspecialchars($item['image_url']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                      </td>
                      <td class="fw-semibold"><?= htmlspecialchars($item['name']) ?></td>
                      <td class="text-danger fw-bold">Rp <?= number_format($item['price'], 0, ',', '.') ?></td>
                      <td>
                        <button class="btn btn-sm btn-warning me-2" data-bs-toggle="modal" data-bs-target="#menuModal" onclick="openModal('edit', <?= htmlspecialchars(json_encode($item)) ?>)">
                          <i data-feather="edit-2" style="width: 14px; height: 14px;"></i>
                          Edit
                        </button>
                        <button class="btn btn-sm btn-warning me-2" data-bs-toggle="modal" data-bs-target="#menuModal" onclick="openModal('edit', <?= htmlspecialchars(json_encode($item)) ?>)">
                          <i data-feather="edit-2" style="width: 14px; height: 14px;"></i>
                          Edit
                        </button>
                        <form method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu &quot;<?= htmlspecialchars($item['name']) ?>&quot;?')">
                          <input type="hidden" name="delete" value="<?= (int)$item['id'] ?>">
                          <button type="submit" class="btn btn-sm btn-danger">
                            <i data-feather="trash-2" style="width: 14px; height: 14px;"></i>
                            Hapus
                          </button>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Modal Form -->
  <div class="modal fade" id="menuModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold" id="modalTitle">Tambah Menu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <form action="process_menu.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="action" id="formAction" value="add">
            <input type="hidden" name="id" id="menuId">

            <div class="mb-3">
              <label for="name" class="form-label fw-semibold">
                <i data-feather="coffee" class="me-1" style="width: 16px; height: 16px;"></i>
                Nama Menu
              </label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Contoh: Indomie Goreng Spesial" required />
            </div>

            <div class="mb-3">
              <label for="price" class="form-label fw-semibold">
                <i data-feather="dollar-sign" class="me-1" style="width: 16px; height: 16px;"></i>
                Harga (Rp)
              </label>
              <input type="number" class="form-control" id="price" name="price" placeholder="Contoh: 15000" min="0" required />
            </div>

            <div class="mb-3">
              <label for="image_url" class="form-label fw-semibold">
                <i data-feather="image" class="me-1" style="width: 16px; height: 16px;"></i>
                URL Gambar
              </label>
              <input type="text" class="form-control" id="image_url" name="image_url" placeholder="https://example.com/image.jpg" required />
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger">
              <i data-feather="save" class="me-2" style="width: 16px; height: 16px;"></i>
              <span id="submitText">Simpan</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    feather.replace();

    function openModal(action, data = null) {
      const modalTitle = document.getElementById('modalTitle');
      const formAction = document.getElementById('formAction');
      const submitText = document.getElementById('submitText');

      if (action === 'add') {
        modalTitle.textContent = 'Tambah Menu';
        formAction.value = 'add';
        submitText.textContent = 'Simpan';
        document.getElementById('menuId').value = '';
        document.getElementById('name').value = '';
        document.getElementById('price').value = '';
        document.getElementById('image_url').value = '';
      } else if (action === 'edit' && data) {
        modalTitle.textContent = 'Edit Menu';
        formAction.value = 'edit';
        submitText.textContent = 'Update';
        document.getElementById('menuId').value = data.id;
        document.getElementById('name').value = data.name;
        document.getElementById('price').value = data.price;
        document.getElementById('image_url').value = data.image_url;
      }

      feather.replace();
    }
  </script>
</body>

</html>