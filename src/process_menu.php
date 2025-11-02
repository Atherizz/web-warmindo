<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require 'function/function.php';

$action = $_POST['action'] ?? '';

if ($action === 'add') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image_url = $_POST['image_url'];
    
    $sql = "INSERT INTO menu_items (name, price, image_url) VALUES ($1, $2, $3)";
    $result = pg_query_params($conn, $sql, array($name, $price, $image_url));
    
    if ($result) {
        header("Location: dashboard.php?success=add");
    } else {
        header("Location: dashboard.php?error=add");
    }
    exit;
    
} elseif ($action === 'edit') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image_url = $_POST['image_url'];
    
    $sql = "UPDATE menu_items SET name = $1, price = $2, image_url = $3 WHERE id = $4";
    $result = pg_query_params($conn, $sql, array($name, $price, $image_url, $id));
    
    if ($result) {
        header("Location: dashboard.php?success=edit");
    } else {
        header("Location: dashboard.php?error=edit");
    }
    exit;
}

// Jika tidak ada action valid
header("Location: dashboard.php");
exit;
?>