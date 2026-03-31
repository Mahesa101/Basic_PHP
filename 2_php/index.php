<?php
//komentar one line

/**mutlti komentar */

//Standar ouput
echo "adalah cara untuk menampilkan sebuah teks atau tulisan di layar seperti html <br>";
print "sama hal nya dengan echo <br>";


//Standar ouput untuk devol
//print_r untuk menampilkan atau print pada sebuah array
//print_r("isi");
//var_dump untuk menampilkan sebuah tipe dan nilai pada sebuah variabel
//var_dump("isi");


//penulisan html di php
//1. menulis php di html
//2.menulis html di php

//Varibael
$name = "agus putra";
echo "$name <br>";
//dimana titik dua memiliki sebuah konsep interpolasi yang membuat nya dapat menggunkana sebuah varibel dan titik satu tidak memiliki konsep interpolasi



//Operator
//Arimatika
$x = 10;
$y = 5;

echo $y - $x . "<br>";
echo $x + $y . "<br>";
echo $x * $y . "<br>";
echo $x / $y . "<br>";


//Concat / penggabung string

$nama_depan = "kon";
$nama_belakang = "tol <br>";

echo $nama_depan . $nama_belakang;


//Assignment
// =, +=, -=, /=, %=, .=,!=

$jenis = "kucing";
$jenis .= " ";
$jenis .= "Hitam ";
echo $jenis;

//Indentitas
// ===, !==

//Logika
//&& , ||, !