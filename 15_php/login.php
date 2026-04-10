<?php
require 'functions.php';
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
                    <label for="username" >Username</label>
                    <input type="text" id="username" name="username" autocomplete="off" placeholder="masukkan username...">
                </li>
                <li>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                </li>
                <li>
                    <button type="submit" name="login">Login</button>
                </li>
            </ul>



        </form>
    </div>
</body>

</html>