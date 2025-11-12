<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require 'function/function.php'; 

if (isset($_SESSION['login'])) {
  header('Location: dashboard.php');
  exit;
}

if (!isset($_POST['register'])) {
  header('Location: register.php?error=invalid');
  exit;
}

$full_name = trim($_POST['full_name'] ?? '');
$email     = trim($_POST['email'] ?? '');
$password  = $_POST['password'] ?? '';

if ($full_name === '' || $email === '' || $password === '') {
  header('Location: register.php?error=empty');
  exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  header('Location: register.php?error=invalid');
  exit;
}

if (strlen($password) < 6) {
  header('Location: register.php?error=weak');
  exit;
}

if (!$conn) {
  header('Location: register.php?error=server');
  exit;
}

$queryCheck = "SELECT 1 FROM users WHERE email = $1 LIMIT 1";
$resultCheck = pg_query_params($conn, $queryCheck, [$email]);

if ($resultCheck && pg_num_rows($resultCheck) > 0) {
  header('Location: register.php?error=emailtaken');
  exit;
}

// Hash password
$hashed = password_hash($password, PASSWORD_DEFAULT);


$queryInsert = "
  INSERT INTO users (full_name, email, password)
  VALUES ($1, $2, $3)
  RETURNING id
";
$resultInsert = pg_query_params($conn, $queryInsert, [$full_name, $email, $hashed]);

if ($resultInsert && pg_num_rows($resultInsert) === 1) {
  // Sukses
  header('Location: register.php?success=1');
  exit;
}


header('Location: register.php?error=server');
exit;
