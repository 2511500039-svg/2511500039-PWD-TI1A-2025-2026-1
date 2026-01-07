<?php
session_start();

// Ambil & bersihkan data dari form
$nim   = trim($_POST['txtNim'] ?? '');
$nama  = trim($_POST['txtNmLengkap'] ?? '');
$email = trim($_POST['txtEmail'] ?? '');
$pesan = trim($_POST['txtPesan'] ?? '');

// Array untuk menampung error
$errors = [];

// Validasi sederhana
if ($nim === '') {
    $errors[] = 'NIM wajib diisi.';
}

if ($nama === '') {
    $errors[] = 'Nama wajib diisi.';
} elseif (mb_strlen($nama) < 3) {
    $errors[] = 'Nama minimal 3 karakter.';
}

if ($email === '') {
    $errors[] = 'Email wajib diisi.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Format email tidak valid.';
}

if ($pesan === '') {
    $errors[] = 'Pesan wajib diisi.';
} elseif (mb_strlen($pesan) < 10) {
    $errors[] = 'Pesan minimal 10 karakter.';
}

// Jika ada error, simpan old value & flash error
if (!empty($errors)) {
    $_SESSION['old_biodata'] = [
        'nim' => $nim,
        'nama' => $nama,
        'email' => $email,
        'pesan' => $pesan
    ];
    $_SESSION['flash_biodata'] = implode('<br>', $errors);
    header('Location: index.php#biodata');
    exit;
}

// Simpan data ke session
$_SESSION['biodata'] = [
    'nim' => $nim,
    'nama' => $nama,
    'email' => $email,
    'pesan' => $pesan,
    'tanggal' => date("Y-m-d H:i:s")
];

// Hapus old_biodata
unset($_SESSION['old_biodata']);

// Flash message sukses
$_SESSION['flash_biodata'] = 'Biodata berhasil disimpan!';

// Redirect ke Tentang Saya
header('Location: index.php#about');
exit;
