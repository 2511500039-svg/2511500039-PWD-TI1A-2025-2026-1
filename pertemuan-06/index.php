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
