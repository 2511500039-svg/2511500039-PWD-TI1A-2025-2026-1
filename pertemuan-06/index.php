<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Judul Halaman</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <h1>My Website</h1>
    <button class="menu-toggle" id="menu-toggle" aria-label="Toggle Navigation">
      &#9776;
    </button>
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

        <section id="ipk" style="background-color:#800649; border-radius:15px; padding:30px; max-width:700px; margin:20px auto; color:white;">
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
    ?>
</section>

      <h2>Indeks Prestasi Kumulatif (IPK)</h2>
      <table border="1" cellpadding="8" cellspacing="0">
        <thead>
          <tr>
            <th>Semester</th>
            <th>IPK</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($ipk as $semester => $nilai) : ?>
            <tr>
              <td><?= $semester; ?></td>
              <td><?= $nilai; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <th>Rata-rata</th>
            <th><?= number_format($rataRata, 2); ?></th>
          </tr>
        </tfoot>
      </table>
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
