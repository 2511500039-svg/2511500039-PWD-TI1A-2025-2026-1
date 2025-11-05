<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Judul Halaman</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body { background-color: white; color: black; font-family: Arial, sans-serif; }
    table {
      width: 90%;
      margin: 20px auto;
      border-collapse: collapse;
      text-align: center;
    }
    th, td {
      border: 1px solid #000;
      padding: 8px;
    }
    th {
      background-color: #f0f0f0;
    }
    h2 {
      text-align: center;
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
      <h2 style="text-align:center;">Nilai Saya</h2>
      <?php
   
      $matkul = [
        ["Algoritma dan Struktur Data", 4, 90, 60, 80, 70],
        ["Agama", 2, 70, 50, 60, 80],
        ["Basis Data", 4, 80, 70, 75, 85],
        ["Pemrograman Berorientasi Objek", 3, 85, 80, 70, 90],
        ["Pemrograman Web Dasar", 3, 69, 80, 90, 100]
      ];

      function hitungNilaiFinal($hadir, $tugas, $uts, $uas, $sks) {
        $nilaiAkhir = (0.1 * $hadir) + (0.2 * $tugas) + (0.3 * $uts) + (0.4 * $uas);
        if ($hadir < 70) return [$nilaiAkhir, "E", 0.00, 0.00, "GAGAL"];
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
        $status = ($grade[0] == "D" || $grade[0] == "E") ? "GAGAL" : "LULUS";
        return [$nilaiAkhir, $grade[0], $grade[1], $bobot, $status];
      }

      function tampilTabel($no, $nama, $sks, $hadir, $tugas, $uts, $uas, $akhir, $grade, $mutu, $bobot, $status) {
        echo "<table border='1' cellpadding='8' cellspacing='0' width='60%' style='margin:20px auto; border-collapse:collapse;'>";
        echo "<tr><th colspan='2' style='text-align:center;'>Nama Mata Kuliah ke-$no</th></tr>";
        echo "<tr><td>Nama Matakuliah</td><td>$nama</td></tr>";
        echo "<tr><td>SKS</td><td>$sks</td></tr>";
        echo "<tr><td>Kehadiran</td><td>$hadir</td></tr>";
        echo "<tr><td>Tugas</td><td>$tugas</td></tr>";
        echo "<tr><td>UTS</td><td>$uts</td></tr>";
        echo "<tr><td>UAS</td><td>$uas</td></tr>";
        echo "<tr><td>Nilai Akhir</td><td>".number_format($akhir,2)."</td></tr>";
        echo "<tr><td>Grade</td><td>$grade</td></tr>";
        echo "<tr><td>Angka Mutu</td><td>".number_format($mutu,2)."</td></tr>";
        echo "<tr><td>Bobot</td><td>".number_format($bobot,2)."</td></tr>";
        echo "<tr><td>Status</td><td>$status</td></tr>";
        echo "</table>";
      }

      $totalBobot = 0;
      $totalSKS = 0;
      $no = 1;

      foreach ($matkul as $m) {
        list($akhir, $grade, $mutu, $bobot, $status) = hitungNilaiFinal($m[2], $m[3], $m[4], $m[5], $m[1]);
        tampilTabel($no, $m[0], $m[1], $m[2], $m[3], $m[4], $m[5], $akhir, $grade, $mutu, $bobot, $status);
        $totalBobot += $bobot;
        $totalSKS += $m[1];
        $no++;
      }

      $IPK = $totalBobot / $totalSKS;

      echo "<table border='1' cellpadding='8' cellspacing='0' width='60%' style='margin:20px auto; border-collapse:collapse; font-weight:bold;'>";
      echo "<tr><th colspan='2' style='text-align:center;'>Rekapitulasi Nilai Akhir</th></tr>";
      echo "<tr><td>Total Bobot</td><td>".number_format($totalBobot,2)."</td></tr>";
      echo "<tr><td>Total SKS</td><td>$totalSKS</td></tr>";
      echo "<tr><td>IPK</td><td>".number_format($IPK,2)."</td></tr>";
      echo "</table>";
      ?>
    </section>

    <section id="contact">
      <h2>Kontak Kami</h2>
      <form action="" method="GET">
        <label for="txtNama"><span>Nama:</span>
          <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" required autocomplete="name">
        </label>
        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required autocomplete="email">
        </label>
        <label for="txtPesan"><span>Pesan Anda:</span>
          <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
          <small id="charCount">0/200 karakter</small>
        </label>
        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>
    </section>
  </main>

  <footer>
    <p>&copy; <?= $namaLengkap; ?> - <?= $nim; ?></p>
  </footer>

  <script src="script.js"></script>
</body>
</html>
