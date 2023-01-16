<?php
use app\models\Penerbit;
?>
<html>
    <body>
        <table class='table table-bordered'>
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Penerbit</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Telepon</th>
        </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach(Penerbit::find()->all() as $penerbit): ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $penerbit->nama ?></td>
            <td><?= $penerbit->alamat ?></td>
            <td><?= $penerbit->email ?></td>
            <td><?= $penerbit->telepon ?></td>
        </tr>
        <?php $no++; endforeach ?>
        </tbody>
    </table>
    </body>
</html>