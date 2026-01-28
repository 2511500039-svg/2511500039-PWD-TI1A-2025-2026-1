<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';
?>

<!-- ===================== -->
<!-- TABEL BIODATA DOSEN -->
<!-- ===================== -->
<?php
$sqlBio = "SELECT * FROM tbl_biodata_dosen ORDER BY id_dosen DESC";
$qBio = mysqli_query($conn, $sqlBio);
if (!$qBio) die(mysqli_error($conn));
?>

<h3>Data Biodata Dosen</h3>
<table border="1" cellpadding="8" cellspacing="0">
  <tr>
    <th>No</th>
    <th>Kode Dosen</th>
    <th>Nama</th>
    <th>Prodi</th>
    <th>No HP</th>
  </tr>
  <?php $i=1; while($b=mysqli_fetch_assoc($qBio)): ?>
  <tr>
    <td><?= $i++ ?></td>
    <td><?= htmlspecialchars($b['kode_dosen']) ?></td>
    <td><?= htmlspecialchars($b['nama_dosen']) ?></td>
    <td><?= htmlspecialchars($b['prodi']) ?></td>
    <td><?= htmlspecialchars($b['no_hp']) ?></td>
  </tr>
  <?php endwhile; ?>
</table>

<br><hr><br>

<!-- ===================== -->
<!-- TABEL TAMU (KODE LAMA) -->
<!-- ===================== -->
<?php
$sql = "SELECT * FROM tbl_tamu ORDER BY cid DESC";
$q = mysqli_query($conn, $sql);
if (!$q) die(mysqli_error($conn));
?>

<h3>Data Tamu</h3>
<table border="1" cellpadding="8" cellspacing="0">
  <tr>
    <th>No</th>
    <th>Aksi</th>
    <th>ID</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Pesan</th>
    <th>Created At</th>
  </tr>
  <?php $i=1; while($row=mysqli_fetch_assoc($q)): ?>
  <tr>
    <td><?= $i++ ?></td>
    <td>
      <a href="edit.php?cid=<?= (int)$row['cid'] ?>">Edit</a>
      <a onclick="return confirm('Hapus data?')" href="proses_delete.php?cid=<?= (int)$row['cid'] ?>">Delete</a>
    </td>
    <td><?= $row['cid'] ?></td>
    <td><?= htmlspecialchars($row['cnama']) ?></td>
    <td><?= htmlspecialchars($row['cemail']) ?></td>
    <td><?= nl2br(htmlspecialchars($row['cpesan'])) ?></td>
    <td><?= formatTanggal($row['dcreated_at']) ?></td>
  </tr>
  <?php endwhile; ?>
</table>
