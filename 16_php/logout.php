<?php
session_start();

//tujuan untuk menghapus session yang ada
//dari menimpa
$_SESSION = [];
//mengunset
session_unset();
//dan menghilangkan
session_destroy();

header("Location: login.php");