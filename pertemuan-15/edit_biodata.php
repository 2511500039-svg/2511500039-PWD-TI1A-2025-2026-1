<?php
session_start();
require 'koneksi.php';
require_once 'fungsi.php';

// Ambil ID dari URL dan validasi
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
]);

if (!$id) {
    $_SESSION['flash_error'] = 'ID tidak valid.';
    redirect_ke('read_biodata.php');
}

// Ambil data dari database
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

// Ambil flash message jika ada
$flash_error = $_SESSION['flash_error'] ?? '';
unset($_SESSION['flash_error']);
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

<?php if (!empty($flash_error)): ?>
    <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px;">
        <?= $flash_error ?>
    </div>
<?php endif; ?>

<form action="proses_update_biodata.php" method="POST">

    <!-- ID disembunyikan -->
    <input type="hidden" name="id" value="<?= (int)$data['id']; ?>">

    <label>
        NIM:<br>
        <input type="text" name="nim" value="<?= htmlspecialchars($data['nim']); ?>" readonly>
    </label>
    <br><br>

    <label>
        Nama:<br>
        <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" required>
    </label>
    <br><br>

    <label>
        Email:<br>
        <input type="email" name="email" value="<?= htmlspecialchars($data['email']); ?>" required>
    </label>
    <br><br>

    <label>
        Pesan:<br>
        <textarea name="pesan" rows="4" required><?= htmlspecialchars($data['pesan']); ?></textarea>
    </label>
    <br><br>

    <button type="submit">Update</button>
    <a href="read_biodata.php">Batal</a>

</form>

</body>
</html>
