<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = "Akses tidak valid.";
    redirect_ke('index.php#contact');
}

$nama    = bersihkan($_POST['txtNama'] ?? '');
$email   = bersihkan($_POST['txtEmail'] ?? '');
$pesan   = bersihkan($_POST['txtPesan'] ?? '');
$captcha = (int)($_POST['txtCaptcha'] ?? 0);

$_SESSION['old'] = ['nama'=>$nama,'email'=>$email,'pesan'=>$pesan,'captcha'=>$captcha];

if(!tidakKosong($nama) || !tidakKosong($email) || !tidakKosong($pesan)) {
    $_SESSION['flash_error'] = "Semua field wajib diisi.";
    redirect_ke('index.php#contact');
}

if($captcha !== 5) {
    $_SESSION['flash_error'] = "Captcha salah.";
    redirect_ke('index.php#contact');
}

$sql = "INSERT INTO tbl_tamu (cnama, cemail, cpesan, dcreated_at) VALUES (?, ?, ?, NOW())";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sss", $nama, $email, $pesan);

if(mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_sukses'] = "Pesan berhasil dikirim.";
    unset($_SESSION['old']);
} else {
    $_SESSION['flash_error'] = "Gagal mengirim pesan.";
}
mysqli_stmt_close($stmt);
redirect_ke('index.php#contact');
?>
