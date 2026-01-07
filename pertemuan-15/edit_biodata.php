<?php
session_start();
require 'koneksi.php';
require_once 'fungsi.php';

// Ambil semua data dari tbl_biodata
$sql = "SELECT id, nim, nama, email, pesan, tanggal FROM tbl_biodata ORDER BY id DESC";
$q = mysqli_query($conn, $sql);

if (!$q) {
    die("Query error: " . mysqli_error($conn));
}

$flash_sukses = $_SESSION['flash_sukses'] ?? '';
$flash_error  = $_SESSION['flash_error'] ?? '';
unset($_SESSION['flash_sukses'], $_SESSION['flash_error']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Biodata Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Data Biodata Mahasiswa</h2>

<?php if (!empty($flash_sukses)): ?>
    <div style="padding:10px; margin-bottom:10px; background:#d4edda; color:#155724; border-radius:6px;">
        <?= $flash_sukses; ?>
    </div>
<?php endif; ?>

<?php if (!empty($flash_error)): ?>
    <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px;">
        <?= $flash_error; ?>
    </div>
<?php endif; ?>

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
                <a href="edit_form_biodata.php?id=<?= (int)$row['id']; ?>">Edit</a> |
                <a href="delete_biodata.php?id=<?= (int)$row['id']; ?>"
                   onclick="return confirm('Yakin hapus data ini?')">Delete</a>
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

<br>
<a href="index.php#biodata">Kembali ke Form Biodata</a>

</body>
</html>
