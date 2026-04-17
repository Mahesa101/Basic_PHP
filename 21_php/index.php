<?php
session_start();
//cek apakah sudah login belum
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
};


//ada dua cara untuk terhubung dengan file lain yaitu 
require 'functions.php';

//pagination/halaman
//cara untuk membuat batasan agar data tidak begitu banyak dalam satu page

$jumlahDataPage = 5;
$keyword = '';
if (isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
} elseif (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
}

// Hitung total dulu
if ($keyword !== '') {
    $jumlahData = count(cari($keyword)); // fungsi cari lama, tanpa limit
} else {
    $jumlahData = count(query("SELECT * FROM website"));
}

$jumlahPage = ceil($jumlahData / $jumlahDataPage);
$pageAktif = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$awalData = ($jumlahDataPage * $pageAktif) - $jumlahDataPage;

// Query data dengan limit
if ($keyword !== '') {
    $data = cariWithLimit($keyword, $awalData, $jumlahDataPage);
} else {
    $data = query("SELECT * FROM website LIMIT $awalData, $jumlahDataPage");
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman admin</title>

    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <div class="seafloor"></div>
    <a href="logout.php">Logout</a>|| <a href="print.php" target="_blank">Print</a>

    <div class="container">
        <h1>Daftar Website</h1>

        <a href="add.php" target="_blank">ADD News Item</a>
        <br><br>

        <form action="" method="get">
            <input type="text" name="keyword" autofocus placeholder="Enter a search keyword" autocomplete="off" id="keyword">
            <button type="submit" name="search" id="submit">search</button>
        </form>


<div id="container">
        <!-- navigator page -->
        <?php $queryString = $keyword !== '' ? '&keyword=' . urlencode($keyword) : ''; ?>

        <?php if ($pageAktif > 1): ?>
            <a href="?page=<?= $pageAktif - 1 . $queryString; ?>">&lt;</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $jumlahPage; $i++) : ?>
            <?php if ($i === $pageAktif) : ?>
                <a href="?page=<?= $i . $queryString ?>" class="page"> <?= $i; ?></a>
            <?php else : ?>
                <a href="?page=<?= $i . $queryString ?>"> <?= $i; ?></a>
            <?php endif; ?>
        <?php endfor ?>

        <?php if ($pageAktif < $jumlahPage): ?>
            <a href="?page=<?= $pageAktif + 1 . $queryString ?>">&gt;</a>
        <?php endif; ?>

        
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
                            <a href="edit.php?id=<?= $datas["DataID"] ?>">Edit</a> |
                            <a href="delete.php?id=<?= $datas["DataID"]; ?>" onclick="return confirm('sure?')">Delete</a>
                        </td>
                        <td><img src="../logo/<?= $datas["DataGambar"] ?>" alt="gambar" width="50"></td>
                        <td><?= $datas["DataNama"] ?></td>
                        <td><?= $datas["DataURL"] ?></td>
                        <td><?= $datas["DataKategori"] ?></td>
                        <td><?= $datas["DataTech"] ?></td>
                        <td><?= $datas["DataKeterangan"] ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
<script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
</body>

</html>