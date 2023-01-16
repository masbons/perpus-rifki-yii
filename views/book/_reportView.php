<?php
use app\models\Book;
?>
<html>
    <body>
        <table class='table table-bordered'>
        <thead>
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Tahun Terbit</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Kategori</th>
            <th width="100px">Sinopsis</th>
            <th>Sampul</th>
        </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach(Book::find()->all() as $book): ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $book->nama ?></td>
            <td><?= $book->tahun_terbit ?></td>
            <td><?= $book->penulis->penulis ?></td>
            <td><?= $book->penerbit->nama ?></td>
            <td><?= $book->kategori->kategori ?></td>
            <td><?= $book->sinopsis ?></td>
            <td><img src="./image/{{ $book->image }}" width="150px"></td>
        </tr>
        <?php $no++; endforeach ?>
        </tbody>
    </table>
    </body>
</html>