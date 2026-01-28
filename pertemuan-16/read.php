<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

$sql = "SELECT * FROM tbl_biodata_dosen ORDER BY kode_dosen DESC";
$q = mysqli_query($conn, $sql);

if (!$q) {
  die("Query error: " . mysqli_error($conn));
}
?>

<table border="1" cellpadding="8" cellspacing="0">
  <tr>
    <th>No</th>
    <th>Kode Dosen</th>
    <th>Nama Dosen</th>
    <th>Alamat</th>
    <th>Tanggal Jadi Dosen</th>
    <th>JJA</th>
    <th>Prodi</th>
    <th>No HP</th>
    <th>Nama Pasangan</th>
    <th>Nama Anak</th>
    <th>Bidang Ilmu</th>
  </tr>

  <?php $no = 1; ?>
  <?php while ($row = mysqli_fetch_assoc($q)): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= htmlspecialchars($row['kode_dosen']) ?></td>
      <td><?= htmlspecialchars($row['nama_dosen']) ?></td>
      <td><?= htmlspecialchars($row['alamat']) ?></td>
      <td><?= htmlspecialchars($row['tgl_jadi_dosen']) ?></td>
      <td><?= htmlspecialchars($row['jja']) ?></td>
      <td><?= htmlspecialchars($row['prodi']) ?></td>
      <td><?= htmlspecialchars($row['no_hp']) ?></td>
      <td><?= htmlspecialchars($row['nama_pasangan']) ?></td>
      <td><?= htmlspecialchars($row['nama_anak']) ?></td>
      <td><?= htmlspecialchars($row['bidang_ilmu']) ?></td>
    </tr>
  <?php endwhile; ?>
</table>
