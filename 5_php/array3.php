<?php
//array numerik yang index nya angka,dimana harus persisi
$data = [
    ["Budi Santoso", " Jawa Timur", "Bandung"],
    ["agus anjay", "Jakarta ", "Menteng"]


];
//Array asosiati
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        ul li {
            list-style-type: none;
        }
    </style>
</head>

<body>
    <h1>alamat</h1>
    <?php foreach ($data as $isi) : ?>
        <ul>
            <li>Nama:<?= $isi[0] ?></li>
            <li>profinsi:<?= $isi[1] ?></li>
            <li>kota:<?= $isi[2] ?></li>
        </ul>

    <?php endforeach ?>
</body>

</html>