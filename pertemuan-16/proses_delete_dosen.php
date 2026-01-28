<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

$kode = $_GET['kode'] ?? '';
$kode = bersihkan($kode);

if ($kode === '') {
    $_SESSION['flash_bio_error'] = 'Kode Dosen tidak valid.';
    redirect_ke('index.php#biodata');
}

$sql = "DELETE FROM tbl_biodata_dosen WHERE kode_dosen=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $kode);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_bio_sukses'] = 'Biodata dosen berhasil dihapus.';
} else {
    $_SESSION['flash_bio_error'] = 'Gagal menghapus biodata dosen.';
}

mysqli_stmt_close($stmt);
redirect_ke('index.php#biodata');
