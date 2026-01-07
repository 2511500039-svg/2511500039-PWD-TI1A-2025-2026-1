<?php
session_start();
require 'koneksi.php';
require_once 'fungsi.php';

/* Ambil ID dari URL dan validasi */
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
]);

if (!$id) {
    $_SESSION['flash_error'] = 'ID tidak valid.';
    redirect_ke('read_biodata.php');
}

/* Ambil data biodata berdasarkan ID */
$sql = "SELECT id, nim, nama, email, pesan FROM tbl_biodata WHERE id = ? LIMIT 1";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$data) {
    $_SESSION['flash_error'] = 'Data tidak ditemukan.';
    redirect_ke('read_biodata.php');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Biodata Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Edit Biodata Mahasiswa</h2>

<?php if (!empty($_SESSION['flash_sukses'])): ?>
    <div style="padding:10px; margin-bottom:10px; background:#d4edda; color:#155724; border-radius:6px;">
        <?= $_SESSION['flash_sukses']; unset($_SESSION['flash_sukses']); ?>
    </div>
<?php endif; ?>

<?php if (!empty($_SESSION['flash_error'])): ?>
    <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px;">
        <?= $_SESSION['flash_error']; unset($_SESSION['flash_error']); ?>
    </div>
<?php endif; ?>

<form action="proses_update_biodata.php" method="POST">
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Pesan</th>
        <th>Aksi</th>
    </tr>
    <tr>
        <!-- ID disembunyikan -->
        <input type="hidden" name="id" value="<?= (int)$data['id']; ?>">
        
        <td><input type="text" name="nim" value="<?= htmlspecialchars($data['nim']); ?>" readonly></td>
        <td><input type="text" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" required></td>
        <td><input type="email" name="email" value="<?= htmlspecialchars($data['email']); ?>" required></td>
        <td><textarea name="pesan" rows="2" required><?= htmlspecialchars($data['pesan']); ?></textarea></td>
        <td>
            <button type="submit">Simpan</button>
            <a href="read_biodata.php"><button type="button">Batal</button></a>
        </td>
    </tr>
</table>
</form>

</body>
</html>
