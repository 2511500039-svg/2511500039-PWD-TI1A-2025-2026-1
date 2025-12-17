<?php
session_start();
require_once __DIR__ . '/fungsi.php';

/* captcha statis sederhana */
$_SESSION['captcha_jawaban'] = 5;
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
      <h2>Biodata Sederhana Mahasiswa</h2>
      <form action="proses.php" method="POST">

        <label>
          <span>NIM:</span>
          <input type="text" name="txtNim" required>
        </label>

        <label>
          <span>Nama Lengkap:</span>
          <input type="text" name="txtNmLengkap" required>
        </label>

        <label>
          <span>Tempat Lahir:</span>
          <input type="text" name="txtT4Lhr" required>
        </label>

        <label>
          <span>Tanggal Lahir:</span>
          <input type="text" name="txtTglLhr" required>
        </label>

        <label>
          <span>Hobi:</span>
          <input type="text" name="txtHobi" required>
        </label>

        <label>
          <span>Pasangan:</span>
          <input type="text" name="txtPasangan" required>
        </label>

        <label>
          <span>Pekerjaan:</span>
          <input type="text" name="txtKerja" required>
        </label>

        <label>
          <span>Nama Orang Tua:</span>
          <input type="text" name="txtNmOrtu" required>
        </label>

        <label>
          <span>Nama Kakak:</span>
          <input type="text" name="txtNmKakak" required>
        </label>

        <label>
          <span>Nama Adik:</span>
          <input type="text" name="txtNmAdik" required>
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>
    </section>

    <?php
    $biodata = $_SESSION["biodata"] ?? [];

    $fieldConfig = [
      "nim" => ["label" => "NIM:", "suffix" => ""],
      "nama" => ["label" => "Nama Lengkap:", "suffix" => " 😎"],
      "tempat" => ["label" => "Tempat Lahir:", "suffix" => ""],
      "tanggal" => ["label" => "Tanggal Lahir:", "suffix" => ""],
      "hobi" => ["label" => "Hobi:", "suffix" => " 🎵"],
      "pasangan" => ["label" => "Pasangan:", "suffix" => " ♥"],
      "pekerjaan" => ["label" => "Pekerjaan:", "suffix" => ""],
      "ortu" => ["label" => "Nama Orang Tua:", "suffix" => ""],
      "kakak" => ["label" => "Nama Kakak:", "suffix" => ""],
      "adik" => ["label" => "Nama Adik:", "suffix" => ""],
    ];
    ?>

    <section id="about">
      <h2>Tentang Saya</h2>
      <?= tampilkanBiodata($fieldConfig, $biodata) ?>
    </section>

    <?php
    $flash_success = $_SESSION['flash_sukses'] ?? '';
    $flash_error   = $_SESSION['flash_error'] ?? '';
    $old           = $_SESSION['old'] ?? [];

    unset($_SESSION['flash_sukses'], $_SESSION['flash_error'], $_SESSION['old']);
    ?>

    <section id="contact">
      <h2>Kontak Kami</h2>

      <?php if (!empty($flash_success)): ?>
        <div style="background:#d4edda; padding:10px;">
          <?= $flash_success ?>
        </div>
      <?php endif; ?>

      <?php if (!empty($flash_error)): ?>
        <div style="background:#f8d7da; padding:10px;">
          <?= $flash_error ?>
        </div>
      <?php endif; ?>

      <form action="proses.php" method="POST">

        <!-- CID (disengaja untuk pembelajaran, best practice: hidden) -->
        <input type="text" name="cid" value="7">

        <label>
          <span>Nama:</span>
          <input type="text" name="txtNama" required
            value="<?= htmlspecialchars($old['nama'] ?? '') ?>">
        </label>

        <label>
          <span>Email:</span>
          <input type="email" name="txtEmail" required
            value="<?= htmlspecialchars($old['email'] ?? '') ?>">
        </label>

        <label>
          <span>Pesan Anda:</span>
          <textarea name="txtPesan" rows="4" required><?= htmlspecialchars($old['pesan'] ?? '') ?></textarea>
        </label>

        <label>
          <span>Captcha  2 × 3 = ? :</span>
          <input type="text" name="captcha" required placeholder="Jawaban captcha">
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

      <hr>
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
