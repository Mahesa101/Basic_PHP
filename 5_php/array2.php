<?php
$angka = [2, 3, 5, 63, 6, 7, 11, 5,53,];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>array</title>
    <style>
        .kotak {
            width: 50px;
            height: 50px;
            background-color: salmon;
            text-align: center;
            line-height: 50px;
            margin: 3px;
            float: left;
        }

        .clear {
            clear: both;
        }
    </style>
</head>

<?php for ($i = 0; $i < count($angka); $i++) { ?>
    <div class="kotak"><?= $angka[$i] ?></div>
<?php } ?>

<div class="clear"></div>

<?php foreach ($angka as $satuan) { ?>
    <div class="kotak"><?= $satuan ?></div>
<?php  } ?>
</body>

<div class="clear"></div>

<?php foreach ($angka as $satuan2) : ?>
    <div class="kotak"><?= $satuan2 ?></div>
<?php endforeach ?>
</body>

</html>