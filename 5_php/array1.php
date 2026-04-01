<?php
//Array
//adalah sebuah varibael yang dapat menampung banyak nilai dimana
//nilai yang ada di dalam array element dan setiap element memiliki index
//atau sebuah varibel yang memiliki sebuah key dan value

//penulisan
//cara lama
$hari = array("senin", "selasa", "rabu");
//cara baru
$bulan = ["januari", "febuari", "maret"];


//dan satu array dapat menampung berbagai jenis nilai langsung 


//menampilkan Array
var_dump($hari); //menampilkan array dengan lengkap dari jenis sampai jumlah element 
echo " <br>";
echo " <br>";
print_r($bulan);
echo "<br>";
echo " <br>";
//menampilkan satu saja
echo $hari[2];
echo "<br>";
echo " <br>";

//Menambahkan array
$hari[] = "kamis";
$hari[] ="jumat";

var_dump($hari);

//var_dump dan print_r di gunakan prosed devol bukan hasil akhir 