<?php 
require('functions.php');
$mahasiswa = query('SELECT * FROM mahasiswa');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        table {
            margin: auto;
            text-align: center;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>

    <table border="1" cellpadding="10" cellspacing="0" class="center">
        <tr>
            <th>No.</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Nim</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>

        <?php foreach($mahasiswa as $row) : ?>
        <tr>
            <td><?= $nomer+=1; ?></td>
            <td><img src="img/<?= $row["gambar"]; ?>" alt="" width="100"></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["gambar"]; ?></td>
            <td><?= $row["nim"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
            <td>
                <a href="">Edit</a> |
                <a href="">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>