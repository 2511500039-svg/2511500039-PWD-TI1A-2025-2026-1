<?php
session_start();
require 'koneksi.php';

/*
  Hanya izinkan metode POST
*/
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  die('Akses tidak valid');
}

/*
  Ambil & bersihkan data
*/
$id    = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$nim   = trim($_POST['nim'] ?? '');
$nama  = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$pesan = trim($_POST['pesan'] ?? '');

/*
  Validasi sederhana
*/
$errors = [];

if (!$id) {
  $errors[] = 'ID tidak valid.';
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
  $_SESSION['flash_error'] = implode('<br>', $errors);
  header('Location: edit_biodata.php?id=' . (int)$id);
  exit;
}

/*
  Query UPDATE (NIM tidak diubah sesuai soal)
*/
$sql = "UPDATE tbl_biodata
        SET nama = ?, email = ?, pesan = ?
        WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
  $_SESSION['flash_error'] = 'Gagal menyiapkan query.';
  header('Location: edit_biodata.php?id=' . (int)$id);
  exit;
}

mysqli_stmt_bind_param($stmt, "sssi", $nama, $email, $pesan, $id);

/*
  Eksekusi
*/
if (mysqli_stmt_execute($stmt)) {
  $_SESSION['flash_sukses'] = 'Data berhasil diperbarui.';
  header('Location: read_biodata.php');
  exit;
} else {
  $_SESSION['flash_error'] = 'Data gagal diperbarui.';
  header('Location: edit_biodata.php?id=' . (int)$id);
  exit;
}

mysqli_stmt_close($stmt);
