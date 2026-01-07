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
    <!-- ================= HOME ================= -->
    <section id="home">
      <h2>Selamat Datang</h2>
      <?php
      echo "halo dunia!<br>";
      echo "nama saya hadi";
      ?>
      <p>Ini contoh paragraf HTML.</p>
    </section>

    <!-- ================= BIODATA ================= -->
    <?php
    $flash_biodata = $_SESSION['flash_biodata'] ?? '';
    $old_biodata   = $_SESSION['old_biodata'] ?? [];
    unset($_SESSION['flash_biodata'], $_SESSION['old_biodata']);
    ?>
    <section id="biodata">
      <h2>Biodata Sederhana Mahasiswa</h2>

      <?php if (!empty($flash_biodata)): ?>
        <div style="padding:10px; margin-bottom:10px; background:#d4edda; color:#155724; border-radius:6px;">
          <?= $flash_biodata; ?>
        </div>
      <?php endif; ?>

      <form action="proses_biodata.php" method="POST">

        <label for="txtNim"><span>NIM:</span>
          <input type="text" id="txtNim" name="txtNim" placeholder="Masukkan NIM" required
            value="<?= htmlspecialchars($old_biodata['nim'] ?? '') ?>">
        </label>

        <label for="txtNmLengkap"><span>Nama Lengkap:</span>
          <input type="text" id="txtNmLengkap" name="txtNmLengkap" placeholder="Masukkan Nama Lengkap" required
            value="<?= htmlspecialchars($old_biodata['nama'] ?? '') ?>">
        </label>

        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan Email" required
            value="<?= htmlspecialchars($old_biodata['email'] ?? '') ?>">
        </label>

        <label for="txtPesan"><span>Pesan:</span>
          <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan..." required><?= htmlspecialchars($old_biodata['pesan'] ?? '') ?></textarea>
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>
    </section>

    <!-- ================= TENTANG SAYA ================= -->
    <?php
    $biodata_session = $_SESSION["biodata"] ?? [];
    ?>
    <section id="about">
      <h2>Tentang Saya</h2>

      <?php if (!empty($biodata_session)): ?>
        <p><strong>NIM:</strong> <?= htmlspecialchars($biodata_session['nim'] ?? '-') ?></p>
        <p><strong>Nama:</strong> <?= htmlspecialchars($biodata_session['nama'] ?? '-') ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($biodata_session['email'] ?? '-') ?></p>
        <p><strong>Pesan:</strong> <?= htmlspecialchars($biodata_session['pesan'] ?? '-') ?></p>
        <p><strong>Tanggal:</strong> <?= htmlspecialchars($biodata_session['tanggal'] ?? '-') ?></p>
      <?php else: ?>
        <p>Belum ada biodata yang disimpan.</p>
      <?php endif; ?>
    </section>

    <!-- ================= CONTACT ================= -->
    <?php
    $flash_sukses = $_SESSION['flash_sukses'] ?? '';
    $flash_error  = $_SESSION['flash_error'] ?? '';
    $old          = $_SESSION['old'] ?? [];
    unset($_SESSION['flash_sukses'], $_SESSION['flash_error'], $_SESSION['old']);
    ?>
    <section id="contact">
      <h2>Kontak Kami</h2>

      <?php if (!empty($flash_sukses)): ?>
        <div style="padding:10px; margin-bottom:10px; background:#d4edda; color:#155724; border-radius:6px;">
          <?= $flash_sukses; ?>
        </div>
      <?php endif; ?>

      <?php if (!empty($flash_error)): ?>
        <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px;">
          <?= $flash_error; ?>
        </div>
      <?php endif; ?>

      <form action="proses.php" method="POST">

        <label for="txtNama"><span>Nama:</span>
          <input type="text" id="txtNama" name="txtNama" required
            value="<?= htmlspecialchars($old['nama'] ?? '') ?>">
        </label>

        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" required
            value="<?= htmlspecialchars($old['email'] ?? '') ?>">
        </label>

        <label for="txtPesan"><span>Pesan Anda:</span>
          <textarea id="txtPesan" name="txtPesan" rows="4" required><?= htmlspecialchars($old['pesan'] ?? '') ?></textarea>
        </label>

        <label for="txtCaptcha"><span>Captcha 2 + 3 = ?</span>
          <input type="number" id="txtCaptcha" name="txtCaptcha" required
            value="<?= htmlspecialchars($old['captcha'] ?? '') ?>">
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

      <br><hr>
      <h2>Yang menghubungi kami</h2>
      <?php include 'read_inc.php'; ?>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Yohanes Setiawan Japriadi [0344300002]</p>
  </footer>

  <script src="script.js"></script>
</body>
</html>
