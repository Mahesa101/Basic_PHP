<?php
// array numerik

// $merah = [
//     ["web Anjay", "httpp/king", "30303"],
//     ["Web king", "httpp/baru", "3927"],
// ];

//Associative array mirip konsep dengan object di javascipt
//dimana konsep nya tetap menggunakan array tetapi beda nya di bagian index yang dapat berubah string yand dapat di custom
$merah = [
    [
        "nama" => "GitHub",
        "alamat" => "github.com",
        "ip" => "140.82.112.4",
        "deskripsi" => "The world's leading AI-powered developer platform for hosting code.",
        "gambar" => "gambar3.jpg",
    ],
    [
        "nama" => "Behance",
        "alamat" => "behance.net",
        "ip" => "151.101.66.167",
        "deskripsi" => "A social media platform owned by Adobe to showcase and discover creative work.",
        "gambar" => "gambar1.jpg",
    ],
    [
        "nama" => "Psychology Today",
        "alamat" => "psychologytoday.com",
        "ip" => "104.18.23.155",
        "deskripsi" => "Media focusing on psychology and human behavior to help people live healthier lives.",
        "gambar" => "gambar5.jpg",
    ],
    [
        "nama" => "Itch.io",
        "alamat" => "itch.io",
        "ip" => "31.13.71.36",
        "deskripsi" => "An open marketplace for independent digital creators with a focus on indie games.",
        "gambar" => "gambar4.jpg",
    ],
    [
        "nama" => "Dev.to",
        "alamat" => "dev.to",
        "ip" => "151.101.2.132",
        "deskripsi" => "A constructive and inclusive social network for software developers to share knowledge.",
        "gambar" => "gambar2.jpg",
    ],
];
//pemanggilan
//array[index][index][index]
echo $merah[0]["nama"];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Associative array</title>
    <style>
        ul li {
            list-style-type: none;
        }
    </style>
</head>

<body>
    <h1>Nama Web Terkenal</h1>
    <?php foreach ($merah as $web): ?>
        <ul>
            <li>
                <img src="img/<?= $web["gambar"] ?>" alt="gambar">
            </li>
            <li>Nama: <?= $web["nama"] ?></li>
            <li>ALAMAT: <?= $web["alamat"] ?></li>
            <li>IP: <?= $web["ip"] ?></li>
            <li>Deskirpsi: <?= $web["deskripsi"]."<br>"?></li>
        </ul>

    <?php endforeach ?>
    <!-- dimana Associative array memilik keutungan untuk tidak mempermasalahkan urutan yang terjadi pada array numerik -->
</body>

</html>