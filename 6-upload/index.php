<?php 
require('functions.php');

// tombol cari diklik
if(isset($_POST["search"])) {
    $mahasiswa = search($_POST["keyword"]);
} else {
    $mahasiswa = query("SELECT * FROM mahasiswa");
}
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

    <a href="insert.php">Tambah Data Mahasiswa</a>
    <br>

    <form action="" method="post">
        <input type="text" name="keyword" id="" size="30" autofocus placeholder="Search....." autocomplete="off">
        <button type="submit" name="search">Search</button>
    </form>
    <br>
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
            <td><?= $row["nim"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
            <td>
                <a href="edit.php?id=<?= $row["id"]; ?>">Edit</a> |
                <a href="destroy.php?id=<?= $row["id"]; ?>" onclick="return confirm('confirm deleting data?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>