<?php
session_start();
require_once __DIR__ . '/fungsi.php';
require 'koneksi.php'; // koneksi database
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
    $sql = "SELECT id, nim, nama, email, pesan, tanggal
            FROM tbl_biodata
            ORDER BY id DESC";
    $q = mysqli_query($conn, $sql);
    ?>

    <section id="about">
      <h2>Tentang Saya</h2>

      <?php if (mysqli_num_rows($q) > 0): ?>
        <table border="1" cellpadding="8" cellspacing="0">
          <tr>
            <th>No</th>
            <th>Aksi</th>
            <th>NIM</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>Pesan</th>
            <th>Tanggal</th>
          </tr>

          <?php $no = 1; ?>
          <?php while ($row = mysqli_fetch_assoc($q)): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td>
                <a href="edit_biodata.php?id=<?= (int)$row['id'] ?>">Edit</a> |
                <a href="delete_biodata.php?id=<?= (int)$row['id'] ?>" onclick="return confirm('Yakin hapus data ini?')">Delete</a>
              </td>
              <td><?= htmlspecialchars($row['nim']) ?></td>
              <td><?= htmlspecialchars($row['nama']) ?></td>
              <td><?= htmlspecialchars($row['email']) ?></td>
              <td><?= htmlspecialchars($row['pesan']) ?></td>
              <td><?= $row['tanggal'] ?></td>
            </tr>
          <?php endwhile; ?>
        </table>
      <?php else: ?>
        <p>Belum ada biodata yang tersimpan.</p>
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
