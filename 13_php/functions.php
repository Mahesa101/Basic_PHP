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

function upload()
{
    //['Gambar'] dapet dari name di file add
    $namaF = $_FILES['Gambar']['name'];
    $ukuranF = $_FILES['Gambar']['size'];
    $error = $_FILES['Gambar']['error'];
    $tmpName = $_FILES['Gambar']['tmp_name'];

    //cek apakah tidak ada gambar
    if ($error === 4) {
        echo "
        <script>
        alert('select an image first')
        </script>";
        return false;
    };

    //cek yang di up cuman gambar
    $ekstensiF = ['jpg', 'jpeg', 'png'];
    // kata kucing yang dapat masuk

    $ekstensiN = explode('.', $namaF);
    // jika sebuah . di dalam pertengahan dua string maka akan di pecah menjadi array seperti
    //agus.jpg => ['agus','jpg'];

    $ekstensiN = strtolower(end($ekstensiN));
    // setelah di pecah ambil paling akhir dan ubah menjadi huruf kecil semua

    if (!in_array($ekstensiN, $ekstensiF)) {
        echo "
        <script>
        alert('this is not an allowed image format')
        </script>";
        return false;
    }

    //cek ukuran gambar
    if ($ukuranF > 1000000) {
        echo "
        <script>
        alert('image size is too large')
        </script>";
        return false;
    }


    //generate nama gambar
    $namaNews = uniqid();
    $namaNews .= '.';
    $namaNews .= $ekstensiN;

    //lulus cek,up gambar
    move_uploaded_file($tmpName, '../logo/' . $namaNews);


    return $namaF;
};

function tambah($data)
{
    //ambil data setiap elemen
    //asal data ["Nama"] berasal dari input/file add bukan database
    $nama = htmlspecialchars($data["Nama"]);
    $url = htmlspecialchars($data["URL"]);
    $kategori = htmlspecialchars($data["Kategori"]);
    $tech = htmlspecialchars($data["Tech"]);
    $keterangan = htmlspecialchars($data["Keterangan"]);
    //htmlspecialchars bertujuan agar user jika mengisi data tidak bisa menggunakan fitur di hmtl 

    //Upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

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
    $gambarL = $data["gambarL"];


    //cek gambar di ganti atau tidak
    if ($_FILES['Gambar']['error']) {
        $gambar = $gambarL;
    }else{
        $gambar = upload();
    }





    
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
