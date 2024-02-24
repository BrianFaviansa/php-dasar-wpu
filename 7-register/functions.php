<?php 
$conn = mysqli_connect("localhost", "root", "", "phpdasar");
$nomer = 0;

function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
};

function insert($data) {
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    // upload img
    $gambar = upload();
    if(!$gambar) {
        return false;
    }

    // insert data
    $query = "INSERT INTO mahasiswa VALUES ('', '$nama', '$nim', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
};

function upload() {
    $fileName = $_FILES["gambar"]["name"];
    $fileSize = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    // cek ada gambar
    if($error != 0) {
        echo"<script>
            alert('upload your image!');
        </script>";
        return false;
    }

    // cek gambar atau bukan
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION); 
    $validExtension = ['jpg','jpeg','png'];
    if(!in_array($fileExtension, $validExtension)) {
        echo"<script>
            alert('upload a valid image!');
        </script>";
        return false;
    }

    // cek ukuran
    if($fileSize > 10000000) {
        echo"<script>
            alert('your image size is too large! max file size : 10 mb');
        </script>";
        return false;
    }

    // gambar valid
    // generate new file name
    $newFileName = uniqid();
    $newFileName .= '.';
    $newFileName .= $fileExtension;
    move_uploaded_file($tmpName, 'img/' . $newFileName);

    return $newFileName;
}

function destroy($id) {
    global $conn;

    $file = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM mahasiswa WHERE id = '$id'"));
    unlink('img/' . $file["gambar"]);

    $query = "DELETE FROM mahasiswa WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
};

function update($data, $id) {
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek upload img baru atau tidak
    if($_FILES["gambar"]["error"] != 0) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }


    // update data
    $query = "UPDATE mahasiswa SET nama = '$nama', nim = '$nim', email = '$email', jurusan = '$jurusan', gambar = '$gambar' WHERE id = '$id'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
};

function search($keyword) {
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR nim LIKE '%$keyword%' OR email LIKE '%$keyword%' OR jurusan LIKE '%$keyword%'";

    return query($query);
}

function register($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $passwordConfirmation =  mysqli_real_escape_string($conn, $data["password-confirm"]);

    // cek username
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)) {
        echo "
                    <script>
                    alert('username already exists');
                    </script>
                ";
                return false;
        } else {
                echo mysqli_error($conn);
        }

    // cek password confirm
    if($password != $passwordConfirmation) {
        echo "
                <script>
                alert('password does not match');
                </script>
            ";
            return false;
    } else {
            echo mysqli_error($conn);
    }

    // encrypt password
    $password = password_hash($password, PASSWORD_BCRYPT);

    // insert new user to db
    mysqli_query($conn, "INSERT INTO users VALUES ('', '$username', '$password')");
    
    return mysqli_affected_rows($conn);
}


