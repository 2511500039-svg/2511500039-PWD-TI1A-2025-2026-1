<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

$cid = filter_input(
    INPUT_GET,
    'cid',
    FILTER_VALIDATE_INT,
    [
        'options' => [
            'min_range' => 1
        ]
    ]
);

if (!$cid) {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('read.php');
}

$stmt = mysqli_prepare(
    $conn,
    "SELECT cid, cnama, cemail, cpesan
     FROM tbl_tamu
     WHERE cid = ? LIMIT 1"
);

if (!$stmt) {
    $_SESSION['flash_error'] = 'Query tidak benar.';
    redirect_ke('read.php');
}

mysqli_stmt_bind_param($stmt, "i", $cid);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($res);
mysqli_stmt_close($stmt);

if (!$row) {
    $_SESSION['flash_error'] = 'Record tidak ditemukan.';
    redirect_ke('read.php');
}

$nama  = $row['cnama'];
$email = $row['cemail'];
$pesan = $row['cpesan'];

$flash_error = $_SESSION['flash_error'] ?? '';
$old = $_SESSION['old'] ?? [];

unset($_SESSION['flash_error'], $_SESSION['old']);

if (!empty($old)) {
    $nama  = $old['nama']  ?? $nama;
    $email = $old['email'] ?? $email;
    $pesan = $old['pesan'] ?? $pesan;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Buku Tamu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Ini Header</h1>
</header>

<main>
<section id="contact">
    <h2>Edit Buku Tamu</h2>

    <?php if (!empty($flash_error)) : ?>
        <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px;">
            <?= $flash_error; ?>
        </div>
    <?php endif; ?>

    <form action="proses_update.php" method="POST">

         <input type="text" name="cid" value="7">

        <label>
            <span>Nama:</span>
            <input type="text" name="txtNamaEd" required
                value="<?= htmlspecialchars($nama); ?>">
        </label>

        <label>
            <span>Email:</span>
            <input type="email" name="txtEmailEd" required
                value="<?= htmlspecialchars($email); ?>">
        </label>

        <label>
            <span>Pesan Anda:</span>
            <textarea name="txtPesanEd" rows="4" required><?= htmlspecialchars($pesan); ?></textarea>
        </label>

        <label>
            <span>Captcha 2 + 3 = ?</span>
            <input type="number" name="txtCaptcha" required>
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
        <a href="read.php">Kembali</a>

    </form>
</section>
</main>

</body>
</html>
