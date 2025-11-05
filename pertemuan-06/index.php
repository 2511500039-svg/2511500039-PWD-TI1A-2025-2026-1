<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Judul Halaman</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body { background-color: white; color: black; }
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

    <section id="ipk" style="background-color:white; border-radius:15px; padding:30px; max-width:700px; margin:20px auto; color:black;">
      <h2 style="text-align:center;">Nilai Saya</h2>
      <?php
      $namaMatkul1 = "Algoritma dan Struktur Data";
      $namaMatkul2 = "Agama";
      $namaMatkul3 = "Basis Data";
      $namaMatkul4 = "Pemrograman Berorientasi Objek";
      $namaMatkul5 = "Pemrograman Web Dasar";

      $sksMatkul1 = 4;
      $sksMatkul2 = 2;
      $sksMatkul3 = 4;
      $sksMatkul4 = 3;
      $sksMatkul5 = 3;

      $nilaiHadir1 = 90; $nilaiTugas1 = 60; $nilaiUTS1 = 80; $nilaiUAS1 = 70;
      $nilaiHadir2 = 70; $nilaiTugas2 = 50; $nilaiUTS2 = 60; $nilaiUAS2 = 80;
      $nilaiHadir3 = 80; $nilaiTugas3 = 70; $nilaiUTS3 = 75; $nilaiUAS3 = 85;
      $nilaiHadir4 = 85; $nilaiTugas4 = 80; $nilaiUTS4 = 70; $nilaiUAS4 = 90;
      $nilaiHadir5 = 69; $nilaiTugas5 = 80; $nilaiUTS5 = 90; $nilaiUAS5 = 100;

      function hitungNilai($hadir, $tugas, $uts, $uas) {
          return (0.1 * $hadir) + (0.2 * $tugas) + (0.3 * $uts) + (0.4 * $uas);
      }

      function hitungGrade($nilaiAkhir, $hadir) {
          if ($hadir < 70) return ["E", 0.00];
          if ($nilaiAkhir >= 91) return ["A", 4.00];
          if ($nilaiAkhir >= 81) return ["A-", 3.70];
          if ($nilaiAkhir >= 76) return ["B+", 3.30];
          if ($nilaiAkhir >= 71) return ["B", 3.00];
          if ($nilaiAkhir >= 66) return ["B-", 2.70];
          if ($nilaiAkhir >= 61) return ["C+", 2.30];
          if ($nilaiAkhir >= 56) return ["C", 2.00];
          if ($nilaiAkhir >= 51) return ["C-", 1.70];
          if ($nilaiAkhir >= 36) return ["D", 1.00];
          return ["E", 0.00];
      }

      function statusKelulusan($grade) {
          if ($grade == "D" || $grade == "E") return "Gagal";
          return "Lulus";
      }

      for ($i = 1; $i <= 5; $i++) {
          ${"nilaiAkhir$i"} = hitungNilai(${"nilaiHadir$i"}, ${"nilaiTugas$i"}, ${"nilaiUTS$i"}, ${"nilaiUAS$i"});
          list(${"grade$i"}, ${"mutu$i"}) = hitungGrade(${"nilaiAkhir$i"}, ${"nilaiHadir$i"});
          ${"status$i"} = statusKelulusan(${"grade$i"});
          ${"bobot$i"} = ${"mutu$i"} * ${"sksMatkul$i"};
      }

      $totalBobot = $bobot1 + $bobot2 + $bobot3 + $bobot4 + $bobot5;
      $totalSKS = $sksMatkul1 + $sksMatkul2 + $sksMatkul3 + $sksMatkul4 + $sksMatkul5;
      $IPK = $totalBobot / $totalSKS;

      for ($i = 1; $i <= 5; $i++) {
          echo "<div style='border-bottom:1px solid #000; margin-bottom:15px; padding-bottom:10px;'>";
          echo "<strong>Nama Matakuliah ke-$i:</strong> ${'namaMatkul'.$i}<br>";
          echo "SKS: ${'sksMatkul'.$i}<br>";
          echo "Kehadiran: ${'nilaiHadir'.$i}<br>";
          echo "Tugas: ${'nilaiTugas'.$i}<br>";
          echo "UTS: ${'nilaiUTS'.$i}<br>";
          echo "UAS: ${'nilaiUAS'.$i}<br>";
          echo "Nilai Akhir: " . number_format(${"nilaiAkhir$i"}, 2) . "<br>";
          echo "Grade: ${'grade'.$i}<br>";
          echo "Angka Mutu: " . number_format(${"mutu$i"}, 2) . "<br>";
          echo "Bobot: " . number_format(${"bobot$i"}, 2) . "<br>";
          echo "Status: ${'status'.$i}<br>";
          echo "</div>";
      }

      echo "<strong>Total Bobot:</strong> " . number_format($totalBobot, 2) . "<br>";
      echo "<strong>Total SKS:</strong> $totalSKS<br>";
      echo "<strong>IPK:</strong> " . number_format($IPK, 2) . "<br>";
      ?>
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
