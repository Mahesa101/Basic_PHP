<?php

require "../functions.php";
$keyword = $_GET["keyword"];
$queary = "SELECT *FROM website
           WHERE   
        DataNama LIKE '%$keyword%' OR
        DataTech LIKE '%$keyword%'
";
$data = query($queary);



$jumlahDataPage = 5;
// Hitung total dulu
if ($keyword !== '') {
    $jumlahData = count(cari($keyword)); // fungsi cari lama, tanpa limit
} else {
    $jumlahData = count(query("SELECT * FROM website"));
}

$jumlahPage = ceil($jumlahData / $jumlahDataPage);
$pageAktif = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$awalData = ($jumlahDataPage * $pageAktif) - $jumlahDataPage;

// Query data dengan limit
if ($keyword !== '') {
    $data = cariWithLimit($keyword, $awalData, $jumlahDataPage);
} else {
    $data = query("SELECT * FROM website LIMIT $awalData, $jumlahDataPage");
}
?>

<?php $queryString = $keyword !== '' ? '&keyword=' . urlencode($keyword) : ''; ?>

<?php if ($pageAktif > 1): ?>
    <a href="?page=<?= $pageAktif - 1 . $queryString; ?>">&lt;</a>
<?php endif; ?>

<?php for ($i = 1; $i <= $jumlahPage; $i++) : ?>
    <?php if ($i === $pageAktif) : ?>
        <a href="?page=<?= $i . $queryString ?>" class="page"> <?= $i; ?></a>
    <?php else : ?>
        <a href="?page=<?= $i . $queryString ?>"> <?= $i; ?></a>
    <?php endif; ?>
<?php endfor ?>

<?php if ($pageAktif < $jumlahPage): ?>
    <a href="?page=<?= $pageAktif + 1 . $queryString ?>">&gt;</a>
<?php endif; ?>

<table>

    <th>NO.</th>
    <th>Aksi</th>
    <th>Gambar</th>
    <th>Nama</th>
    <th>URL</th>
    <th>Kategori</th>
    <th>Bahasa Backend</th>
    <th>Deskirpsi</th>
    <?php $i = 1; ?>
    <?php foreach ($data as $datas) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a href="edit.php?id=<?= $datas["DataID"] ?>">Edit</a> |
                <a href="delete.php?id=<?= $datas["DataID"]; ?>" onclick="return confirm('sure?')">Delete</a>
            </td>
            <td><img src="../logo/<?= $datas["DataGambar"] ?>" alt="gambar" width="50"></td>
            <td><?= $datas["DataNama"] ?></td>
            <td><?= $datas["DataURL"] ?></td>
            <td><?= $datas["DataKategori"] ?></td>
            <td><?= $datas["DataTech"] ?></td>
            <td><?= $datas["DataKeterangan"] ?></td>
        </tr>
        <?php $i++; ?>
    <?php endforeach; ?>
</table>