<?php
// ===================================================
// NO. 3 & 4 - TAMPIL DATA BIODATA DOSEN + LINK EDIT
// ===================================================

require 'koneksi.php'; // koneksi database
require 'fungsi.php';   // untuk bersihkan(), redirect_ke(), dll

// Query ambil semua biodata dosen
$sql = "SELECT * FROM tbl_biodata_dosen ORDER BY kode_dosen DESC";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "<p>Gagal membaca data biodata: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
} elseif (mysqli_num_rows($result) === 0) {
    echo "<p>Belum ada biodata dosen yang tersimpan.</p>";
} else {
    echo "<h3>Daftar Biodata Dosen</h3>";
    echo "<table border='1' cellpadding='8' cellspacing='0'>
            <tr>
                <th>No</th>
                <th>Kode Dosen</th>
                <th>Nama Dosen</th>
                <th>Alamat</th>
                <th>Tanggal Jadi Dosen</th>
                <th>JJA</th>
                <th>Prodi</th>
                <th>No HP</th>
                <th>Nama Pasangan</th>
                <th>Nama Anak</th>
                <th>Bidang Ilmu</th>
                <th>Aksi</th>
            </tr>";

    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $kode = urlencode($row['kode_dosen']);
        echo "<tr>
                <td>{$no}</td>
                <td>" . htmlspecialchars($row['kode_dosen']) . "</td>
                <td>" . htmlspecialchars($row['nama_dosen']) . "</td>
                <td>" . htmlspecialchars($row['alamat']) . "</td>
                <td>" . htmlspecialchars($row['tgl_jadi_dosen']) . "</td>
                <td>" . htmlspecialchars($row['jja']) . "</td>
                <td>" . htmlspecialchars($row['prodi']) . "</td>
                <td>" . htmlspecialchars($row['no_hp']) . "</td>
                <td>" . htmlspecialchars($row['nama_pasangan']) . "</td>
                <td>" . htmlspecialchars($row['nama_anak']) . "</td>
                <td>" . htmlspecialchars($row['bidang_ilmu']) . "</td>
                <td>
                    <a href='edit_dosen.php?kode={$kode}'>Edit</a>
                </td>
              </tr>";
        $no++;
    }
    echo "</table>";
}
?>
