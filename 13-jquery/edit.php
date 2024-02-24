<?php
session_start();
if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require('functions.php');

// ambil data dr url
$id = $_GET["id"];

// query base on id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

// cek submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // cek status update data 
    if (update($_POST, $id) > 0) {
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
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="container mx-auto my-8">
        <h1 class="text-4xl font-bold mb-6">Update your data</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
            <ul>
                <li>
                    <label for="nama">Nama : </label>
                    <input class="border my-2 rounded-md border-slate-500 shadow-md p-1 text-sm" type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
                </li>
                <li>
                    <label for="nim">NIM : </label>
                    <input class="border my-2 rounded-md border-slate-500 shadow-md p-1 text-sm" type="text" name="nim" id="nim" required value="<?= $mhs["nim"]; ?>">
                </li>
                <li>
                    <label for="email">Email : </label>
                    <input class="border my-2 rounded-md border-slate-500 shadow-md p-1 text-sm" type="text" name="email" id="email" required value="<?= $mhs["email"]; ?>">
                </li>
                <li>
                    <label for="jurusan">Jurusan : </label>
                    <input class="border my-2 rounded-md border-slate-500 shadow-md p-1 text-sm" type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>">
                </li>
                <li>
                    <label for="gambar">Gambar : </label>
                    <img src="img/<?= $mhs["gambar"]; ?>" width="70" alt=""> <br>
                    <input type="file" name="gambar" id="gambar">
                </li>
                <li>
                    <button class="my-3 mb-6 bg-sky-300 w-20 py-2 px-3 text-sm rounded-full shadow-md text-slate-900 hover:bg-sky-600 hover:text-white" type="submit" name="submit">Save</button>
                </li>
            </ul>
        </form>

        <a class="w-36 shadow-md rounded-full py-3 px-4 text-sm bg-slate-100 hover:bg-slate-500 hover:text-white" href="index.php">Back to main page</a>
    </div>
</body>

</html>