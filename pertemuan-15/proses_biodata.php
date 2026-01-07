<?php
session_start();

$id = $_POST['txtNim'] ?? '';
$nama = $_POST['txtNama'] ?? '';
$email = $_POST['txtEmail'] ?? '';
$pesan = $_POST['txtPesan'] ?? '';

// simpan ke session
$_SESSION['biodata'] = [
    "nim" => $id,
    "nama" => $nama,
    "email" => $email,
    "pesan" => $pesan,
    "tanggal" => date("Y-m-d H:i:s")
];

// kembalikan ke halaman index
header("Location: index.php#about");
exit;
