<?php
session_start();

$_SESSION['biodata'] = [
    "nim" => $_POST['txtNim'] ?? '',
    "nama" => $_POST['txtNmLengkap'] ?? '',
    "email" => $_POST['txtEmail'] ?? '',
    "pesan" => $_POST['txtPesan'] ?? '',
    "tanggal" => date("Y-m-d H:i:s")
];

$_SESSION['flash_biodata'] = 'Biodata berhasil disimpan!';
header('Location: index.php#about');
exit;
