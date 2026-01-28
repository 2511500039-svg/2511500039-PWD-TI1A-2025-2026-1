<?php
require 'koneksi.php';
require 'fungsi.php';

$kode = $_GET['kode'] ?? '';
$kode = bersihkan($kode);

$sql = "SELECT * FROM tbl_biodata_dosen WHERE kode_dosen = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $kode);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "<p>Data tidak ditemukan.</p>";
    exit;
}
?>

<h2>Edit Biodata Dosen</h2>
<form action="proses_update_dosen.php" method="POST">
    <input type="hidden" name="kode_dosen" value="<?= htmlspecialchars($data['kode_dosen']); ?>">

    <label>Nama Dosen:
        <input type="text" name="nama_dosen" value="<?= htmlspecialchars($data['nama_dosen']); ?>" required>
    </label>

    <label>Alamat:
        <input type="text" name="alamat" value="<?= htmlspecialchars($data['alamat']); ?>">
    </label>

    <label>Tanggal Jadi Dosen:
        <input type="text" name="tgl_jadi_dosen" value="<?= htmlspecialchars($data['tgl_jadi_dosen']); ?>">
    </label>

    <label>JJA:
        <input type="text" name="jja" value="<?= htmlspecialchars($data['jja']); ?>">
    </label>

    <label>Prodi:
        <input type="text" name="prodi" value="<?= htmlspecialchars($data['prodi']); ?>" required>
    </label>

    <label>No HP:
        <input type="text" name="no_hp" value="<?= htmlspecialchars($data['no_hp']); ?>">
    </label>

    <label>Nama Pasangan:
        <input type="text" name="nama_pasangan" value="<?= htmlspecialchars($data['nama_pasangan']); ?>">
    </label>

    <label>Nama Anak:
        <input type="text" name="nama_anak" value="<?= htmlspecialchars($data['nama_anak']); ?>">
    </label>

    <label>Bidang Ilmu:
        <input type="text" name="bidang_ilmu" value="<?= htmlspecialchars($data['bidang_ilmu']); ?>">
    </label>

    <button type="submit">Update</button>
    <a href="index.php#biodata">Batal</a>
</form>
