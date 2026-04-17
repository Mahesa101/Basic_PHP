<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
require 'functions.php';
$data = query("SELECT * FROM website");

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Website</title>
    <style>
        /* mPDF lebih suka CSS di dalam tag style */
        table { width: 100%; border-collapse: collapse; }
        th { background-color: #eee; }
        img { width: 50px; }
    </style>
</head>
<body>
    <h1>Daftar Website</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>NO.</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>URL</th>
            <th>Kategori</th>
            <th>Tech</th>
            <th>Deskripsi</th>
        </tr>';

$i = 1;
foreach ($data as $datas) {
    $html .= '<tr>
        <td>' . $i++ . '</td>
        <td><img src="../logo/' . $datas["DataGambar"] . '"></td>
        <td>' . $datas["DataNama"] . '</td>
        <td>' . $datas["DataURL"] . '</td>
        <td>' . $datas["DataKategori"] . '</td>
        <td>' . $datas["DataTech"] . '</td>
        <td>' . $datas["DataKeterangan"] . '</td>
    </tr>';
}

$html .= '</table>
</body>
</html>';


$mpdf->WriteHTML($html);
$mpdf->Output('Daftar-website', \Mpdf\Output\Destination::INLINE);
