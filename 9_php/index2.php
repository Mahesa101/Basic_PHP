<?php
//Koneksi ke database

$db = mysqli_connect("localhost", "root", "", "webterkenal");

//Rumus
//mysql_connect('localhost', 'username', 'password','nama database');

// ambil data dari database/ queary data dari database

$result = mysqli_query($db, "SELECT * FROM website");

//Rumus
// mysqli_query("nama varibael atau tempat penghubung database nya","sintaks sql / select * from website");

//ambil data/fecth dari object result
// 4 cara untuk mengambil data dari object result
//mysqli_fecth_row(); //mengembalikan array numerik
//mysqli_fecth_assoc(); //mengambalikan array associative
//mysqli_fecth_array(); // bisa menggunakan array numerik atau array associative tetapi dengan konsekuensi  data yang di berikan dua kali
//mysqli_fecth_object(); asal -> tujuan


//diperlukan pengulangan untuk mengambil semua data yang ada dimana while pertujuga sebagai pengulangan
// while ($web = mysqli_fetch_assoc($result)) {
//     var_dump($web);
// }


//cara cek error dimana
// if(!$result){
//     echo mysqli_error($db);
// }


//di karena kan mysqli_query tidak memberika pesan error maka bisa menggunakan cara yaitu memasukan nya pada sebuah varibael agar dapat di cek


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

  th, td {
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
        <?php while ($web = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="">Edit</a> |
                    <a href="">Delete</a>
                </td>
                <td><img src="../9_php/logo/<?= $web["Gambar"] ?>" alt="gambar" width="50"></td>
                <td><?= $web["Nama"] ?></td>
                <td><?= $web["URL"] ?></td>
                <td><?= $web["Kategori"] ?></td>
                <td><?= $web["Tech"] ?></td>
                <td><?= $web["Keterangan"] ?></td>
            </tr>
            <?php $i++; ?>
        <?php endwhile; ?>
    </table>
</body>

</html>