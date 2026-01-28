<?php
session_start();
require_once __DIR__ . '/fungsi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Judul Halaman</title>
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
    <section id="home">
      <h2>Selamat Datang</h2>
      <?php
      echo "halo dunia!<br>";
      echo "nama saya hadi";
      ?>
      <p>Ini contoh paragraf HTML.</p>
    </section>

    <section id="biodata">
      <h2>Biodata Dosen</h2>
      <form action="proses_bio.php" method="POST">

        <label for="txtKodeDos"><span>Kode Dosen:</span>
          <input type="text" id="txtKodeDos" name="txtKodeDos" required>
        </label>

        <label for="txtNmDosen"><span>Nama Dosen:</span>
          <input type="text" id="txtNmDosen" name="txtNmDosen" required>
        </label>

        <label for="txtAlRmh"><span>Alamat Rumah:</span>
          <input type="text" id="txtAlRmh" name="txtAlRmh" required>
        </label>

        <label for="txtTglDosen"><span>Tanggal Jadi Dosen:</span>
          <input type="text" id="txtTglDosen" name="txtTglDosen" required>
        </label>

        <label for="txtJJA"><span>JJA Dosen:</span>
          <input type="text" id="txtJJA" name="txtJJA" required>
        </label>

        <label for="txtProdi"><span>Homebase Prodi:</span>
          <input type="text" id="txtProdi" name="txtProdi" required>
        </label>

        <label for="txtNoHP"><span>Nomor HP:</span>
          <input type="text" id="txtNoHP" name="txtNoHP" required>
        </label>

        <label for="txNamaPasangan"><span>Nama Pasangan:</span>
          <input type="text" id="txNamaPasangan" name="txNamaPasangan" required>
        </label>

        <label for="txtNmAnak"><span>Nama Anak:</span>
          <input type="text" id="txtNmAnak" name="txtNmAnak" required>
        </label>

        <label for="txtBidangIlmu"><span>Bidang Ilmu Dosen:</span>
          <input type="text" id="txtBidangIlmu" name="txtBidangIlmu" required>
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>
    </section>

    <!-- ✅ BAGIAN YANG DIPERBAIKI -->
    <section id="about">
      <h2>Tentang Saya</h2>
      <?php include 'read_Bio.php'; ?>
    </section>
    <!-- ✅ SELESAI -->

    <?php
    $flash_sukses = $_SESSION['flash_sukses'] ?? '';
    $flash_error  = $_SESSION['flash_error'] ?? '';
    $old          = $_SESSION['old'] ?? [];

    unset($_SESSION['flash_sukses'], $_SESSION['flash_error'], $_SESSION['old']);
    ?>

    <section id="contact">
      <h2>Kontak Kami</h2>

      <?php if (!empty($flash_sukses)): ?>
        <div><?= $flash_sukses; ?></div>
      <?php endif; ?>

      <?php if (!empty($flash_error)): ?>
        <div><?= $flash_error; ?></div>
      <?php endif; ?>

      <form action="proses.php" method="POST">
        <label>Nama:
          <input type="text" name="txtNama" required>
        </label>

        <label>Email:
          <input type="email" name="txtEmail" required>
        </label>

        <label>Pesan:
          <textarea name="txtPesan" required></textarea>
        </label>

        <label>Captcha 2 + 3 = ?
          <input type="number" name="txtCaptcha" required>
        </label>

        <button type="submit">Kirim</button>
      </form>

      <hr>
      <h2>Yang menghubungi kami</h2>
      <?php include 'read_inc.php'; ?>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Yohanes Setiawan Japriadi</p>
  </footer>
</body>
</html>
