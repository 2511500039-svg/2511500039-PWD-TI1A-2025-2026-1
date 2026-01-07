<?php
session_start();
require 'koneksi.php';

/* 
  Ambil id dari URL dan validasi
*/
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, [
  'options' => ['min_range' => 1]
]);

if (!$id) {
  die('ID tidak valid');
}

/*
  Ambil data biodata berdasarkan ID
*/
$sql = "SELECT id, nim, nama, email, pesan 
        FROM tbl_biodata 
        WHERE id = ? 
        LIMIT 1";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$data) {
  die('Data tidak ditemukan');
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

<h2>Edit Biodata Sederhana Mahasiswa</h2>

<form action="proses_update_biodata.php" method="POST">

  <!-- ID disembunyikan -->
  <input type="hidden" name="id" value="<?= (int)$data['id']; ?>">

  <label>
    <span>NIM:</span>
    <!-- NIM readonly sesuai instruksi soal -->
    <input type="text" name="nim" 
           value="<?= htmlspecialchars($data['nim']); ?>" 
           readonly>
  </label>

  <label>
    <span>Nama:</span>
    <input type="text" name="nama" 
           value="<?= htmlspecialchars($data['nama']); ?>" 
           required>
  </label>

  <label>
    <span>Email:</span>
    <input type="email" name="email" 
           value="<?= htmlspecialchars($data['email']); ?>" 
           required>
  </label>

  <label>
    <span>Pesan:</span>
    <textarea name="pesan" rows="4" required><?= 
      htmlspecialchars($data['pesan']); 
    ?></textarea>
  </label>

  <!-- Tombol mengikuti pola Kirim & Batal -->
  <button type="submit">Kirim</button>
  <button type="reset">Batal</button>
  <a href="read_biodata.php">Kembali</a>

</form>

</body>
</html>
