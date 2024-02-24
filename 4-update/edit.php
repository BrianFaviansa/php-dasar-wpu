<?php 
require('functions.php');   

// ambil data dr url
$id = $_GET["id"];

// query base on id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

// cek submit sudah ditekan atau belum
if(isset($_POST["submit"])) {
    // cek status update data 
    if(update($_POST, $id) > 0) {
        echo "
            <script>
            alert('data updated successfully');
            document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
        <script>
        alert('failed to update data');
        document.location.href = 'index.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
</head>
<body>
    <h1>Update your data</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
            </li>
            <li>
                <label for="nim">NIM : </label>
                <input type="text" name="nim" id="nim" required value="<?= $mhs["nim"]; ?>">
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" required value="<?= $mhs["email"]; ?>">
            </li>
            <li>
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>">
            </li>
            <li>
                <label for="gambar">Gambar : </label>
                <input type="text" name="gambar" id="gambar" required value="<?= $mhs["gambar"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Save</button>
            </li>
        </ul>
    </form>

    <a href="index.php">Back to main page</a>
</body>
</html>