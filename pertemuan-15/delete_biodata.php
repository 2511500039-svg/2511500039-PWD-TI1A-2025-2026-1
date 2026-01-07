<?php
session_start();
require 'koneksi.php';
require_once __DIR__ . '/fungsi.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, [
  'options' => ['min_range' => 1]
]);

if (!$id) {
  $_SESSION['flash_error'] = 'ID tidak valid.';
  redirect_ke('read_biodata.php');
}

$sql = "DELETE FROM tbl_biodata WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
  $_SESSION['flash_error'] = 'Terjadi kesalahan sistem.';
  redirect_ke('read_biodata.php');
}

mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
  $_SESSION['flash_sukses'] = 'Data biodata berhasil dihapus.';
} else {
  $_SESSION['flash_error'] = 'Data biodata gagal dihapus.';
}

mysqli_stmt_close($stmt);
redirect_ke('read_biodata.php');
