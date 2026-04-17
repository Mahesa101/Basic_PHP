<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
};

require 'functions.php';

$ids = $_GET["id"];

if (hapus($ids) > 0) {
    echo "<script>
                    alert('Berhasil Dihapus Disimpan!');
                    document.location.href = 'index.php'; 
                </script>";
} else {
    echo "<script>
                    alert('Gagal Dihapus Disimpan!');
                    document.location.href = 'index.php'; 
                </script>";
};
