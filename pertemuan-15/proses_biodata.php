<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  $_SESSION['flash_error'] = 'Akses tidak valid.';
  redirect_ke('index.php#biodata');
}

$nim   = bersihkan($_POST['txtNim'] ?? '');
$nama  = bersihkan($_POST['txtNmLengkap'] ?? '');
$email = bersihkan($_POST['txtEmail'] ?? '');
$pesan = bersihkan($_POST['txtPesan'] ?? '');

$errors = [];

if ($nim === '')  $errors[] = 'NIM wajib diisi.';
if ($nama === '') $errors[] = 'Nama wajib diisi.';
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL))
  $errors[] = 'Email tidak valid.';
if ($pesan === '') $errors[] = 'Pesan wajib diisi.';

if (!empty($errors)) {
  $_SESSION['flash_error'] = implode('<br>', $errors);
  redirect_ke('index.php#biodata');
}

$sql = "INSERT INTO tbl_biodata (nim, nama, email, pesan)
        VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "ssss",
  $nim, $nama, $email, $pesan
);

if (mysqli_stmt_execute($stmt)) {
  $_SESSION['flash_sukses'] = 'Biodata berhasil disimpan.';
} else {
  $_SESSION['flash_error'] = 'Data gagal disimpan.';
}

redirect_ke('index.php#biodata');
