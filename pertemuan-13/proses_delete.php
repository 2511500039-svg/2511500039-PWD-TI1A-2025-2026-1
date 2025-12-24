<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

// $cid = filter_input(
//     INPUT_POST,
//     'cid',
//     FILTER_VALIDATE_INT,
//     [
//         'options' => [
//             'min_range' => 1
//         ]
//     ]
// );

// if (!$cid) {
//     $_SESSION['flash_error'] = 'CID tidak valid.';
//     redirect_ke('read.php');
// }




$stmt = mysqli_prepare(
    $conn,
    "DELETE tbl_tamu");
     #WHERE cid = ?");

if (!$stmt) {
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('read.php');
}

#mysqli_stmt_bind_param($stmt, "sssi", $nama, $email, $pesan, $cid);

if (mysqli_stmt_execute($stmt)) {
    
    $_SESSION['flash_sukses'] = 'Terima kasih, data anda telah berhasil dihapus.';
} else {
    $_SESSION['flash_error'] = 'Data gagal dihapus. Silakan coba lagi.';
}

mysqli_stmt_close($stmt);

redirect_ke('read.php');