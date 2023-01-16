<?php
use app\models\kategori;
?>
<html>
    <body>
        <table class='table table-bordered'>
        <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>   
        </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach(kategori::find()->all() as $kategori): ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $kategori->kategori ?></td>
        </tr>
        <?php $no++; endforeach ?>
        </tbody>
    </table>
    </body>
</html>