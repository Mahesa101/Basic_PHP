<?php
date_default_timezone_set('Asia/Jakarta');
function isi($waktu = "Datang", $nama = "Admin")
{
    return "Selamat $waktu , $nama!";
}

$time = date("H:i");
echo $time;
if ($time >= "05:00" && $time <= "10:59") {
    $waktu = "pagi";
} elseif ($time >= "11:00" && $time <= "14:59") {
    $waktu = "siang";
} elseif ($time >= "15:00" && $time <= "18:59") {
    $waktu = "sore";
} else {
    $waktu = "malam";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>selamat datang</title>
</head>

<body>
    <h1><?php echo isi($waktu, "agus") ?></h1>
</body>

</html>

<!-- kekurangan dari php dalam penggunaan function adalah tidak boleh ada parameter yang kosong atau akan mengalami eror -->