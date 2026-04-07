<?php
//menghubungkan ke database
$db = mysqli_connect("localhost", "root", "", "webterkenal");

//jika tombol submit di pencet
if (isset($_POST["submit"])) {

    //ambil data setiap elemen
    $nama = $_POST["Nama"];
    $url = $_POST["URL"];
    $kategori = $_POST["Kategori"];
    $tech = $_POST["Tech"];
    $keterangan = $_POST["Keterangan"];
    $gambar = $_POST["Gambar"];

    if (!empty($nama) && !empty($url) && !empty($kategori) && !empty($tech) && !empty($keterangan) && !empty($gambar)) {

        //query insert data / memasukan data
        $query = "INSERT INTO website
            VALUES
            ('','$nama','$url','$kategori','$tech','$keterangan','$gambar')
        -- dibuat sebuah varibael seperti $nama bertujuan agar saat memasukan sebuah values tidak repot
";

        mysqli_query($db, $query);

        //cek apakah ada yang error atau tidak
        //menggunakan mysqli_affected_rows yang akan memberi sebuah nilai int -1 jika error dan memberi +1 jika berhasil

        if (mysqli_affected_rows($db) > 0) {
            echo "
        <script>
            alert('Data Berhasil Disimpan!');
            document.location.href = 'tambah_data.php'; // Arahkan kembali ke dirinya sendiri
        </script>
    ";
        } else {
            echo "failed: Data tidak masuk. " . mysqli_error($db);
            echo "<br>";
        };
    }else{
        echo"failed: Data tidak diisi semua";
    }
};
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add news item</title>
</head>

<body>
    <h1>Tambahkan sebuah Item/Data disini</h1>

    <form action="" method="post">
        <ul>
            <li>
                <!-- for itu pasangan dari id -->
                <Label for="nama">Nama:</Label>
                <input type="text" name="Nama" id="nama">
            </li>

            <li>
                <!-- for itu pasangan dari id -->
                <Label for="url">Url:</Label>
                <input type="text" name="URL" id="url">
            </li>

            <li>
                <!-- for itu pasangan dari id -->
                <Label for="kategori">Kategori:</Label>
                <input type="text" name="Kategori" id="kategori">
            </li>

            <li>
                <!-- for itu pasangan dari id -->
                <Label for="tech">Tech:</Label>
                <input type="text" name="Tech" id="tech">
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
</body>

</html>