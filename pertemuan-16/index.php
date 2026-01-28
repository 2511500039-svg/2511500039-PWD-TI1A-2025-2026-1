<?php
session_start();
require_once __DIR__ . '/fungsi.php';
require_once __DIR__ . '/koneksi.php';
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
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">&#9776;</button>
    <nav>
      <ul>
        <li><a href="#home">Beranda</a></li>
        <li><a href="#biodata">Biodata Dosen</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#contact">Kontak</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="home">
      <h2>Selamat Datang</h2>
      <p>Ini halaman utama. Halo dunia! Nama saya Hadi.</p>
    </section>

    <!-- =============================
         NO. 2–5: BIODATA DOSEN CRUD
         ============================= -->
    <section id="biodata">
      <h2>Biodata Dosen</h2>

      <?php include 'read_dosen_inc.php'; ?>

      <h3>Tambah / Edit Biodata</h3>
      <form action="proses_bio.php" method="POST">
        <label>Kode Dosen: <input type="text" name="txtKodeDos" required></label>
        <label>Nama Dosen: <input type="text" name="txtNmDosen" required></label>
        <label>Alamat Rumah: <input type="text" name="txtAlRmh" required></label>
        <label>Tanggal Jadi Dosen: <input type="date" name="txtTglDosen" required></label>
        <label>JJA Dosen: <input type="text" name="txtJJA" required></label>
        <label>Homebase Prodi: <input type="text" name="txtProdi" required></label>
        <label>Nomor HP: <input type="text" name="txtNoHP" required></label>
        <label>Nama Pasangan: <input type="text" name="txNamaPasangan"></label>
        <label>Nama Anak: <input type="text" name="txtNmAnak"></label>
        <label>Bidang Ilmu: <input type="text" name="txtBidangIlmu"></label>
        <button type="submit">Simpan</button>
        <button type="reset">Batal</button>
      </form>
    </section>

    <!-- =============================
         NO. 6–9: FORM & READ TAMU
         ============================= -->
    <section id="contact">
      <h2>Kontak Kami</h2>

      <?php
      $flash_sukses = $_SESSION['flash_sukses'] ?? '';
      $flash_error  = $_SESSION['flash_error'] ?? '';
      $old          = $_SESSION['old'] ?? [];
      unset($_SESSION['flash_sukses'], $_SESSION['flash_error'], $_SESSION['old']);
      ?>

      <?php if($flash_sukses): ?>
        <div style="padding:10px; margin-bottom:10px; background:#d4edda; color:#155724;">
          <?= $flash_sukses ?>
        </div>
      <?php endif; ?>

      <?php if($flash_error): ?>
        <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24;">
          <?= $flash_error ?>
        </div>
      <?php endif; ?>

      <form action="proses.php" method="POST">
        <label>Nama: <input type="text" name="txtNama" required value="<?= $old['nama'] ?? '' ?>"></label>
        <label>Email: <input type="email" name="txtEmail" required value="<?= $old['email'] ?? '' ?>"></label>
        <label>Pesan: <textarea name="txtPesan" required><?= $old['pesan'] ?? '' ?></textarea></label>
        <label>Captcha 2 + 3 = ? <input type="number" name="txtCaptcha" required value="<?= $old['captcha'] ?? '' ?>"></label>
        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

      <h3>Daftar Tamu</h3>
      <?php include 'read_inc.php'; ?>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Yohanes Setiawan Japriadi [0344300002]</p>
  </footer>
</body>
</html>
