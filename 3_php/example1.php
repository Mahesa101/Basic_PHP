<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>latihan pengulangan</title>
    <style>
        .w-barisG {
            background-color: red;
        }

        .w-barisJ {
            background-color: wheat;
        }
    </style>
</head>

<body>
    <table border="1" cellpadding="10" cellspacing="0">

        <!-- <tr>
            <td>1,1</td>
            <td>1,2</td>
            <td>1,3</td>
            <td>1,4</td>
            <td>1,5</td>
        </tr>
        <tr>
            <td>2,1</td>
            <td>2,2</td>
            <td>2,3</td>
            <td>2,4</td>
            <td>2,5</td>
        </tr>
        <tr>
            <td>3,1</td>
            <td>3,2</td>
            <td>3,3</td>
            <td>3,4</td>
            <td>3,5</td>
        </tr> -->

        <!-- di bawah ini sama hal nya dengan di atas -->
        <!-- gaya biasa -->
        <!-- <?php


                for ($i = 1; $i <= 3; $i++) {
                    echo "<tr>";
                    for ($j = 1; $j <= 5; $j++) {
                        echo "<td>$i,$j</td>";
                    }
                    echo "</tr>";
                }
                ?> -->












        <!-- gaya templating -->
        <?php
        //: ... end.. itu sama aja dengna {}
        for ($i = 1; $i <= 5; $i++) : ?>
            <?php if ($i % 2 == 0): ?>
                <tr class="w-barisG">
                <?php else : ?>
                <tr class="w-barisJ">
                <?php endif ?>

                <?php for ($j = 1; $j <= 8; $j++) { ?>
                    <td><?= "$i,$j"; ?>
                    </td>
                <?php } ?>
                </tr>
            <?php endfor; ?>
    </table>
</body>

</html>

</html>