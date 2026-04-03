<?php
//cara agar tidak terjadi error karena lewat url 
//isset mengecek apakah pernah di pakai atau tidak
if (
    !isset($_GET["nama"]) ||
    !isset($_GET["alamat"]) ||
    !isset($_GET["ip"]) ||
    !isset($_GET["deskripsi"]) ||
    !isset($_GET["gambar"])
) {
    header("Location: Get&Post.php");
    exit;
}
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
    <h1>Data lengkap</h1>
    <ul>
        <li><img src="../6_php/img/<?= $_GET["gambar"] ?>" alt=""></li>
        <li><?= $_GET["nama"] ?></li>
        <li><?= $_GET["alamat"] ?></li>
        <li><?= $_GET["ip"] ?></li>
        <li><?= $_GET["deskripsi"] ?></li>
    </ul>


    <a href="Get.php">Kembali ke halama sebelum nya</a>
</body>

</html>