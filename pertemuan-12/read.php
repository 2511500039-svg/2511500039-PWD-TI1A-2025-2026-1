<?php
require 'koneksi.php';

$sql = "SELECT * FROM tbl_tamu ORDER BY cid DESC";
$q = mysqli_query($conn, $sql);
if (!$q) {
    die("Query Error: " . mysqli_error($conn));
}
?>

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

<?php $i = 1; ?>
<?php while ($row = mysqli_fetch_assoc($q)): ?>
    <tr>
        <td><?= $i++; ?></td>
        <td><a href="edit.php?cid=<?= (int)$row['cid']; ?>">Edit</a></td>
        <td><?= $row['cid']; ?></td>
        <td><?= htmlspecialchars($row['cnama']); ?></td>
        <td><?= htmlspecialchars($row['cemail']); ?></td>
        <td><?= nl2br(htmlspecialchars($row['cpesan'])); ?></td>
        <td><?= date('d-m-Y H:i', strtotime($row['dcreated_at'])); ?></td>
    </tr>
<?php endwhile; ?>
</table>
