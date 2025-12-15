<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_pwd2025";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}