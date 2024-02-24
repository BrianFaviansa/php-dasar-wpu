<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Post</title>
</head>
<body>
    <?php if(isset($_POST["nama"])) : ?>
        <h1>Selamat datang, <?= $_POST["nama"]; ?></h1>
    <?php endif; ?>

    <form action="latihan3.php" method="post">
        Masukkan nama :
        <input type="text" name="nama" id="" autofocus>
        <br>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>