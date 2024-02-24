<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require('functions.php');

// pagination
$dataPerPage = 4;
$totalData = ceil(count(query("SELECT * FROM mahasiswa")));
$totalPage = $totalData / $dataPerPage;
$activePage = (isset($_GET["page"])) ? $_GET["page"] : 1;
$firstData = ($dataPerPage * $activePage) - $dataPerPage;


$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $firstData, $dataPerPage");

// tombol cari diklik
if (isset($_POST["search"])) {
    $mahasiswa = search($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="container w-full mx-auto m-8 text-center">

        <h1 class="text-center text-4xl font-bold text-slate-900">Daftar Mahasiswa</h1>
        <div class="text-center mt-8 flex justify-center flex-wrap w-full gap-4 mb-2">

            <a class="bg-sky-300 w-52 py-2 px-3 text-sm rounded-lg shadow-md text-slate-900 hover:bg-sky-600 hover:text-white" href="insert.php">Tambah Data Mahasiswa</a>

            <form class="" action="" method="post">
                <input class="p-1 text-sm border rounded-md border-black border-solid" type="text" name="keyword" id="" size="30" autofocus placeholder="Search....." autocomplete="off">
                <button class="bg-slate-200 hover:bg-slate-500 hover:text-white shadow-md rounded-md py-2 px-3 text-sm" type="submit" name="search">Search</button>
            </form>
            <a class="bg-red-500 w-20 py-2 px-3 text-sm rounded-lg shadow-md text-white hover:bg-red-700 hover:text-white" href="logout.php">Logout</a>
        </div>
        <br>

        <!-- nav -->
        <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
            <?php if ($i == $activePage) : ?>
                <a class="bg-sky-500 text-white shadow-md p-3 rounded-lg font-extrabold scale-125" href="?page=<?= $i; ?>"><?= $i; ?></a>
            <?php else : ?>
                <a class="bg-sky-200 hover:bg-sky-400 hover:text-slate-800 font-light shadow-md p-3 rounded-lg" href="?page=<?= $i; ?>"><?= $i; ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <table class="border-collapse border border-slate-500 border-spacing-3 mt-5 mx-auto">
            <tr>
                <th class="border border-slate-600">No.</th>
                <th class="border border-slate-600">Gambar</th>
                <th class="border border-slate-600">Nama</th>
                <th class="border border-slate-600">Nim</th>
                <th class="border border-slate-600">Email</th>
                <th class="border border-slate-600">Jurusan</th>
                <th class="border border-slate-600">Aksi</th>
            </tr>

            <?php $nomer = 1; ?>
            <?php foreach ($mahasiswa as $row) : ?>
                <tr>
                    <td class="border border-slate-700 p-4 text-center"><?= $nomer + $firstData; ?></td>
                    <td class="border border-slate-700 p-4 text-center"><img src="img/<?= $row["gambar"]; ?>" alt="" width="100"></td>
                    <td class="border border-slate-700 p-4 text-center"><?= $row["nama"]; ?></td>
                    <td class="border border-slate-700 p-4 text-center"><?= $row["nim"]; ?></td>
                    <td class="border border-slate-700 p-4 text-center"><?= $row["email"]; ?></td>
                    <td class="border border-slate-700 p-4 text-center"><?= $row["jurusan"]; ?></td>
                    <td class="border border-slate-700 p-4 text-center">
                        <a class="bg-yellow-300 w-20 py-2 px-5 text-sm rounded-full shadow-md text-slate-900 hover:bg-yellow-600 hover:text-white" href="edit.php?id=<?= $row["id"]; ?>">Edit</a> |
                        <a class="bg-red-300 w-20 py-2 px-3 text-sm rounded-full shadow-md text-slate-900 hover:bg-red-600 hover:text-white" href="destroy.php?id=<?= $row["id"]; ?>" onclick="return confirm('confirm deleting data?');">Delete</a>
                    </td>
                </tr>
            <?php $nomer++; ?>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>