<?php
session_start();
require 'koneksi.php';
require_once 'fungsi.php';

/* 
  Pastikan metode POST
*/
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_biodata'] = 'Akses tidak valid.';
    redirect_ke('index.php#biodata');
}

/* Ambil dan bersihkan data */
$nim   = bersihkan($_POST['txtNim'] ?? '');
$nama  = bersihkan($_POST['txtNmLengkap'] ?? '');
$email = bersihkan($_POST['txtEmail'] ?? '');
$pesan = bersihkan($_POST['txtPesan'] ?? '');

/* Validasi sederhana */
$errors = [];

if ($nim === '') {
    $errors[] = 'NIM wajib diisi.';
}
if ($nama === '') {
    $errors[] = 'Nama wajib diisi.';
}
if ($email === '') {
    $errors[] = 'Email wajib diisi.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Format email tidak valid.';
}
if ($pesan === '') {
    $errors[] = 'Pesan wajib diisi.';
}

if (!empty($errors)) {
    $_SESSION['old_biodata'] = [
        'nim'   => $nim,
        'nama'  => $nama,
        'email' => $email,
        'pesan' => $pesan
    ];
    $_SESSION['flash_biodata'] = implode('<br>', $errors);
    redirect_ke('index.php#biodata');
}

/* Siapkan query INSERT ke tbl_biodata */
$sql = "INSERT INTO tbl_biodata (nim, nama, email, pesan) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    $_SESSION['flash_biodata'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('index.php#biodata');
}

mysqli_stmt_bind_param($stmt, "ssss", $nim, $nama, $email, $pesan);

if (mysqli_stmt_execute($stmt)) {
    unset($_SESSION['old_biodata']);
    $_SESSION['flash_biodata'] = 'Biodata berhasil tersimpan.';
} else {
    $_SESSION['old_biodata'] = [
        'nim'   => $nim,
        'nama'  => $nama,
        'email' => $email,
        'pesan' => $pesan
    ];
    $_SESSION['flash_biodata'] = 'Biodata gagal disimpan. Silakan coba lagi.';
}

mysqli_stmt_close($stmt);
redirect_ke('index.php#biodata');
