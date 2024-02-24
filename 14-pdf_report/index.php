<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require('functions.php');

// tombol cari diklik
if (isset($_POST["search"])) {
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
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/script.js"></script>
    <style>
        @media print {
            #logout, #insertNew, #searchButton, #action {
                display:none;
            }
        }
    </style>
</head>

<body>
    <div class="container w-full mx-auto m-8">

        <h1 class="text-center text-4xl font-bold text-slate-900">Daftar Mahasiswa</h1>
        <div class="text-center mt-8 flex justify-center flex-wrap w-full gap-4">

            <a id="insertNew" class="bg-sky-300 w-52 py-2 px-3 text-sm rounded-lg shadow-md text-slate-900 hover:bg-sky-600 hover:text-white" href="insert.php">Tambah Data Mahasiswa</a>

            <form class="" action="" method="post">
                <input id="keyword" class="p-1 text-sm border rounded-md border-black border-solid" type="text" name="keyword" size="30" autofocus placeholder="Search....." autocomplete="off">
                <button id="searchButton" class="bg-slate-200 hover:bg-slate-500 hover:text-white shadow-md rounded-md py-2 px-3 text-sm" type="submit" name="search">Search</button>
            </form>
            <a target="_blank" class="bg-sky-300 py-2 px-3 text-sm rounded-lg shadow-md text-slate-900 hover:bg-sky-600 hover:text-white" href="print.php">Print</a>
            <a id="logout" class="bg-red-500 w-20 py-2 px-3 text-sm rounded-lg shadow-md text-white hover:bg-red-700 hover:text-white" href="logout.php">Logout</a>
        </div>
        <br>
        <div id="container">
            <table class="table-fixed border-collapse border border-slate-500 border-spacing-3 mx-auto">
                <tr>
                    <th class="border border-slate-600">No.</th>
                    <th class="border border-slate-600">Gambar</th>
                    <th class="border border-slate-600">Nama</th>
                    <th class="border border-slate-600">Nim</th>
                    <th class="border border-slate-600">Email</th>
                    <th class="border border-slate-600">Jurusan</th>
                    <th id="action" class="border border-slate-600">Aksi</th>
                </tr>

                <?php foreach ($mahasiswa as $row) : ?>
                    <tr>
                        <td class="border border-slate-700 p-4 text-center"><?= $nomer += 1; ?></td>
                        <td class="border border-slate-700 p-4 text-center"><img src="img/<?= $row["gambar"]; ?>" alt="" width="100"></td>
                        <td class="border border-slate-700 p-4 text-center"><?= $row["nama"]; ?></td>
                        <td class="border border-slate-700 p-4 text-center"><?= $row["nim"]; ?></td>
                        <td class="border border-slate-700 p-4 text-center"><?= $row["email"]; ?></td>
                        <td class="border border-slate-700 p-4 text-center"><?= $row["jurusan"]; ?></td>
                        <td id="action" class="border border-slate-700 p-4 text-center">
                            <a class="bg-yellow-300 w-20 py-2 px-5 text-sm rounded-full shadow-md text-slate-900 hover:bg-yellow-600 hover:text-white" href="edit.php?id=<?= $row["id"]; ?>">Edit</a> |
                            <a class="bg-red-300 w-20 py-2 px-3 text-sm rounded-full shadow-md text-slate-900 hover:bg-red-600 hover:text-white" href="destroy.php?id=<?= $row["id"]; ?>" onclick="return confirm('confirm deleting data?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

    </div>
</body>

</html>