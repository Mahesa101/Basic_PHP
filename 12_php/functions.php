<?php
//Koneksi ke database
$db = mysqli_connect("localhost", "root", "", "webterkenal");
function query($web)
{
    global $db;
    $result = mysqli_query($db, $web);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data)
{
    //ambil data setiap elemen
    //asal data ["Nama"] berasal dari input bukan database
    $nama = htmlspecialchars($data["Nama"]);
    $url = htmlspecialchars($data["URL"]);
    $kategori = htmlspecialchars($data["Kategori"]);
    $tech = htmlspecialchars($data["Tech"]);
    $keterangan = htmlspecialchars($data["Keterangan"]);
    $gambar = htmlspecialchars($data["Gambar"]);
    //htmlspecialchars bertujuan agar user jika mengisi data tidak bisa menggunakan fitur di hmtl 



    if (!empty($nama) && !empty($url)) {
        global $db;
        //query insert data / memasukan data
        $query = "INSERT INTO website
            VALUES
            ('','$nama','$url','$kategori','$tech','$keterangan','$gambar')
        
";
        // dibuat sebuah varibael untuk menampung elemen $nama dll bertujuan agar saat memasukan sebuah values tidak repot

        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    } else {
        return 0;
    }
};

function hapus($id)
{
    global $db;
    mysqli_query($db, "DELETE FROM website WHERE ID = $id");
    return mysqli_affected_rows($db);
}





function edit($data)
{
    $id = $data["ID"];
    //ambil data setiap elemen
    $nama = htmlspecialchars($data["Nama"]);
    $url = htmlspecialchars($data["URL"]);
    $kategori = htmlspecialchars($data["Kategori"]);
    $tech = htmlspecialchars($data["Tech"]);
    $keterangan = htmlspecialchars($data["Keterangan"]);
    $gambar = htmlspecialchars($data["Gambar"]);
    //htmlspecialchars bertujuan agar user jika mengisi data tidak bisa menggunakan fitur di hmtl 



    if (!empty($nama) && !empty($url)) {
        global $db;
        //query insert data / memasukan data
        $query = "UPDATE website SET
            Nama = '$nama',
            URL ='$url',
            Kategori ='$kategori',
            Tech ='$tech',
            Keterangan = '$keterangan',
            Gambar = '$gambar'
            WHERE id = $id
        
";

        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    } else {
        return 0;
    }
};



function cari($keyword)
{
    $query = "SELECT * FROM website
            WHERE
            Nama LIKE '%$keyword%' OR
            Kategori LIKE '%$keyword%' OR
            Tech LIKE '%$keyword%'
";
    return query($query);
};
