<?php
//cek apakah tombol submit sudah tekan atau belum
if (isset($_POST["submit"])) {

    //cek usernamle & pw
    if ($_POST["username"] == "admin" && $_POST["password"] == 123) {

        //jika benar,di lempar ke halama admin
        header("Location: admin.php");
        exit;
    } else {
        //jika salah,pesan muncul
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login Admin</h1>
    <ul>
        <form action="" method="post">
            <li>
                <label for="user">Username <br></label>
                <input type="text" name="username" id="user">
            </li>
            <li>
                <label for="pw">Password <br></label>
                <input type="password" name="password" id="pw">
            </li>
            <li><button type="submit" name="submit">Login</button></li>
        </form>
    </ul>

    <?php if (isset($error)) : ?>
        <p style="color: red; font-style: italic;">Username/ pw salah</p>
    <?php endif ?>
</body>

</html>