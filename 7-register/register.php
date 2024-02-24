<?php 
include('functions.php');

if(isset($_POST["register"])) {
    if(register($_POST) > 0) {
        echo "
            <script>
            alert('account registered successfully');
            document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo mysqli_error($conn);
    }
}
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="container mx-auto my-10 flex flex-col items-center text-center justify-center">
            <h1 class="font-bold text-3xl mb-4">Register Here</h1>

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
                        <label class="block" for="password-confirm">Password Confirm : </label>
                        <input class="border my-2 rounded-md border-slate-500 shadow-md w-80 p-1" type="password" name="password-confirm" id="password-confirm">
                    </li>
                    <li>
                        <button type="submit" name="register" class="mt-4 bg-sky-300 w-20 py-2 px-3 text-sm rounded-full shadow-md text-slate-900 hover:bg-sky-600 hover:text-white">Register</button>
                    </li>
                </ul>
            </form>
    </div>
</body>

</html>