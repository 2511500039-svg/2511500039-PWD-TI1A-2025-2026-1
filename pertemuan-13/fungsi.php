<?php
function redirect_ke($url)
{
    header("Location: " . $url);
    exit();
}

function bersihkan($str)
{
    if (is_array($str)) {
        return '';
    }
    return htmlspecialchars(trim($str));
}

function tidakKosong($str)
{
    if (is_array($str)) {
        return false;
    }
    return strlen(trim($str)) > 0;
}

function formatTanggal($tgl)
{
    return date("d M Y", strtotime($tgl));
}

function tampilkanBiodata($conf, $arr)
{
    $html = "";

    foreach ($conf as $k => $v) {

        // pastikan konfigurasi berbentuk array
        if (!is_array($v)) {
            continue;
        }

        $label  = $v['label']  ?? '';
        $suffix = $v['suffix'] ?? '';
        $nilai  = bersihkan($arr[$k] ?? '');

        $html .= "<p><strong>{$label}</strong> {$nilai}{$suffix}</p>";
    }

    return $html;
}
