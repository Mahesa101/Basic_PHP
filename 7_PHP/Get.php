<?php
// Varibael Scope / lingkup varibel
// sebuah cara di dalam sistem pemprograman dalam mengambil seuatu nilai yang ada


//global scope
$x = 13;

echo "$x";
echo "<br>";
//dimana echo mengambil x

function tampilX()
{
    //local scope

    // echo"$x"; <-- error karena tidak datap mengambil dari global scope
    //akan terjadi error karena echo yang didalam function tidak dapat mengakses global scope

    global $x; //<-- aman karena ada method yang dapat merubah perilaku yang dari awal nya hanya dapat mengambil local scope menjadi global scope
    echo "$x";
}

tampilX();



//Superglobals
//variable global milik PHP yang berbentuk array Associative
//list Superglobals
// $_GET
// $_POST
// $_REQUEST
// $_SESSION
// $_COOKIE
// $_SERVER
// $_ENV

//Ex

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
            <li>Nama: <a href="data.php?nama=<?= $web["nama"]; ?>&alamat=<?= $web["alamat"] ?>&ip=<?= $web["ip"] ?>&deskripsi=<?= $web["deskripsi"] ?>&gambar=<?= $web["gambar"] ?>"
                    target="_blank"><?= $web["nama"] ?></a>
            </li>
        </ul>

    <?php endforeach ?>
</body>

</html>