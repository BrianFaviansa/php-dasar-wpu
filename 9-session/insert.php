<?php
session_start();
if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require('functions.php');

// cek submit sudah ditekan atau belum
if (isset($_POST["submit"])) {


    // cek status insert data 
    if (insert($_POST) > 0) {
        echo "
            <script>
            alert('data inserted successfully');
            document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
        <script>
        alert('failed to insert data');
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
    <title>Insert Data</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="container mx-auto">
        <h1 class="font-bold text-3xl my-4">Insert your data</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <ul>
                <li>
                    <label for="nama">Nama : </label>
                    <input class="border my-2 rounded-md border-slate-500 shadow-md p-1 text-sm" type="text" name="nama" id="nama" required>
                </li>
                <li>
                    <label for="nim">NIM : </label>
                    <input class="border my-2 rounded-md border-slate-500 shadow-md p-1 text-sm" type="text" name="nim" id="nim" required>
                </li>
                <li>
                    <label for="email">Email : </label>
                    <input class="border my-2 rounded-md border-slate-500 shadow-md p-1 text-sm" type="text" name="email" id="email" required>
                </li>
                <li>
                    <label for="jurusan">Jurusan : </label>
                    <input class="border my-2 rounded-md border-slate-500 shadow-md p-1 text-sm" type="text" name="jurusan" id="jurusan" required>
                </li>
                <li>
                    <label for="gambar">Gambar : </label>
                    <input class="my-2" type="file" name="gambar" id="gambar" required>
                </li>
                <li>
                    <button class="bg-sky-300 w-20 py-2 px-3 text-sm rounded-full shadow-md text-slate-900 hover:bg-sky-600 hover:text-white mb-4" type="submit" name="submit">Submit</button>
                </li>
            </ul>
        </form>
        <a class="bg-sky-300 w-20 py-2 px-3 text-sm rounded-full shadow-md text-slate-900 hover:bg-sky-600 hover:text-white" href="index.php">Back to main page</a>
    </div>
</body>

</html>