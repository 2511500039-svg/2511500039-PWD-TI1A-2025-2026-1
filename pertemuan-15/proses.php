<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

/* =========================
   VALIDASI METHOD
========================= */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  $_SESSION['flash_error'] = 'Akses tidak valid.';
  redirect_ke('index.php');
}

/* =========================================================
   1️⃣ PROSES FORM BIODATA MAHASISWA
   (deteksi dari adanya txtNim)
========================================================= */
if (isset($_POST['txtNim'])) {

  $nim   = bersihkan($_POST['txtNim'] ?? '');
  $nama  = bersihkan($_POST['txtNmLengkap'] ?? '');
  $email = bersihkan($_POST['txtEmail'] ?? '');
  $pesan = bersihkan($_POST['txtPesan'] ?? '');

  $errors = [];

  if ($nim === '')   $errors[] = 'NIM wajib diisi.';
  if ($nama === '')  $errors[] = 'Nama wajib diisi.';
  if ($email === '') $errors[] = 'Email wajib diisi.';
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Format email tidak valid.';
  }
  if ($pesan === '') $errors[] = 'Pesan wajib diisi.';

  if (!empty($errors)) {
    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('index.php#biodata');
  }

  $stmt = mysqli_prepare(
    $conn,
    "INSERT INTO tbl_biodata (nim, nama, email, pesan)
     VALUES (?, ?, ?, ?)"
  );

  mysqli_stmt_bind_param($stmt, "ssss", $nim, $nama, $email, $pesan);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  $_SESSION['flash_sukses'] = 'Biodata berhasil disimpan.';
  redirect_ke('index.php#biodata');
}

/* =========================================================
   2️⃣ PROSES FORM CONTACT / BUKU TAMU
========================================================= */

$nama    = bersihkan($_POST['txtNama'] ?? '');
$email   = bersihkan($_POST['txtEmail'] ?? '');
$pesan   = bersihkan($_POST['txtPesan'] ?? '');
$captcha = bersihkan($_POST['txtCaptcha'] ?? '');

$errors = [];

if ($nama === '')  $errors[] = 'Nama wajib diisi.';
if ($email === '') $errors[] = 'Email wajib diisi.';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errors[] = 'Format email tidak valid.';
}
if ($pesan === '') $errors[] = 'Pesan wajib diisi.';
if ($captcha !== "5") $errors[] = 'Captcha salah.';

if (!empty($errors)) {
  $_SESSION['old'] = compact('nama','email','pesan','captcha');
  $_SESSION['flash_error'] = implode('<br>', $errors);
  redirect_ke('index.php#contact');
}

$stmt = mysqli_prepare(
  $conn,
  "INSERT INTO tbl_tamu (cnama, cemail, cpesan)
   VALUES (?, ?, ?)"
);

mysqli_stmt_bind_param($stmt, "sss", $nama, $email, $pesan);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

unset($_SESSION['old']);
$_SESSION['flash_sukses'] = 'Pesan berhasil dikirim.';
redirect_ke('index.php#contact');
