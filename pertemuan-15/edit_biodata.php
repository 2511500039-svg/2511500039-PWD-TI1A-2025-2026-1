<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

/*
  Ambil nilai id dari GET dan validasi
*/
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
]);

if (!$id) {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('read_biodata.php');
}

/*
  Ambil data lama dari tbl_biodata
*/
$stmt = mysqli_prepare($conn, "SELECT id, nim, nama, email, pesan, tanggal 
                                FROM tbl_biodata WHERE id = ? LIMIT 1");
if (!$stmt) {
    $_SESSION['flash_error'] = 'Query tidak benar.';
    redirect_ke('read_biodata.php');
}

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($res);
mysqli_stmt_close($stmt);

if (!$row) {
    $_SESSION['flash_error'] = 'Data tidak ditemukan.';
    redirect_ke('read_biodata.php');
}

# Nilai awal (prefill form)
$nim   = $row['nim'] ?? '';
$nama  = $row['nama'] ?? '';
$email = $row['email'] ?? '';
$pesan = $row['pesan'] ?? '';

# Ambil error dan nilai old input jika ada
$flash_error = $_SESSION['flash_error'] ?? '';
$old = $_SESSION['old'] ?? [];
unset($_SESSION['flash_error'], $_SESSION['old']);
if (!empty($old)) {
    $nama  = $old['nama'] ?? $nama;
    $email = $old['email'] ?? $email;
    $pesan = $old['pesan'] ?? $pesan;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Biodata Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Ini Header</h1>
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
        &#9776;
    </button>
    <nav>
        <ul>
            <li><a href="#home">Beranda</a></li>
            <li><a href="#about">Tentang</a></li>
            <li><a href="#contact">Kontak</a></li>
        </ul>
    </nav>
</header>

<main>
    <section id="contact">
        <h2>Edit Biodata Mahasiswa</h2>
        <?php if (!empty($flash_error)): ?>
            <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px;">
                <?= $flash_error; ?>
            </div>
        <?php endif; ?>
        <form action="proses_update_biodata.php" method="POST">

            <!-- ID disembunyikan -->
            <input type="hidden" name="id" value="<?= (int)$id; ?>">

            <label for="txtNim"><span>NIM:</span>
                <input type="text" id="txtNim" name="nim" value="<?= htmlspecialchars($nim); ?>" readonly>
            </label>

            <label for="txtNama"><span>Nama:</span>
                <input type="text" id="txtNama" name="nama" required
                       value="<?= htmlspecialchars($nama); ?>">
            </label>

            <label for="txtEmail"><span>Email:</span>
                <input type="email" id="txtEmail" name="email" required
                       value="<?= htmlspecialchars($email); ?>">
            </label>

            <label for="txtPesan"><span>Pesan:</span>
                <textarea id="txtPesan" name="pesan" rows="4" required><?= htmlspecialchars($pesan); ?></textarea>
            </label>

            <button type="submit">Kirim</button>
            <button type="reset">Batal</button>
            <a href="read_biodata.php" class="reset">Kembali</a>
        </form>
    </section>
</main>

<script src="script.js"></script>
</body>
</html>
