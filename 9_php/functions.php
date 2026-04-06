<?php
//Koneksi ke database
$db = mysqli_connect("localhost", "root", "", "webterkenal");
function query($web)
{
    global $db;
    $result = mysqli_query($db, $web);
    $rows = [];
    while ($row = mysqli_fetch_array($result)) {
        $rows[] = $row;
    }
    return $rows;
}
