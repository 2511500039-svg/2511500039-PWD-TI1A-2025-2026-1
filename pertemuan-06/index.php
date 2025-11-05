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

    <section id="ipk">
      <h2>Nilai Saya</h2>
      <?php
      $namaMatkul = ["Algoritma dan Struktur Data", "Agama", "Basis Data", "Pemrograman Berorientasi Objek", "Pemrograman Web Dasar"];
      $sks = [4, 2, 4, 3, 3];
      $nilaiHadir = [90, 70, 80, 85, 69];
      $nilaiTugas = [60, 50, 70, 80, 80];
      $nilaiUTS = [80, 60, 75, 70, 90];
      $nilaiUAS = [70, 80, 85, 90, 100];

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
          return ($grade == "D" || $grade == "E") ? "Gagal" : "Lulus";
      }

      echo "<table>";
      echo "<tr>
              <th>No</th>
              <th>Nama Mata Kuliah</th>
              <th>SKS</th>
              <th>Kehadiran</th>
              <th>Tugas</th>
              <th>UTS</th>
              <th>UAS</th>
              <th>Nilai Akhir</th>
              <th>Grade</th>
              <th>Angka Mutu</th>
              <th>Bobot</th>
              <th>Status</th>
            </tr>";

      $totalBobot = 0;
      $totalSKS = 0;

      for ($i = 0; $i < count($namaMatkul); $i++) {
          $nilaiAkhir = hitungNilai($nilaiHadir[$i], $nilaiTugas[$i], $nilaiUTS[$i], $nilaiUAS[$i]);
          list($grade, $mutu) = hitungGrade($nilaiAkhir, $nilaiHadir[$i]);
          $status = statusKelulusan($grade);
          $bobot = $mutu * $sks[$i];

          $totalBobot += $bobot;
          $totalSKS += $sks[$i];

          echo "<tr>
                  <td>" . ($i + 1) . "</td>
                  <td>{$namaMatkul[$i]}</td>
                  <td>{$sks[$i]}</td>
                  <td>{$nilaiHadir[$i]}</td>
                  <td>{$nilaiTugas[$i]}</td>
                  <td>{$nilaiUTS[$i]}</td>
                  <td>{$nilaiUAS[$i]}</td>
                  <td>" . number_format($nilaiAkhir, 2) . "</td>
                  <td>$grade</td>
                  <td>" . number_format($mutu, 2) . "</td>
                  <td>" . number_format($bobot, 2) . "</td>
                  <td>$status</td>
                </tr>";
      }

      $IPK = $totalBobot / $totalSKS;

      echo "<tr style='font-weight:bold; background-color:#f9f9f9;'>
              <td colspan='9'>Total</td>
              <td colspan='2'>" . number_format($totalBobot, 2) . "</td>
              <td>$totalSKS SKS</td>
            </tr>";

      echo "<tr style='font-weight:bold; background-color:#d9fdd3;'>
              <td colspan='12'>IPK: " . number_format($IPK, 2) . "</td>
            </tr>";

      echo "</table>";
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

<section id="ipk" style="background-color: white; padding: 30px; color: black;">
    <h2 style="text-align: center;">Nilai Saya</h2>

    <?php
    $namaMatkul1 = "Algoritma dan Struktur Data";
    $sksMatkul1 = 4;
    $nilaiHadir1 = 90;
    $nilaiTugas1 = 60;
    $nilaiUTS1 = 80;
    $nilaiUAS1 = 70;

    $namaMatkul2 = "Agama";
    $sksMatkul2 = 2;
    $nilaiHadir2 = 70;
    $nilaiTugas2 = 50;
    $nilaiUTS2 = 60;
    $nilaiUAS2 = 80;

    $namaMatkul3 = "Bahasa Indonesia";
    $sksMatkul3 = 3;
    $nilaiHadir3 = 85;
    $nilaiTugas3 = 75;
    $nilaiUTS3 = 70;
    $nilaiUAS3 = 90;

    $namaMatkul4 = "Sistem Operasi";
    $sksMatkul4 = 4;
    $nilaiHadir4 = 80;
    $nilaiTugas4 = 80;
    $nilaiUTS4 = 85;
    $nilaiUAS4 = 75;

    $namaMatkul5 = "Pemrograman Web Dasar";
    $sksMatkul5 = 3;
    $nilaiHadir5 = 69;
    $nilaiTugas5 = 80;
    $nilaiUTS5 = 90;
    $nilaiUAS5 = 100;

    function hitungNilai($hadir, $tugas, $uts, $uas, $sks)
    {
        $nilaiAkhir = (0.1 * $hadir) + (0.2 * $tugas) + (0.3 * $uts) + (0.4 * $uas);

        if ($hadir < 70) {
            $grade = "E";
            $mutu = 0.00;
        } elseif ($nilaiAkhir >= 85) {
            $grade = "A";
            $mutu = 4.00;
        } elseif ($nilaiAkhir >= 80) {
            $grade = "A-";
            $mutu = 3.70;
        } elseif ($nilaiAkhir >= 75) {
            $grade = "B+";
            $mutu = 3.30;
        } elseif ($nilaiAkhir >= 70) {
            $grade = "B";
            $mutu = 3.00;
        } elseif ($nilaiAkhir >= 65) {
            $grade = "B-";
            $mutu = 2.70;
        } elseif ($nilaiAkhir >= 60) {
            $grade = "C+";
            $mutu = 2.30;
        } elseif ($nilaiAkhir >= 55) {
            $grade = "C";
            $mutu = 2.00;
        } elseif ($nilaiAkhir >= 50) {
            $grade = "C-";
            $mutu = 1.70;
        } elseif ($nilaiAkhir >= 40) {
            $grade = "D";
            $mutu = 1.00;
        } else {
            $grade = "E";
            $mutu = 0.00;
        }

        $bobot = $mutu * $sks;
        $status = ($grade == "D" || $grade == "E") ? "GAGAL" : "LULUS";

        return [$nilaiAkhir, $grade, $mutu, $bobot, $status];
    }

    list($nilaiAkhir1, $grade1, $mutu1, $bobot1, $status1) = hitungNilai($nilaiHadir1, $nilaiTugas1, $nilaiUTS1, $nilaiUAS1, $sksMatkul1);
    list($nilaiAkhir2, $grade2, $mutu2, $bobot2, $status2) = hitungNilai($nilaiHadir2, $nilaiTugas2, $nilaiUTS2, $nilaiUAS2, $sksMatkul2);
    list($nilaiAkhir3, $grade3, $mutu3, $bobot3, $status3) = hitungNilai($nilaiHadir3, $nilaiTugas3, $nilaiUTS3, $nilaiUAS3, $sksMatkul3);
    list($nilaiAkhir4, $grade4, $mutu4, $bobot4, $status4) = hitungNilai($nilaiHadir4, $nilaiTugas4, $nilaiUTS4, $nilaiUAS4, $sksMatkul4);
    list($nilaiAkhir5, $grade5, $mutu5, $bobot5, $status5) = hitungNilai($nilaiHadir5, $nilaiTugas5, $nilaiUTS5, $nilaiUAS5, $sksMatkul5);

    $totalBobot = $bobot1 + $bobot2 + $bobot3 + $bobot4 + $bobot5;
    $totalSKS = $sksMatkul1 + $sksMatkul2 + $sksMatkul3 + $sksMatkul4 + $sksMatkul5;
    $IPK = $totalBobot / $totalSKS;

    function tampilTabel($no, $nama, $sks, $hadir, $tugas, $uts, $uas, $akhir, $grade, $mutu, $bobot, $status)
    {
        echo "<table border='1' cellpadding='8' cellspacing='0' width='60%' style='margin: 20px auto; border-collapse: collapse;'>";
        echo "<tr><th colspan='2' style='text-align:center;'>Nama Mata Kuliah ke-$no</th></tr>";
        echo "<tr><td>Nama Matakuliah</td><td>$nama</td></tr>";
        echo "<tr><td>SKS</td><td>$sks</td></tr>";
        echo "<tr><td>Kehadiran</td><td>$hadir</td></tr>";
        echo "<tr><td>Tugas</td><td>$tugas</td></tr>";
        echo "<tr><td>UTS</td><td>$uts</td></tr>";
        echo "<tr><td>UAS</td><td>$uas</td></tr>";
        echo "<tr><td>Nilai Akhir</td><td>$akhir</td></tr>";
        echo "<tr><td>Grade</td><td>$grade</td></tr>";
        echo "<tr><td>Angka Mutu</td><td>$mutu</td></tr>";
        echo "<tr><td>Bobot</td><td>$bobot</td></tr>";
        echo "<tr><td>Status</td><td>$status</td></tr>";
        echo "</table>";
    }

    tampilTabel(1, $namaMatkul1, $sksMatkul1, $nilaiHadir1, $nilaiTugas1, $nilaiUTS1, $nilaiUAS1, $nilaiAkhir1, $grade1, $mutu1, $bobot1, $status1);
    tampilTabel(2, $namaMatkul2, $sksMatkul2, $nilaiHadir2, $nilaiTugas2, $nilaiUTS2, $nilaiUAS2, $nilaiAkhir2, $grade2, $mutu2, $bobot2, $status2);
    tampilTabel(3, $namaMatkul3, $sksMatkul3, $nilaiHadir3, $nilaiTugas3, $nilaiUTS3, $nilaiUAS3, $nilaiAkhir3, $grade3, $mutu3, $bobot3, $status3);
    tampilTabel(4, $namaMatkul4, $sksMatkul4, $nilaiHadir4, $nilaiTugas4, $nilaiUTS4, $nilaiUAS4, $nilaiAkhir4, $grade4, $mutu4, $bobot4, $status4);
    tampilTabel(5, $namaMatkul5, $sksMatkul5, $nilaiHadir5, $nilaiTugas5, $nilaiUTS5, $nilaiUAS5, $nilaiAkhir5, $grade5, $mutu5, $bobot5, $status5);

    echo "<table border='1' cellpadding='8' cellspacing='0' width='60%' style='margin: 20px auto; border-collapse: collapse; font-weight: bold;'>";
    echo "<tr><th colspan='2' style='text-align:center;'>Rekapitulasi Nilai Akhir</th></tr>";
    echo "<tr><td>Total Bobot</td><td>$totalBobot</td></tr>";
    echo "<tr><td>Total SKS</td><td>$totalSKS</td></tr>";
    echo "<tr><td>IPK</td><td>" . number_format($IPK, 2) . "</td></tr>";
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
