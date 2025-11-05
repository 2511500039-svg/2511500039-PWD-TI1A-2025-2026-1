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
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }
    th, td {
      border: 1px solid black;
      padding: 8px 12px;
      text-align: center;
    }
    th {
      background-color: #f0f0f0;
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

    <section id="ipk" style="background-color:white; border-radius:15px; padding:30px; max-width:900px; margin:20px auto; color:black;">
      <h2 style="text-align:center;">Nilai Saya</h2>
      <?php
      $mataKuliah = [
        ["Algoritma dan Struktur Data", 4, 90, 60, 80, 70],
        ["Agama", 2, 70, 50, 60, 80],
        ["Basis Data", 4, 80, 70, 75, 85],
        ["Pemrograman Berorientasi Objek", 3, 85, 80, 70, 90],
        ["Pemrograman Web Dasar", 3, 69, 80, 90, 100]
      ];

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
              <th>Mutu</th>
              <th>Bobot</th>
              <th>Status</th>
            </tr>";

      $totalBobot = 0;
      $totalSKS = 0;
      $no = 1;

      foreach ($mataKuliah as $m) {
          [$nama, $sks, $hadir, $tugas, $uts, $uas] = $m;
          $nilaiAkhir = hitungNilai($hadir, $tugas, $uts, $uas);
          [$grade, $mutu] = hitungGrade($nilaiAkhir, $hadir);
          $status = statusKelulusan($grade);
          $bobot = $mutu * $sks;

          $totalBobot += $bobot;
          $totalSKS += $sks;

          echo "<tr>
                  <td>$no</td>
                  <td>$nama</td>
                  <td>$sks</td>
                  <td>$hadir</td>
                  <td>$tugas</td>
                  <td>$uts</td>
                  <td>$uas</td>
                  <td>" . number_format($nilaiAkhir, 2) . "</td>
                  <td>$grade</td>
                  <td>" . number_format($mutu, 2) . "</td>
                  <td>" . number_format($bobot, 2) . "</td>
                  <td>$status</td>
                </tr>";
          $no++;
      }

      $IPK = $totalBobot / $totalSKS;
      echo "<tr style='font-weight:bold; background-color:#e6e6e6;'>
              <td colspan='10' style='text-align:right;'>Total</td>
              <td>" . number_format($totalBobot, 2) . "</td>
              <td></td>
            </tr>";
      echo "<tr style='font-weight:bold; background-color:#dcdcdc;'>
              <td colspan='10' style='text-align:right;'>IPK</td>
              <td colspan='2'>" . number_format($IPK, 2) . "</td>
            </tr>";
      echo "</table>";
      ?>
    </section>
