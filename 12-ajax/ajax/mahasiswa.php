<?php 
require('../functions.php');
$keyword = $_GET["keyword"];

$query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR nim LIKE '%$keyword%' OR email LIKE '%$keyword%' OR jurusan LIKE '%$keyword%'";
$mahasiswa = query($query);

?>

<table class="border-collapse border border-slate-500 border-spacing-3 mx-auto">
    <tr>
        <th class="border border-slate-600">No.</th>
        <th class="border border-slate-600">Gambar</th>
        <th class="border border-slate-600">Nama</th>
        <th class="border border-slate-600">Nim</th>
        <th class="border border-slate-600">Email</th>
        <th class="border border-slate-600">Jurusan</th>
        <th class="border border-slate-600">Aksi</th>
    </tr>

    <?php foreach ($mahasiswa as $row) : ?>
        <tr>
            <td class="border border-slate-700 p-4 text-center"><?= $nomer += 1; ?></td>
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
    <?php endforeach; ?>
</table>