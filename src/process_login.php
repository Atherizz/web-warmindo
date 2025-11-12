<?php 
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require 'function/function.php'; 

function redirectByRole(string $role): void {
  $role = strtoupper(trim($role));
  if ($role === 'ADMIN') {
    header('Location: dashboard.php');
  } else {
    header('Location: cart.php');
  }
  exit;
}


if (isset($_COOKIE['id'], $_COOKIE['password'])) {
  $id = $_COOKIE['id'];
  $passwordCookie = $_COOKIE['password']; // kamu memang isi email di cookie 'password'

  $query  = "SELECT email, role FROM users WHERE id = $1";
  $result = pg_query_params($conn, $query, [$id]);

  if ($result && pg_num_rows($result) > 0) {
    $row = pg_fetch_assoc($result);

    if ($passwordCookie === $row['email']) {
      $_SESSION['login'] = true;
      $_SESSION['id']    = $id;
      $_SESSION['email'] = $row['email'];
      $_SESSION['role']  = $row['role'];

      redirectByRole($row['role']);
    }
  }
}

if (isset($_POST['login'])) {
  $email    = trim($_POST['email'] ?? '');
  $password = trim($_POST['password'] ?? '');

  if ($email === '' || $password === '') {
    header('Location: login.php?error=empty');
    exit;
  }

  $query  = "SELECT id, email, password, role FROM users WHERE email = $1";
  $result = pg_query_params($conn, $query, [$email]);

  if ($result && pg_num_rows($result) === 1) {
    $row = pg_fetch_assoc($result);

    if (password_verify($password, $row['password'])) {
      $_SESSION['login'] = true;
      $_SESSION['id']    = $row['id'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['role']  = $row['role'];

      if (isset($_POST['remember'])) {
        setcookie('id', $row['id'], time() + 60*60, '/');
        setcookie('password', $row['email'], time() + 60*60, '/');
      }

      redirectByRole($row['role']);
    } else {
      header('Location: login.php?error=wrong');
      exit;
    }
  } else {
    header('Location: login.php?error=notfound');
    exit;
  }
}

/** Default: balik ke halaman login */
header('Location: login.php');
exit;
