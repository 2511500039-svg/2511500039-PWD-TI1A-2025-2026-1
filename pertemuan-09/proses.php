<?php
session_start();

$sesnama  = $_POST["txtNama"] ?? "";
$sesemail = $_POST["txtEmail"] ?? "";
$sespesan = $_POST["txtPesan"] ?? "";

$_SESSION["sesnama"]  = $sesnama;
$_SESSION["sesemail"] = $sesemail;
$_SESSION["sespesan"] = $sespesan;

$arrbiodata = [
    "nim"       => $_POST["txtNim"] ?? "",
    "nama"      => $_POST["txtNmLengkap"] ?? "",
    "tempat"    => $_POST["txtT4Lhr"] ?? "",
    "tanggal"   => $_POST["txtTglLhr"] ?? "",
    "hobi"      => $_POST["txtHobi"] ?? "",
    "pasangan"  => $_POST["txtPasangan"] ?? "",
    "pekerjaan" => $_POST["txtKerja"] ?? "",
    "ortu"      => $_POST["txtNmOrtu"] ?? "",
    "kakak"     => $_POST["txtNmKakak"] ?? "",
    "adik"      => $_POST["txtNmAdik"] ?? ""
];

$_SESSION["txtNim"]       = $_POST["txtNim"] ?? "";
$_SESSION["txtNmLengkap"] = $_POST["txtNmLengkap"] ?? "";
$_SESSION["txtT4Lhr"]     = $_POST["txtT4Lhr"] ?? "";
$_SESSION["txtTglLhr"]    = $_POST["txtTglLhr"] ?? "";
$_SESSION["txtHobi"]      = $_POST["txtHobi"] ?? "";
$_SESSION["txtPasangan"]  = $_POST["txtPasangan"] ?? "";
$_SESSION["txtKerja"]     = $_POST["txtKerja"] ?? "";
$_SESSION["txtNmOrtu"]    = $_POST["txtNmOrtu"] ?? "";
$_SESSION["txtNmKakak"]   = $_POST["txtNmKakak"] ?? "";
$_SESSION["txtNmAdik"]    = $_POST["txtNmAdik"] ?? "";
header("Location: index.php");
?>
