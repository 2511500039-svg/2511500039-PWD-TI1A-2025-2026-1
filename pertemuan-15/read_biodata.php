<?php
session_start();
require 'koneksi.php';

$sql = "SELECT id, nim, nama, email, pesan, tanggal
        FROM tbl_biodata
        ORDER BY id DESC";
$q = mysqli_query($conn, $sql);

if (!$q) {
  die("Query error: " . mysqli_error($conn));
}
?>

<table border="1" cellpadding="8" cellspacing="0">
  <tr>
    <th>No</th>
    <th>Aksi</th>
    <th>ID</th>
    <th>NIM</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Pesan</th>
    <th>Tanggal</th>
  </tr>

  <?php $no = 1; ?>
  <?php while ($row = mysqli_fetch_assoc($q)): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td>
        <a href="edit_biodata.php?id=<?= (int)$row['id']; ?>">Edit</a> |
        <a href="delete_biodata.php?id=<?= (int)$row['id']; ?>"
           onclick="return confirm('Yakin hapus data ini?')">
           Delete
        </a>
      </td>
      <td><?= $row['id']; ?></td>
      <td><?= htmlspecialchars($row['nim']); ?></td>
      <td><?= htmlspecialchars($row['nama']); ?></td>
      <td><?= htmlspecialchars($row['email']); ?></td>
      <td><?= htmlspecialchars($row['pesan']); ?></td>
      <td><?= $row['tanggal']; ?></td>
    </tr>
  <?php endwhile; ?>
</table>
