<?php 
// cek submit sudah ditekan atau belum
if(isset($_POST["submit"])) {
    // cek username dan password
    if($_POST["username"] == "admin" && $_POST["password"] == "123") {
        // redirect sesuai kondisi
        header("Location: admin.php");
        exit;
    } else {
        // tampilkan error message 
        $error = true;

    }
    
}
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Login Admin</title>
</head>

<body>
    <h1>Login</h1>
    <?php if(isset($error)) : ?>
    <p style="color:red; font-style:italic;">Username / Password salah</p>
    <?php endif ; ?>
    <ul>
        <form action="" method="post">
            <li>
                <label for="username">Username : </label>
                <input type="text" name="username" id="username" autofocus>
            </li>
            <li>
                <label for="password">Password : </label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="submit">Login</button>
            </li>
        </form>
    </ul>
</body>

</html>