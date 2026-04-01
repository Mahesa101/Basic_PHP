<?php

//Built in funtion
//Date
//untuk menampilkan tanggal dalam format tertentu
echo date("l <br>"); //hari
echo date("d <br>"); //tanggal
echo date("m <br>") . "<br>"; //bulan/M  Nama bulan singkat
// echo "<br>";


//TIme
//untuk memperlihatkan sebuah waktu yang berjalan

//UNIX Timestamp / EPOCH time
//adalah sebuah detik yang sudah berlaku semenjak 1 januari 1970 karena itu hasil kesepakatan ahli komputer untuk mejanan

echo time();


//ex menggunakan time dan date
echo "<br>";
echo date("D M Y", time() + 60 * 60 * 24 * 100) . "<br>";//dimana code ini bertujuan mencari tau hari apa 100 hari lagi dimana jika + maka kedepan jika - maka kebelangkang 
//rumus
//60 * 60 * 24 * n day
//dimana karena 1 menit itu 60 detik dan satu jam itu 60 menit yang membuat rumus nya begitu dan satu hari 24 jam


//mktime
//membuat semua waktu sendiri 
//mktime(0,0,0,0,0,0);
//rumus
//jam,menit,detik,bulan,tanggal,tahun
echo date("l",mktime(0,0,0,10,07,2007)) ."<br>";

//strtotime
echo date ("l",strtotime("07 oct 2007"));


//String
/**
 * strlen()
 * strcmp()
 * explode()
 * htmlspecialchars()
 */

//Utility / funsion bantuan
/**
 * var_dump()
 * isset()
 * empty()
 * die()
 * sleep()
 */



