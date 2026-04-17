<?php
session_start();

//tujuan untuk menghapus session yang ada
//dari menimpa
$_SESSION = [];
//mengunset
session_unset();
//dan menghilangkan
session_destroy();

//hapus cookie
setcookie('id', '', time() - 3600);
setcookie('key', '', time() - 3600);

header("Location: login.php");
exit;
