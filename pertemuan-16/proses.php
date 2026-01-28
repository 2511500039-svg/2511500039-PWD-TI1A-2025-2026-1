<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

/* ======================
   VALIDASI METHOD
====================== */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  $_SESSION['flash_error'] = 'Akses tidak valid.';
  redirect_ke('index.php#contact');
}

/* ======================
   AMBIL & BERSIHKAN DATA
====================== */
$nama    = bersihkan($_POST['txtNama'] ?? '');
$email   = bersihkan($_POST['txtEmail'] ?? '');
$pesan   = bersihkan($_POST['txtPesan'] ?? '');
$captcha = bersihkan($_POST['txtCaptcha'] ?? '');

/* ======================
   VALIDASI
====================== */
$errors = [];

if ($nama === '') $errors[] = 'Nama wajib diisi.';
if (strlen($nama) < 3) $errors[] = 'Nama minimal 3 karakter.';

if ($email === '') {
  $errors[] = 'Email wajib diisi.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errors[] = 'Format email tidak valid.';
}

if ($pesan === '') $errors[] = 'Pesan wajib diisi.';
if (strlen($pesan) < 10) $errors[] = 'Pesan minimal 10 karakter.';

if ($captcha !== "5") $errors[] = 'Jawaban captcha salah.';

/* ======================
   JIKA ADA ERROR (PRG)
====================== */
if (!empty($errors)) {
  $_SESSION['old'] = [
    'nama' => $nama,
    'email' => $email,
    'pesan' => $pesan,
    'captcha' => $captcha
  ];
  $_SESSION['flash_error'] = implode('<br>', $errors);
  redirect_ke('index.php#contact');
}

/* ======================
   INSERT KE DATABASE
====================== */
$sql = "INSERT INTO tbl_tamu (cnama, cemail, cpesan) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "sss", $nama, $email, $pesan);

if (mysqli_stmt_execute($stmt)) {
  unset($_SESSION['old']);
  $_SESSION['flash_sukses'] = 'Terima kasih, pesan Anda berhasil disimpan.';
} else {
  $_SESSION['flash_error'] = 'Data gagal disimpan.';
}

mysqli_stmt_close($stmt);
redirect_ke('index.php#contact');
