<?php
// =====================================
// Koneksi Database MySQL
// =====================================

$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_pwd2025";

$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
