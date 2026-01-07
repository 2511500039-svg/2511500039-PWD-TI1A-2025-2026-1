<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  redirect_ke('index.php#biodata');
}

$nim   = bersihkan($_POST['txtNim'] ?? '');
$nama  = bersihkan($_POST['txtNmLengkap'] ?? '');
$email = bersihkan($_POST['txtEmail'] ?? '');
$pesan = bersihkan($_POST['txtPesan'] ?? '');

$errors = [];

if ($nim === '')   $errors[] = 'NIM wajib diisi';
if ($nama === '')  $errors[] = 'Nama wajib diisi';
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
  $errors[] = 'Email tidak valid';

if (!empty($errors)) {
  $_SESSION['flash_error'] = implode('<br>', $errors);
  redirect_ke('index.php#biodata');
}

$stmt = mysqli_prepare(
  $conn,
  "INSERT INTO tbl_biodata (nim, nama, email, pesan)
   VALUES (?, ?, ?, ?)"
);

mysqli_stmt_bind_param($stmt, "ssss",
  $nim, $nama, $email, $pesan
);

if (mysqli_stmt_execute($stmt)) {
  $_SESSION['flash_sukses'] = 'Biodata berhasil disimpan';
} else {
  $_SESSION['flash_error'] = 'Gagal menyimpan biodata';
}

redirect_ke('index.php#biodata');
