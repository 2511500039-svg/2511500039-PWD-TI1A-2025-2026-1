<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nilai Mahasiswa</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body { background-color: white; color: black; font-family: Arial, sans-serif; }
    table {
      width: 70%;
      margin: 25px auto;
      border-collapse: collapse;
      text-align: center;
    }
    th, td {
      border: 1px solid #000;
      padding: 8px;
    }
    th {
      background-color: #f0f8ff;
      color: blue;
    }
    h2 {
      text-align: center;
      color: blue;
    }
    strong {
      color: blue;
    }
  </style>
</head>

<body>
  <header>
    <h1>My Website</h1>
    <button class="menu-toggle" id="menu-toggle" aria-label="Toggle Navigation">&#9776;</button>
    <nav>
      <ul>
        <li><a href="#home">Beranda</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#ipk">IPK</a></li>
        <li><a href="#contact">Kontak</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="home">
      <h2>Selamat Datang</h2>
      <?php
      echo "Halo dunia!<br>";
      echo "Nama saya Alkautsar";
      ?>
      <p>Ini contoh paragraf HTML.</p>
    </section>

    <section id="about">
      <?php
      $nim = "2511500039";
      $namaLengkap = "Muhammad Alkautsar Dirgantara";
      $orangTua = "Yurinalika (ibu), Ridwan (ayah)";
      $saudara = "Muhammad Aldhio Nanda Sepbriano (Kakak laki-laki)";
      $tempatTinggal = "Komplek Timah Sampur Atas, Gang Safir Biru XV";
      $tempatLahir = "Pangkalpinang";
      $tanggalLahir = "08 April 2007";
      $hobi = "Bermain game, membaca komik, dan mendengarkan musik 🎵";
      $pasangan = "Pacar ada, Destania Idhila ♥";
      $pekerjaan = "Tidak bekerja tapi seorang mahasiswa ©";
      $motto = "Makanlah sebelum merasa kelaparan";
      ?>
      <h2>Tentang Saya</h2>
      <p><strong>NIM:</strong> <?= $nim; ?></p>
      <p><strong>Nama Lengkap:</strong> <?= $namaLengkap; ?></p>
      <p><strong>Nama Orang Tua:</strong> <?= $orangTua; ?></p>
      <p><strong>Nama Saudara:</strong> <?= $saudara; ?></p>
      <p><strong>Tempat Tinggal:</strong> <?= $tempatTinggal; ?></p>
      <p><strong>Tempat Lahir:</strong> <?= $tempatLahir; ?></p>
      <p><strong>Tanggal Lahir:</strong> <?= $tanggalLahir; ?></p>
      <p><strong>Hobi:</strong> <?= $hobi; ?></p>
      <p><strong>Pasangan:</strong> <?= $pasangan; ?></p>
      <p><strong>Pekerjaan:</strong> <?= $pekerjaan; ?></p>
      <p><strong>Motto Hidup:</strong> <?= $motto; ?></p>
    </section>

<section id="ipk" style="background-color:white; padding:30px; color:black;">
  <h2>Nilai Saya</h2>

  <?php
  // --- Data mata kuliah sesuai instruksi ---
  $matkul = [
    ["Pemrograman Web Dasar", 4, 90, 60, 80, 70],
    ["Logika Informatika", 3, 69, 80, 90, 100],
    ["Konsep Basis Data", 4, 80, 70, 75, 85],
    ["Kalkulus", 2, 70, 50, 60, 80],
    ["Aplikasi Perkantoran", 3, 85, 80, 70, 90]
  ];

  function hitungNilai($hadir, $tugas, $uts, $uas, $sks) {
    $nilaiAkhir = (0.1 * $hadir) + (0.2 * $tugas) + (0.3 * $uts) + (0.4 * $uas);
    if ($hadir < 70) return [$nilaiAkhir, "E", 0.00, 0.00, "Gagal"];
    elseif ($nilaiAkhir >= 91) $grade = ["A", 4.00];
    elseif ($nilaiAkhir >= 81) $grade = ["A-", 3.70];
    elseif ($nilaiAkhir >= 76) $grade = ["B+", 3.30];
    elseif ($nilaiAkhir >= 71) $grade = ["B", 3.00];
    elseif ($nilaiAkhir >= 66) $grade = ["B-", 2.70];
    elseif ($nilaiAkhir >= 61) $grade = ["C+", 2.30];
    elseif ($nilaiAkhir >= 56) $grade = ["C", 2.00];
    elseif ($nilaiAkhir >= 51) $grade = ["C-", 1.70];
    elseif ($nilaiAkhir >= 36) $grade = ["D", 1.00];
    else $grade = ["E", 0.00];
    $bobot = $grade[1] * $sks;
    $status = ($grade[0] == "D" || $grade[0] == "E") ? "Gagal" : "Lulus";
    return [$nilaiAkhir, $grade[0], $grade[1], $bobot, $status];
  }

  $totalBobot = 0; $totalSKS = 0;

  // --- Tampilkan tabel per mata kuliah ---
  foreach ($matkul as $i => $m) {
    list($nama, $sks, $hadir, $tugas, $uts, $uas) = $m;
    list($nilaiAkhir, $grade, $mutu, $bobot, $status) = hitungNilai($hadir, $tugas, $uts, $uas, $sks);
    $totalBobot += $bobot;
    $totalSKS += $sks;
  ?>

  <table>
    <tr><th colspan="2"><?= $nama; ?></th></tr>
    <tr><td><strong>SKS</strong></td><td><?= $sks; ?></td></tr>
    <tr><td><strong>Kehadiran</strong></td><td><?= $hadir; ?></td></tr>
    <tr><td><strong>Tugas</strong></td><td><?= $tugas; ?></td></tr>
    <tr><td><strong>UTS</strong></td><td><?= $uts; ?></td></tr>
    <tr><td><strong>UAS</strong></td><td><?= $uas; ?></td></tr>
    <tr><td><strong>Nilai Akhir</strong></td><td><?= number_format($nilaiAkhir,2); ?></td></tr>
    <tr><td><strong>Grade</strong></td><td><?= $grade; ?></td></tr>
    <tr><td><strong>Angka Mutu</strong></td><td><?= number_format($mutu,2); ?></td></tr>
    <tr><td><strong>Bobot</strong></td><td><?= number_format($bobot,2); ?></td></tr>
    <tr><td><strong>Status</strong></td><td><?= $status; ?></td></tr>
  </table>

  <?php } ?>

  <h2>Rekapitulasi IPK</h2>
  <table>
    <tr><th>Total Bobot</th><td><?= number_format($totalBobot,2); ?></td></tr>
    <tr><th>Total SKS</th><td><?= $totalSKS; ?></td></tr>
    <tr><th>IPK</th><td><?= number_format($totalBobot / $totalSKS,2); ?></td></tr>
  </table>

</section>

<section id="contact">
  <h2>Kontak Kami</h2>
  <form action="" method="GET">
    <label for="txtNama"><span>Nama:</span>
      <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" required>
    </label>
    <label for="txtEmail"><span>Email:</span>
      <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required>
    </label>
    <label for="txtPesan"><span>Pesan Anda:</span>
      <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
    </label>
    <button type="submit">Kirim</button>
    <button type="reset">Batal</button>
  </form>
</section>

  </main>

  <footer>
    <p>&copy; <?= $namaLengkap; ?> - <?= $nim; ?></p>
  </footer>
</body>
</html>
