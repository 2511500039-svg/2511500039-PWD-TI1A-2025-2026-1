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



$errors = [];




if (!empty($errors)) {
    $_SESSION['old'] = [
        'nama'  => $nama,
        'email' => $email,
        'pesan' => $pesan
    ];

    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('edit.php?cid=' . (int)$cid);
}

$stmt = mysqli_prepare(
    $conn,
    "UPDATE tbl_tamu
     SET cnama = ?, cemail = ?, cpesan = ?
     WHERE cid = ?"
);

if (!$stmt) {
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('edit.php?cid=' . (int)$cid);
}

mysqli_stmt_bind_param($stmt, "sssi", $nama, $email, $pesan, $cid);

if (mysqli_stmt_execute($stmt)) {
    unset($_SESSION['old']);
    $_SESSION['flash_sukses'] = 'Terima kasih, data anda telah berhasil diperbarui.';
    redirect_ke('read.php');
} else {
    $_SESSION['flash_error'] = 'Data gagal diperbarui. Silakan coba lagi.';
    redirect_ke('edit.php?cid=' . (int)$cid);
}

mysqli_stmt_close($stmt);
