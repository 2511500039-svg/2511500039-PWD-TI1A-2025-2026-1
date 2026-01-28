<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

/* ======================
   VALIDASI METHOD
====================== */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  $_SESSION['flash_error'] = 'Akses tidak valid.';
  redirect_ke('index.php#biodata');
}

/* ======================
   AMBIL & BERSIHKAN DATA
====================== */
$kodedos   = bersihkan($_POST['txtKodeDos'] ?? '');
$nama      = bersihkan($_POST['txtNmDosen'] ?? '');
$alamat    = bersihkan($_POST['txtAlRmh'] ?? '');
$tanggal   = bersihkan($_POST['txtTglDosen'] ?? '');
$jja       = bersihkan($_POST['txtJJA'] ?? '');
$prodi     = bersihkan($_POST['txtProdi'] ?? '');
$nohp      = bersihkan($_POST['txtNoHP'] ?? '');
$pasangan  = bersihkan($_POST['txNamaPasangan'] ?? '');
$anak      = bersihkan($_POST['txtNmAnak'] ?? '');
$ilmu      = bersihkan($_POST['txtBidangIlmu'] ?? '');

/* ======================
   VALIDASI SEDERHANA
====================== */
$errors = [];

if ($kodedos === '') $errors[] = 'Kode dosen wajib diisi.';
if ($nama === '') $errors[] = 'Nama dosen wajib diisi.';
if ($prodi === '') $errors[] = 'Prodi wajib diisi.';

if (!empty($errors)) {
  $_SESSION['flash_error'] = implode('<br>', $errors);
  redirect_ke('index.php#biodata');
}

/* ======================
   INSERT KE DATABASE
====================== */
$sql = "INSERT INTO tbl_biodata_dosen
(kode_dosen, nama_dosen, alamat, tgl_jadi_dosen, jja, prodi, no_hp, nama_pasangan, nama_anak, bidang_ilmu)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(
  $stmt,
  "ssssssssss",
  $kodedos,
  $nama,
  $alamat,
  $tanggal,
  $jja,
  $prodi,
  $nohp,
  $pasangan,
  $anak,
  $ilmu
);

if (mysqli_stmt_execute($stmt)) {
  $_SESSION['flash_sukses'] = 'Biodata dosen berhasil disimpan.';
} else {
  $_SESSION['flash_error'] = 'Biodata dosen gagal disimpan.';
}

mysqli_stmt_close($stmt);
redirect_ke('index.php#biodata');
