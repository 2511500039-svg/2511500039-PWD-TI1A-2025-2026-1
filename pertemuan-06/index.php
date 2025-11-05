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
  $namaMatkul1 = "Algoritma dan Struktur Data";
  $sksMatkul1 = 4; $nilaiHadir1 = 90; $nilaiTugas1 = 60; $nilaiUTS1 = 80; $nilaiUAS1 = 70;

  $namaMatkul2 = "Agama";
  $sksMatkul2 = 2; $nilaiHadir2 = 70; $nilaiTugas2 = 50; $nilaiUTS2 = 60; $nilaiUAS2 = 80;

  $namaMatkul3 = "Basis Data";
  $sksMatkul3 = 4; $nilaiHadir3 = 80; $nilaiTugas3 = 70; $nilaiUTS3 = 75; $nilaiUAS3 = 85;

  $namaMatkul4 = "Pemrograman Berorientasi Objek";
  $sksMatkul4 = 3; $nilaiHadir4 = 85; $nilaiTugas4 = 80; $nilaiUTS4 = 70; $nilaiUAS4 = 90;

  $namaMatkul5 = "Pemrograman Web Dasar";
  $sksMatkul5 = 3; $nilaiHadir5 = 69; $nilaiTugas5 = 80; $nilaiUTS5 = 90; $nilaiUAS5 = 100;

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

  list($nilaiAkhir1, $grade1, $mutu1, $bobot1, $status1) = hitungNilai($nilaiHadir1, $nilaiTugas1, $nilaiUTS1, $nilaiUAS1, $sksMatkul1);
  list($nilaiAkhir2, $grade2, $mutu2, $bobot2, $status2) = hitungNilai($nilaiHadir2, $nilaiTugas2, $nilaiUTS2, $nilaiUAS2, $sksMatkul2);
  list($nilaiAkhir3, $grade3, $mutu3, $bobot3, $status3) = hitungNilai($nilaiHadir3, $nilaiTugas3, $nilaiUTS3, $nilaiUAS3, $sksMatkul3);
  list($nilaiAkhir4, $grade4, $mutu4, $bobot4, $status4) = hitungNilai($nilaiHadir4, $nilaiTugas4, $nilaiUTS4, $nilaiUAS4, $sksMatkul4);
  list($nilaiAkhir5, $grade5, $mutu5, $bobot5, $status5) = hitungNilai($nilaiHadir5, $nilaiTugas5, $nilaiUTS5, $nilaiUAS5, $sksMatkul5);

  $totalBobot = $bobot1 + $bobot2 + $bobot3 + $bobot4 + $bobot5;
  $totalSKS = $sksMatkul1 + $sksMatkul2 + $sksMatkul3 + $sksMatkul4 + $sksMatkul5;
  $IPK = $totalBobot / $totalSKS;
  ?>

  <div style="width:70%;margin:auto;">
    <p><strong>Nama Matakuliah ke-1:</strong> <?= $namaMatkul1; ?></p>
    <p><strong>SKS:</strong> <?= $sksMatkul1; ?></p>
    <p><strong>Kehadiran:</strong> <?= $nilaiHadir1; ?></p>
    <p><strong>Tugas:</strong> <?= $nilaiTugas1; ?></p>
    <p><strong>UTS:</strong> <?= $nilaiUTS1; ?></p>
    <p><strong>UAS:</strong> <?= $nilaiUAS1; ?></p>
    <p><strong>Nilai Akhir:</strong> <?= number_format($nilaiAkhir1,2); ?></p>
    <p><strong>Grade:</strong> <?= $grade1; ?></p>
    <p><strong>Angka Mutu:</strong> <?= number_format($mutu1,2); ?></p>
    <p><strong>Bobot:</strong> <?= number_format($bobot1,2); ?></p>
    <p><strong>Status:</strong> <?= $status1; ?></p>
    <hr>

    <p><strong>Nama Matakuliah ke-2:</strong> <?= $namaMatkul2; ?></p>
    <p><strong>SKS:</strong> <?= $sksMatkul2; ?></p>
    <p><strong>Kehadiran:</strong> <?= $nilaiHadir2; ?></p>
    <p><strong>Tugas:</strong> <?= $nilaiTugas2; ?></p>
    <p><strong>UTS:</strong> <?= $nilaiUTS2; ?></p>
    <p><strong>UAS:</strong> <?= $nilaiUAS2; ?></p>
    <p><strong>Nilai Akhir:</strong> <?= number_format($nilaiAkhir2,2); ?></p>
    <p><strong>Grade:</strong> <?= $grade2; ?></p>
    <p><strong>Angka Mutu:</strong> <?= number_format($mutu2,2); ?></p>
    <p><strong>Bobot:</strong> <?= number_format($bobot2,2); ?></p>
    <p><strong>Status:</strong> <?= $status2; ?></p>
    <hr>

    <p><strong>Nama Matakuliah ke-3:</strong> <?= $namaMatkul3; ?></p>
    <p><strong>SKS:</strong> <?= $sksMatkul3; ?></p>
    <p><strong>Kehadiran:</strong> <?= $nilaiHadir3; ?></p>
    <p><strong>Tugas:</strong> <?= $nilaiTugas3; ?></p>
    <p><strong>UTS:</strong> <?= $nilaiUTS3; ?></p>
    <p><strong>UAS:</strong> <?= $nilaiUAS3; ?></p>
    <p><strong>Nilai Akhir:</strong> <?= number_format($nilaiAkhir3,2); ?></p>
    <p><strong>Grade:</strong> <?= $grade3; ?></p>
    <p><strong>Angka Mutu:</strong> <?= number_format($mutu3,2); ?></p>
    <p><strong>Bobot:</strong> <?= number_format($bobot3,2); ?></p>
    <p><strong>Status:</strong> <?= $status3; ?></p>
    <hr>

    <p><strong>Nama Matakuliah ke-4:</strong> <?= $namaMatkul4; ?></p>
    <p><strong>SKS:</strong> <?= $sksMatkul4; ?></p>
    <p><strong>Kehadiran:</strong> <?= $nilaiHadir4; ?></p>
    <p><strong>Tugas:</strong> <?= $nilaiTugas4; ?></p>
    <p><strong>UTS:</strong> <?= $nilaiUTS4; ?></p>
    <p><strong>UAS:</strong> <?= $nilaiUAS4; ?></p>
    <p><strong>Nilai Akhir:</strong> <?= number_format($nilaiAkhir4,2); ?></p>
    <p><strong>Grade:</strong> <?= $grade4; ?></p>
    <p><strong>Angka Mutu:</strong> <?= number_format($mutu4,2); ?></p>
    <p><strong>Bobot:</strong> <?= number_format($bobot4,2); ?></p>
    <p><strong>Status:</strong> <?= $status4; ?></p>
    <hr>

    <p><strong>Nama Matakuliah ke-5:</strong> <?= $namaMatkul5; ?></p>
    <p><strong>SKS:</strong> <?= $sksMatkul5; ?></p>
    <p><strong>Kehadiran:</strong> <?= $nilaiHadir5; ?></p>
    <p><strong>Tugas:</strong> <?= $nilaiTugas5; ?></p>
    <p><strong>UTS:</strong> <?= $nilaiUTS5; ?></p>
    <p><strong>UAS:</strong> <?= $nilaiUAS5; ?></p>
    <p><strong>Nilai Akhir:</strong> <?= number_format($nilaiAkhir5,2); ?></p>
    <p><strong>Grade:</strong> <?= $grade5; ?></p>
    <p><strong>Angka Mutu:</strong> <?= number_format($mutu5,2); ?></p>
    <p><strong>Bobot:</strong> <?= number_format($bobot5,2); ?></p>
    <p><strong>Status:</strong> <?= $status5; ?></p>
    <hr>

    <p><strong>Total Bobot:</strong> <?= number_format($totalBobot,2); ?></p>
    <p><strong>Total SKS:</strong> <?= $totalSKS; ?></p>
    <p><strong>IPK:</strong> <?= number_format($IPK,2); ?></p>
  </div>
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
