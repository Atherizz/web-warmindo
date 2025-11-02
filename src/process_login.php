<?php 
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require 'function/function.php';

// Cek cookie remember me
if(isset($_COOKIE["id"]) && isset($_COOKIE["password"])) {
  $id = $_COOKIE["id"];
  $password = $_COOKIE["password"];
  
  $query = "SELECT email FROM users WHERE id = $1";
  $result = pg_query_params($conn, $query, array($id));
  
  if ($result && pg_num_rows($result) > 0) {
    $row = pg_fetch_assoc($result);
    
    if ($password === $row["email"]) {
      $_SESSION["login"] = true;
      $_SESSION["id"] = $id;
      $_SESSION["email"] = $row["email"];
      header("Location: dashboard.php");
      exit;
    }
  }
}

// Proses login dari form
if(isset($_POST["login"])) {

  $email = trim($_POST["email"]);
  $password = trim($_POST["password"]);

  // Validasi input kosong
  if (empty($email) || empty($password)) {
    header("Location: login.php?error=empty");
    exit;
  }

  $query = "SELECT * FROM users WHERE email = $1";
  $result = pg_query_params($conn, $query, array($email));

  if ($result && pg_num_rows($result) == 1) {
    $row = pg_fetch_assoc($result);
    
    // Bandingkan password
    if ($password === $row["password"]) {
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      $_SESSION["email"] = $row["email"];
      
      // Set cookie jika remember me dicentang
      if (isset($_POST["remember"])) {
        setcookie("id", $row["id"], time()+60*60, "/");
        setcookie("password", $row["email"], time()+60*60, "/");
      }

      header("Location: dashboard.php");
      exit;

    } else {
      header("Location: login.php?error=wrong");
      exit;
    }
  } else {
    header("Location: login.php?error=notfound");
    exit;
  }
}

header("Location: login.php");
exit;
?>