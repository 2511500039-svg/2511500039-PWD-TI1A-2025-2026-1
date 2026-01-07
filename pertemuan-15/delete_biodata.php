<?php
session_start();
require 'koneksi.php';
require_once __DIR__ . '/fungsi.php';

# validasi parameter id
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
  $_SESSION['flash_error'] = 'ID tidak valid.';
  redirect_ke('index.php#contact');
}

# siapkan query DELETE dengan prepared statement
$sql = "DELETE FROM tbl_biodata WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
  $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
  redirect_ke('index.php#contact');
}

mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
  $_SESSION['flash_sukses'] = 'Data biodata berhasil dihapus.';
} else {
  $_SESSION['flash_error'] = 'Data biodata gagal dihapus.';
}

mysqli_stmt_close($stmt);
redirect_ke('index.php#contact');
