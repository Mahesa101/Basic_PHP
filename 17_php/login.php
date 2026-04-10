<?php
require 'functions.php';


session_start();
//cek cookie
//cara simple tapi berbahaya
// if (isset($_COOKIE['login'])) {
//     if ($_COOKIE['login'] == 'true') {
//         $_SESSION['login'] == true;
//     };
// };


//cara yang lebih better
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    //ambil username berdasarkan id
    $hasil = mysqli_query($db, "SELECT DataUsername FROM users WHERE DataID = $id");

    $row = mysqli_fetch_assoc($hasil);

    //cek cooike dari username
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
};



//cek apakah sudah memasukan akun
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
};



if (isset($_POST["login"])) {
    $userN = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($db, "SELECT * FROM users WHERE DataUsername = '$userN'");

    //cek username
    if (mysqli_num_rows($result) === 1) {

        //cek password
        $row = mysqli_fetch_assoc($result);



        //kebalikan hash 
        if (password_verify($password, $row["DataPassword"])) {
            //set session/ sebagai verifikasi sudah login belum
            $_SESSION["login"] = true;

            if (isset($_POST['remember'])) {
                //buat cookie
                setcookie('id', $row['DataID'], time() + 60);
                setcookie('key', hash('sha256', $row['DataUsername']), time() + 60);
            };

            header("Location: index.php");
            exit;
        };
    };


    $error = true;
};
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body class="auth-page">
    <div class="seafloor"></div>

    <div class="auth-wrapper">

        <div class="auth-deco">〜</div>


        <h1>Login</h1>
        <?php if (isset($error)): ?>
            <div class="auth-error">
                ✕ &nbsp;Incorrect username/password
            </div>
        <?php endif; ?>

        <form action="" method="post" class="auth-form">
            <ul>
                <li>
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" autocomplete="off" placeholder="masukkan username...">
                </li>
                <li>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                </li>
                <li>
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember</label>
                </li>

                <li>
                    <button type="submit" name="login">Login</button>
                </li>
            </ul>



        </form>
    </div>
</body>

</html>