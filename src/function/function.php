<?php 
$host = 'localhost';
$port = '5432';
$dbname = 'warmindo';
$user = 'postgres';
$pass = '0806';

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");

if (!$conn) {
    die('Koneksi database gagal: ' . pg_last_error());
}

pg_set_client_encoding($conn, 'UTF8');
?>