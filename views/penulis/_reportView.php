<?php
use app\models\Penulis;
?>
<html>
    <body>
        <table class='table table-bordered'>
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Penulis</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>No Telepon</th>
        </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach(Penulis::find()->all() as $penulis): ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $penulis->penulis ?></td>
            <td><?= $penulis->alamat ?></td>
            <td><?= $penulis->email ?></td>
            <td><?= $penulis->telepon ?></td>
        </tr>
        <?php $no++; endforeach ?>
        </tbody>
    </table>
    </body>
</html>