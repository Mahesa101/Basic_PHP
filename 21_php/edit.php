<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
};


//menghubungkan dengan file functioins
require 'functions.php';
//ambil id
$idw = $_GET['id'];

//query data dari file functions/ database berdasarkan id
$web = query("SELECT * FROM website WHERE DataID = $idw")[0]; // kenapa ada [0];  karena function query memasukan data pada rows yang membuat kita harus memasukin array rows dulu


//jika tombol submit di pencet
if (isset($_POST["submit"])) {
    //tempat fungsi di tarok
    $hasil = edit($_POST);
    //cek apakah ada yang error atau tidak
    //menggunakan mysqli_affected_rows yang akan memberi sebuah nilai int -1 jika error dan memberi +1 jika berhasil

    if ($hasil > 0) {
        echo "<script>
                    alert('succeed:Data Berhasil Diubah!');
                    document.location.href = 'index.php'; 
                </script>";
        exit;
    } else if ($hasil === 0) {
        echo "<script>
                    alert('failed:Data Gagal Dibuah.!');
                    document.location.href = 'index.php'; 
                </script>";
    } else {
        $error_msg = mysqli_error($db);

        echo "Error Database: 
        <script>
                    alert('Error Database:$error_msg');
                    document.location.href = 'index.php'; 
                </script>
        ";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit news item</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <div class="container">
        <h1>Edit sebuah Item/Data disini</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="ID" value="<?= $web["DataID"] ?>">

            <input type="hidden" name="gambarL" value="<?= $web["DataGambar"] ?>">
            <ul>
                <li>
                    <!-- for itu pasangan dari id -->
                    <Label for="nama">Nama:</Label>
                    <input type="text" name="Nama" id="nama" require value="<?= $web["DataNama"]; ?>">
                </li>

                <li>
                    <!-- for itu pasangan dari id -->
                    <Label for="url">Url:</Label>
                    <input type="text" name="URL" id="url" require value="<?= $web["DataURL"]; ?>">
                </li>

                <li>
                    <!-- for itu pasangan dari id -->
                    <Label for="kategori">Kategori:</Label>
                    <input type="text" name="Kategori" id="kategori" require value="<?= $web["DataKategori"]; ?>">
                </li>

                <li>
                    <!-- for itu pasangan dari id -->
                    <Label for="tech">Tech:</Label>
                    <input type="text" name="Tech" id="tech" require value="<?= $web["DataTech"]; ?>">
                </li>

                <li>
                    <!-- for itu pasangan dari id -->
                    <Label for="keterangan">Keterangan:</Label>
                    <input type="text" name="Keterangan" id="keterangan" value="<?= $web["DataKeterangan"]; ?>">
                </li>

                <li>
                    <!-- for itu pasangan dari id -->
                    <Label for="gambar">Gambar:</Label>
                    <img src="../logo/<?= $web["DataGambar"] ?>" alt="Gambar">
                    <input type="file" name="Gambar" id="gambar">
                </li>

                <li>
                    <button type="submit" name="submit">Submit</button>
                </li>
            </ul>
        </form>
    </div>
</body>

</html>