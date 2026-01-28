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

        <label>Kode Dosen:
          <input type="text" name="txtKodeDos" required>
        </label>

        <label>Nama Dosen:
          <input type="text" name="txtNmDosen" required>
        </label>

        <label>Alamat Rumah:
          <input type="text" name="txtAlRmh" required>
        </label>

        <label>Tanggal Jadi Dosen:
          <input type="text" name="txtTglDosen" required>
        </label>

        <label>JJA Dosen:
          <input type="text" name="txtJJA" required>
        </label>

        <label>Homebase Prodi:
          <input type="text" name="txtProdi" required>
        </label>

        <label>Nomor HP:
          <input type="text" name="txtNoHP" required>
        </label>

        <label>Nama Pasangan:
          <input type="text" name="txNamaPasangan" required>
        </label>

        <label>Nama Anak:
          <input type="text" name="txtNmAnak" required>
        </label>

        <label>Bidang Ilmu Dosen:
          <input type="text" name="txtBidangIlmu" required>
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>
    </section>

    <!-- ✅ TENTANG SAYA (BIO DOSEN) -->
    <section id="about">
      <h2>Tentang Saya</h2>
      <?php include 'read.php'; ?>
    </section>
    <!-- ✅ AMAN, TIDAK MENGHAPUS TABEL LAIN -->

    <?php
      $flash_sukses = $_SESSION['flash_sukses'] ?? '';
      $flash_error  = $_SESSION['flash_error'] ?? '';
      unset($_SESSION['flash_sukses'], $_SESSION['flash_error']);
    ?>

    <section id="contact">
      <h2>Kontak Kami</h2>

      <?php if ($flash_sukses): ?>
        <div><?= $flash_sukses; ?></div>
      <?php endif; ?>

      <?php if ($flash_error): ?>
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
