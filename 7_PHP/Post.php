<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>

<body>

    <!-- jika form bagian action tidak di beri nilai dia akan memberikan data ke diri nya sendiri jika method tidak di isi maka nilai default nya itu get  -->

    <!-- ex ke diri sendiri -->
    <?php if (isset($_POST["sumbit"])) : ?>
        <h1>haloo haiii , <?= $_POST["nama"]; ?></h1>
    <?php endif; ?>

    <!-- <h2>Jika action tidak di beri nilai</h2>
    <form action="" method="post">
        Masukan nama:
        <input type="text" name="nama">
        <br>
        <button type="submit" name="sumbit">kirim</button>
        <br>
        <br>
        <br> -->

        <h2>jika action di beri nilai</h2>
        <form action="data2.php" method="post" target="_blank">
            Masukan nama :
            <input type="text" name="nama1">
            <br>
            <button type="submit" name="sumbit1">kirim</button>
        </form>
    </form>
</body>

</html>