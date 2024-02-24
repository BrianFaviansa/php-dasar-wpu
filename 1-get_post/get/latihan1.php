<?php
// superglobals
// variabel global milik php yg merupakan array associative

// var_dump($_SERVER);

// $_GET
// $_GET["nama"] = "Brian Faviansa";
// $_GET["nim"] = "1014";

$mahasiswa = [
    [
        "nama" => "Sekar Sari",
        "nim" => 1031,
        "email" => "sari@gmail.com",
        "jurusan" => "Sistem Informasi",
        "gambar" => "sekar.jpg"
    ],
    [
        "nama" => "Brian Faviansa",
        "nim" => 1014,
        "email" => "ansa@gmail.com",
        "jurusan" => "Sistem Informasi",
        "gambar" => "ndut.jpg"
    ]
];


// var_dump($_GET);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>

    <ul>
        <?php foreach ($mahasiswa as $mhs) : ?>
            <li>
                <a href="latihan2.php?nama=<?= $mhs["nama"]; ?>&nim=<?= $mhs["nim"]; ?>&email=<?= $mhs["email"]; ?>&jurusan=<?= $mhs["jurusan"]; ?>&gambar=<?= $mhs["gambar"]; ?>"> <?= $mhs["nama"]; ?></a> 
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>