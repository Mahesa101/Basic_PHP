<?php
require 'functions.php';
$data = query("SELECT * FROM website");
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman admin</title>

    <style>
        table {
            border: 1px solid black;
            /* Pengganti cellspacing="0" */
            border-spacing: 0;
            /* Opsional: gunakan ini agar garis antar sel menyatu */
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            /* Pengganti cellpadding="10" */
            padding: 10px;
        }
    </style>

</head>

<body>
    <h1>Daftar Website</h1>

    <table>

        <th>NO.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>URL</th>
        <th>Kategori</th>
        <th>Bahasa Backend</th>
        <th>Deskirpsi</th>
        <?php $i = 1; ?>
        <?php foreach ($data as $datas) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="">Edit</a> |
                    <a href="">Delete</a>
                </td>
                <td><img src="../9_php/logo/<?= $datas["Gambar"] ?>" alt="gambar" width="50"></td>
                <td><?= $datas["Nama"] ?></td>
                <td><?= $datas["URL"] ?></td>
                <td><?= $datas["Kategori"] ?></td>
                <td><?= $datas["Tech"] ?></td>
                <td><?= $datas["Keterangan"] ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>

</html>