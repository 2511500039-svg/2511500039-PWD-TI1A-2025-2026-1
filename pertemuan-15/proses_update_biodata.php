<?php
session_start();
require 'koneksi.php';
require_once 'fungsi.php';

/* Validasi metode POST */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('read_biodata.php');
}

/* Ambil & bersihkan data */
$id    = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$nama  = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$pesan = trim($_POST['pesan'] ?? '');

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

/* Kalau ada error, simpan dan redirect ke edit */
if (!empty($errors)) {
    $_SESSION['flash_error'] = implode('<br>', $errors);
    $_SESSION['old'] = ['nama' => $nama, 'email' => $email, 'pesan' => $pesan];
    header('Location: edit_biodata.php?id=' . (int)$id);
    exit;
}

/* Query UPDATE */
$sql = "UPDATE tbl_biodata SET nama = ?, email = ?, pesan = ? WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sssi", $nama, $email, $pesan, $id);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_sukses'] = 'Data berhasil diperbarui.';
} else {
    $_SESSION['flash_error'] = 'Data gagal diperbarui.';
}

mysqli_stmt_close($stmt);
redirect_ke('read_biodata.php'); // kembali ke read_biodata.php
