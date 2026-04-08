<?php
//ada dua cara untuk terhubung dengan file lain yaitu 

require 'functions.php';
// include 'functions.php';
$data = query("SELECT * FROM website");

if(isset($_POST["search"])){  
    $data = cari($_POST["keyword"]);
};
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman admin</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="container">
        <h1>Daftar Website</h1>

        <a href="add.php" target="_blank">ADD News Item</a>
        <br><br>

        <form action="" method="post">
            <input type="text" name="keyword" autofocus placeholder="Enter a search keyword" autocomplete="off">
            <button type="submit" name="search">search</button>
        </form>


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
                        <a href="edit.php?id=<?= $datas["ID"] ?>">Edit</a> |
                        <a href="delete.php?id=<?= $datas["ID"]; ?>" onclick="return confirm('sure?')">Delete</a>
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
    </div>
</body>

</html>