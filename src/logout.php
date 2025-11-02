<?php
session_start();

$_SESSION = [];

if (isset($_COOKIE['id'])) {
    setcookie('id', '', time() - 3600);
}
if (isset($_COOKIE['password'])) {
    setcookie('password', '', time() - 3600);
}

session_destroy();

header("Location: login.php");
exit;
?>  