<?php
// ===================================================
// NO. 2 UAS PWD
// Proses simpan Biodata Dosen
// Method POST + Validasi + Sanitasi + PRG
// ===================================================

session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

// Cegah akses langsung selain POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_bio_error'] = 'Akses tidak valid.';
    redirect_ke('index.php#biodata');
    exit;
}

// ---------------- AMBIL & SANITASI DATA ----------------
$kodedos  = trim($_POST['txtKodeDos'] ?? '');
$nama     = trim($_POST['txtNmDosen'] ?? '');
$alamat   = trim($_POST['txtAlRmh'] ?? '');
$tanggal  = trim($_POST['txtTglDosen'] ?? '');
$jja      = trim($_POST['txtJJA'] ?? '');
$prodi    = trim($_POST['txtProdi'] ?? '');
$nohp     = trim($_POST['txtNoHP'] ?? '');
$pasangan = trim($_POST['txNamaPasangan'] ?? '');
$anak     = trim($_POST['txtNmAnak'] ?? '');
$ilmu     = trim($_POST['txtBidangIlmu'] ?? '');

// Sanitasi tambahan
$kodedos = htmlspecialchars($kodedos);
$nama    = htmlspecialchars($nama);
$prodi   = htmlspecialchars($prodi);

// ---------------- VALIDASI ----------------
if ($kodedos === '' || $nama === '' || $prodi === '') {
    $_SESSION['flash_bio_error'] = 'Kode Dosen, Nama, dan Prodi wajib diisi.';
    redirect_ke('index.php#biodata');
    exit;
}

// ---------------- INSERT DATA ----------------
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

// ---------------- PRG ----------------
if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_bio_sukses'] = 'Biodata dosen berhasil disimpan.';
} else {
    $_SESSION['flash_bio_error'] = 'Gagal menyimpan data.';
}

mysqli_stmt_close($stmt);
redirect_ke('index.php#biodata');
