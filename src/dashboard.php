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

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar">
    <a href="/web-warmindo/src/" class="navbar-logo">WARMINDO <span>MASBRO</span></a>

    <div class="navbar-nav">
      <a href="index.php">Home</a>
      <a href="dashboard.php">Dashboard</a>
      <a href="logout.php">Logout</a>
    </div>

    <div class="navbar-extra">
      <span class="user-info">
        <i data-feather="user"></i>
        <?= htmlspecialchars($_SESSION['email']) ?>
      </span>
    </div>
  </nav>

  <!-- Dashboard Section -->
  <section class="dashboard-section">
    <div class="dashboard-container">

      <!-- Header -->
      <div class="dashboard-header">
        <div>
          <h1>Menu Management</h1>
          <p>Kelola menu makanan WARMINDO MASBRO</p>
        </div>
        <button class="btn-add" onclick="openModal('add')">
          <i data-feather="plus-circle"></i>
          Tambah Menu
        </button>
      </div>

      <!-- Success Message -->
      <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success">
          <i data-feather="check-circle"></i>
          <?php
          if ($_GET['success'] == 'add') echo 'Menu berhasil ditambahkan!';
          if ($_GET['success'] == 'edit') echo 'Menu berhasil diupdate!';
          if ($_GET['success'] == 'delete') echo 'Menu berhasil dihapus!';
          ?>
        </div>
      <?php endif; ?>

      <?php if (isset($error)): ?>
        <div class="alert alert-error">
          <i data-feather="x-circle"></i>
          <?= $error ?>
        </div>
      <?php endif; ?>

      <!-- Menu Table -->
      <div class="table-container">
        <table class="menu-table">
          <thead>
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
                <td colspan="5" class="empty-state">
                  <i data-feather="inbox"></i>
                  <p>Belum ada menu. Tambahkan menu pertama Anda!</p>
                </td>
              </tr>
            <?php else: ?>
              <?php foreach ($menuItems as $item): ?>
                <tr>
                  <td><?= htmlspecialchars($item['id']) ?></td>
                  <td>
                    <img src="<?= htmlspecialchars($item['image_url']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="table-img">
                  </td>
                  <td><?= htmlspecialchars($item['name']) ?></td>
                  <td>Rp <?= number_format($item['price'], 0, ',', '.') ?></td>
                  <td class="action-buttons">
                    <button class="btn-edit" onclick="openModal('edit', <?= htmlspecialchars(json_encode($item)) ?>)">
                      <i data-feather="edit-2"></i>
                      Edit
                    </button>
                    <form method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu &quot;<?= htmlspecialchars($item['name']) ?>&quot;?')">
                      <input type="hidden" name="delete" value="<?= (int)$item['id'] ?>">
                      <button type="submit" class="btn-delete">
                        <i data-feather="trash-2"></i> Hapus
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
  </section>

  <!-- Modal Form -->
  <div id="menuModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <h2 id="modalTitle">Tambah Menu</h2>
        <button class="close-btn" onclick="closeModal()">
          <i data-feather="x"></i>
        </button>
      </div>

      <form action="process_menu.php" method="POST" class="menu-form">
        <input type="hidden" name="action" id="formAction" value="add">
        <input type="hidden" name="id" id="menuId">

        <div class="form-group">
          <label for="name">
            <i data-feather="coffee"></i>
            Nama Menu
          </label>
          <input
            type="text"
            id="name"
            name="name"
            placeholder="Contoh: Indomie Goreng Spesial"
            required />
        </div>

        <div class="form-group">
          <label for="price">
            <i data-feather="dollar-sign"></i>
            Harga (Rp)
          </label>
          <input
            type="number"
            id="price"
            name="price"
            placeholder="Contoh: 15000"
            min="0"
            required />
        </div>

        <div class="form-group">
          <label for="image_url">
            <i data-feather="image"></i>
            URL Gambar
          </label>
          <input
            type="text"
            id="image_url"
            name="image_url"
            placeholder="https://example.com/image.jpg"
            required />
        </div>

        <div class="form-actions">
          <button type="button" class="btn-cancel" onclick="closeModal()">
            Batal
          </button>
          <button type="submit" class="btn-submit">
            <i data-feather="save"></i>
            <span id="submitText">Simpan</span>
          </button>
        </div>
      </form>
    </div>
  </div>

  <script>
    feather.replace();

    function openModal(action, data = null) {
      const modal = document.getElementById('menuModal');
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

      modal.style.display = 'flex';
      feather.replace();
    }

    function closeModal() {
      document.getElementById('menuModal').style.display = 'none';
    }

    window.onclick = function(event) {
      const modal = document.getElementById('menuModal');
      if (event.target == modal) {
        closeModal();
      }
    }
  </script>
</body>

</html>