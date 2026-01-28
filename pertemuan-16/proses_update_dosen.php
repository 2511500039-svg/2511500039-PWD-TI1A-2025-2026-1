<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_bio_error'] = 'Akses tidak valid.';
    redirect_ke('index.php#biodata');
}

// Ambil & bersihkan data
$kode    = bersihkan($_POST['kode_dosen'] ?? '');
$nama    = bersihkan($_POST['nama_dosen'] ?? '');
$alamat  = bersihkan($_POST['alamat'] ?? '');
$tgl     = bersihkan($_POST['tgl_jadi_dosen'] ?? '');
$jja     = bersihkan($_POST['jja'] ?? '');
$prodi   = bersihkan($_POST['prodi'] ?? '');
$nohp    = bersihkan($_POST['no_hp'] ?? '');
$pasangan= bersihkan($_POST['nama_pasangan'] ?? '');
$anak    = bersihkan($_POST['nama_anak'] ?? '');
$ilmu    = bersihkan($_POST['bidang_ilmu'] ?? '');

// Validasi wajib
if ($kode === '' || $nama === '' || $prodi === '') {
    $_SESSION['flash_bio_error'] = 'Kode Dosen, Nama, dan Prodi wajib diisi.';
    redirect_ke('index.php#biodata');
}

// Update ke database
$sql = "UPDATE tbl_biodata_dosen SET 
            nama_dosen=?, alamat=?, tgl_jadi_dosen=?, jja=?, prodi=?, 
            no_hp=?, nama_pasangan=?, nama_anak=?, bidang_ilmu=? 
        WHERE kode_dosen=?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param(
    $stmt,
    "ssssssssss",
    $nama, $alamat, $tgl, $jja, $prodi, $nohp, $pasangan, $anak, $ilmu, $kode
);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_bio_sukses'] = 'Biodata dosen berhasil diperbarui.';
} else {
    $_SESSION['flash_bio_error'] = 'Gagal memperbarui data.';
}

mysqli_stmt_close($stmt);
redirect_ke('index.php#biodata');
