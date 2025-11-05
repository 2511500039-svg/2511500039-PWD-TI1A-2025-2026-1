<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pertemuan 06 - Nilai dan IPK</title>
  <style>
    body {
      background-color: white;
      color: black;
      font-family: Arial, sans-serif;
      line-height: 1.5;
      margin: 0;
      padding: 0;
    }
    header, footer {
      background-color: white;
      color: black;
      text-align: center;
      padding: 10px;
    }
    section {
      padding: 20px;
      margin: 20px auto;
      max-width: 800px;
      border: 1px solid #ccc;
      border-radius: 10px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }
    th, td {
      border: 1px solid #000;
      padding: 8px;
      text-align: center;
    }
    th {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>
  <header>
    <h1>Perhitungan Nilai dan IPK</h1>
  </header>

  <main>
    <section id="nilai">
      <h2>Nilai Mata Kuliah</h2>
      <?php
      $matkul = [
        ["nama" => "Algoritma dan Struktur Data", "sks" => 4, "hadir" => 90, "tugas" => 60, "uts" => 80, "uas" => 70],
        ["nama" => "Agama", "sks" => 2, "hadir" => 70, "tugas" => 50, "uts" => 60, "uas" => 80],
        ["nama" => "Basis Data", "sks" => 4, "hadir" => 80, "tugas" => 70, "uts" => 75, "uas" => 85],
        ["nama" => "PBO (Pemrograman Berorientasi Objek)", "sks" => 3, "hadir" => 85, "tugas" => 80, "uts" => 70, "uas" => 90],
        ["nama" => "Pemrograman Web Dasar", "sks" => 3, "hadir" => 69, "tugas" => 80, "uts" => 90, "uas" => 100],
      ];

      function hitungNilaiAkhir($hadir, $tugas, $uts, $uas) {
        return (0.1 * $hadir) + (0.2 * $tugas) + (0.3 * $uts) + (0.4 * $uas);
      }

      function hitungGrade($nilai, $hadir) {
        if ($hadir < 70) return ["E", 0.00];
        if ($nilai >= 91) return ["A", 4.00];
        elseif ($nilai >= 81) return ["A-", 3.70];
        elseif ($nilai >= 76) return ["B+", 3.30];
        elseif ($nilai >= 71) return ["B", 3.00];
        elseif ($nilai >= 66) return ["B-", 2.70];
        elseif ($nilai >= 61) return ["C+", 2.30];
        elseif ($nilai >= 56) return ["C", 2.00];
        elseif ($nilai >= 51) return ["C-", 1.70];
        elseif ($nilai >= 36) return ["D", 1.00];
        else return ["E", 0.00];
      }

      function status($grade) {
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
              <th>Mutu</th>
              <th>Bobot</th>
              <th>Status</th>
            </tr>";

      $totalBobot = 0;
      $totalSKS = 0;

      foreach ($matkul as $i => $m) {
        $nilaiAkhir = hitungNilaiAkhir($m["hadir"], $m["tugas"], $m["uts"], $m["uas"]);
        [$grade, $mutu] = hitungGrade($nilaiAkhir, $m["hadir"]);
        $status = status($grade);
        $bobot = $mutu * $m["sks"];

        $totalBobot += $bobot;
        $totalSKS += $m["sks"];

        echo "<tr>
                <td>" . ($i + 1) . "</td>
                <td>{$m['nama']}</td>
                <td>{$m['sks']}</td>
                <td>{$m['hadir']}</td>
                <td>{$m['tugas']}</td>
                <td>{$m['uts']}</td>
                <td>{$m['uas']}</td>
                <td>" . number_format($nilaiAkhir, 2) . "</td>
                <td>$grade</td>
                <td>" . number_format($mutu, 2) . "</td>
                <td>" . number_format($bobot, 2) . "</td>
                <td>$status</td>
              </tr>";
      }

      $ipk = $totalBobot / $totalSKS;
      echo "</table>";

      echo "<p><strong>Total SKS:</strong> $totalSKS</p>";
      echo "<p><strong>Total Bobot:</strong> " . number_format($totalBobot, 2) . "</p>";
      echo "<p><strong>IPK:</strong> " . number_format($ipk, 2) . "</p>";
      ?>
    </section>

    <section id="about">
      <h2>Tentang Saya</h2>
      <?php
      $nim = "2511500039";
      $nama = "Muhammad Alkautsar Dirgantara";
      $lahir = "Pangkalpinang, 08 April 2007";
      $alamat = "Komplek Timah Sampur Atas, Gg Safir Biru XV";
      $hobi = "Membaca, bermain game, mendengarkan musik";

      echo "<p><strong>NIM:</strong> $nim</p>";
      echo "<p><strong>Nama:</strong> $nama</p>";
      echo "<p><strong>Tempat/Tanggal Lahir:</strong> $lahir</p>";
      echo "<p><strong>Alamat:</strong> $alamat</p>";
      echo "<p><strong>Hobi:</strong> $hobi</p>";
      ?>
    </section>

    <section id="ipk">
      <h2>Rekapitulasi IPK per Semester</h2>
      <?php
      $dataIPK = [
        "Semester 1" => 3.85,
        "Semester 2" => 3.92,
        "Semester 3" => 3.95,
        "Semester 4" => 3.97,
      ];
      $rata = array_sum($dataIPK) / count($dataIPK);

      echo "<table>
              <tr><th>Semester</th><th>IPK</th></tr>";
      foreach ($dataIPK as $smt => $nilai) {
        echo "<tr><td>$smt</td><td>$nilai</td></tr>";
      }
      echo "<tr><th>Rata-rata</th><th>" . number_format($rata, 2) . "</th></tr>";
      echo "</table>";
      ?>
    </section>
  </main>

  <footer>
    <p>&copy; <?= date("Y"); ?> - Muhammad Alkautsar Dirgantara | 2511500039</p>
  </footer>
</body>
</html>
