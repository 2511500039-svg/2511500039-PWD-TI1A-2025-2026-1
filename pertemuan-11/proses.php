<?php
session_start();
require_once 'koneksi.php';

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

/* cek method */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('index.php#contact');
}

/* ambil data dari form */
$nama  = bersihkan($_POST['txtNama'] ?? '');
$email = bersihkan($_POST['txtEmail'] ?? '');
$pesan = bersihkan($_POST['txtPesan'] ?? '');

/* validasi */
$errors = [];

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
    $_SESSION['old'] = [
        'nama'  => $nama,
        'email' => $email,
        'pesan' => $pesan
    ];
    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('index.php#contact');
}

/* simpan ke database */
$sql = "INSERT INTO tbl_tamu (nama, email, pesan) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('index.php#contact');
}

mysqli_stmt_bind_param($stmt, "sss", $nama, $email, $pesan);

if (mysqli_stmt_execute($stmt)) {
    unset($_SESSION['old']);
    $_SESSION['flash_success'] = 'Terima kasih, pesan Anda berhasil dikirim.';
} else {
    $_SESSION['old'] = [
        'nama'  => $nama,
        'email' => $email,
        'pesan' => $pesan
    ];
    $_SESSION['flash_error'] = 'Data gagal disimpan.';
}

mysqli_stmt_close($stmt);
redirect_ke('index.php#contact');
