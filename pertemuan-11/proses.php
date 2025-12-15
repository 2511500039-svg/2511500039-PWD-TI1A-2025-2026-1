<?php
session_start();

/* fungsi redirect */
function redirect_ke($url)
{
    header("Location: $url");
    exit;
}

/* fungsi bersihkan input */
function bersihkan($data)
{
    return htmlspecialchars(trim($data));
}

/* a. Cek REQUEST METHOD apakah POST */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('index.php#contact');
}

/* b. Ambil data POST */
$nama  = bersihkan($_POST['txtNama'] ?? '');
$email = bersihkan($_POST['txtEmail'] ?? '');
$pesan = bersihkan($_POST['txtPesan'] ?? '');

/* c. Validasi (tidak boleh kosong, email valid) */
$errors = []; // array untuk menampung error

if ($nama === '') {
    $errors[] = 'Nama wajib diisi.';
}

if ($email === '') {
    $errors[] = 'Email wajib diisi.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Format e-mail tidak valid.';
}

if ($pesan === '') {
    $errors[] = 'Pesan wajib diisi.';
}

