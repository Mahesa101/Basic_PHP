<?php
require 'functions.php';

if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('New user successfully added')
               </script>";
    } else {
        echo mysqli_error($db);
    };
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
    <h1>Registration</h1>
    <form action="" method="post">

        <ul>
            <li>
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
            </li>
            <li>
                <label for="password">Passowrd</label>
                <input type="password" id="password" name="password">
            </li>
            <li>
                <label for="password2">confirm password</label>
                <input type="password" id="password2" name="password2">
            </li>
            <li><button type="submit" name="register">Register</button></li>
        </ul>



    </form>


</body>

</html>