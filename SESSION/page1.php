<?php
//session start sebagia awalan atau syarat pertama dalam penggunaan superglobal session
session_start();
//page ini harus di buka pertama sebagai set nilai untuk page kedua
//atau syarat kedua nya itu adalah nilai asal harus di set atau di jalan kan terlebih dulu sebelum nilai terpanggil

$_SESSION["username"] = "agus putra";

//dan session bersifat sementara dimana saat kondisi "server/pc" mati maka nilai yang sudah di set akan menghilang
