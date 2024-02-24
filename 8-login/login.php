<?php
require("functions.php");

if(isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // cek username
    if(mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])) {
            header("Location: index.php");
            exit;
        }
    }

    $error = true;

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
        <div class="container mx-auto my-10 flex flex-col items-center text-center justify-center">
                <h1 class="font-bold text-3xl mb-4">Login Here</h1>

                <?php if(isset($error)) : ?>
                    <p class="text-red-500 italic text-base mb-2">Please check your credentials again</p>
                <?php endif; ?>

                <form action="" method="post" class="font-sans">
                    <ul>
                        <li>
                            <label class="block" for="username">Username : </label>
                            <input class="border my-2 rounded-md border-slate-500 shadow-md w-80 p-1" type="text" name="username" id="username" autofocus>
                        </li>
                        <li>
                            <label class="block" for="password">Password : </label>
                            <input class="border my-2 rounded-md border-slate-500 shadow-md w-80 p-1" type="password" name="password" id="password">
                        </li>
                        <li>
                            <button type="submit" name="login" class="mt-4 bg-sky-300 w-20 py-2 px-3 text-sm rounded-full shadow-md text-slate-900 hover:bg-sky-600 hover:text-white">Login</button>
                        </li>
                    </ul>
                </form>
        </div>
    </body>

</html>