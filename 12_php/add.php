<?php
//menghubungkan dengan file functioins
require 'functions.php';


//jika tombol submit di pencet
if (isset($_POST["submit"])) {
    //tempat fungsi di tarok
    $hasil = tambah($_POST);
    //cek apakah ada yang error atau tidak
    //menggunakan mysqli_affected_rows yang akan memberi sebuah nilai int -1 jika error dan memberi +1 jika berhasil

    if ($hasil > 0) {
        echo "<script>
                    alert('succeed:Data Berhasil Disimpan!');
                    document.location.href = 'index.php'; 
                </script>";
    } else if ($hasil === 0) {
        echo "<script>
                    alert('failed:Data tidak masuk.!');
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
    <title>Add news item</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Tambahkan sebuah Item/Data disini</h1>

        <form action="" method="post">
            <ul>
                <li>
                    <!-- for itu pasangan dari id -->
                    <Label for="nama">Nama:</Label>
                    <input type="text" name="Nama" id="nama" require>
                </li>

                <li>
                    <!-- for itu pasangan dari id -->
                    <Label for="url">Url:</Label>
                    <input type="text" name="URL" id="url" require>
                </li>

                <li>
                    <!-- for itu pasangan dari id -->
                    <Label for="kategori">Kategori:</Label>
                    <input type="text" name="Kategori" id="kategori" require>
                </li>

                <li>
                    <!-- for itu pasangan dari id -->
                    <Label for="tech">Tech:</Label>
                    <input type="text" name="Tech" id="tech" require>
                </li>

                <li>
                    <!-- for itu pasangan dari id -->
                    <Label for="keterangan">Keterangan:</Label>
                    <input type="text" name="Keterangan" id="keterangan">
                </li>

                <li>
                    <!-- for itu pasangan dari id -->
                    <Label for="gambar">Gambar:</Label>
                    <input type="text" name="Gambar" id="gambar">
                </li>

                <li>
                    <button type="submit" name="submit">Submit</button>
                </li>
            </ul>
        </form>
    </div>
</body>

</html>