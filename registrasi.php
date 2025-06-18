<?php 

include 'functions.php';

if( isset($_POST['register']) ) {

    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $konpass = $_POST['pass2'];

    // if(empty($username) || empty($pass) || empty($konpass)) {
    //     echo "
    //         <script>
    //             alert('maaf harus menginputkan data');
    //         </script>
    //     ";
    // }

    // cek username
    $query = "SELECT username FROM user WHERE username = '$username'";
    $sql = mysqli_query($conn, $query);
    // jika sudah username maka tampilkan code dibawah ini
    if(mysqli_num_rows($sql)) {

        echo "maaf username sudah dipakai";

    } else {
        // cek password jika password yang diinputkan diawal sudah sama dengan inputan yang ke-2
        if($pass == $konpass) {
            // password hash atau enkripsi password
            $passhash = password_hash($pass, PASSWORD_DEFAULT);
            $query = "INSERT INTO user VALUES ('', '$username', '$passhash')";
            $sql = mysqli_query($conn, $query);

            echo "
                <script>
                    alert('akun anda sudah terdaftar');
                </script>
            ";
            // exit;
        } else {
            echo "
                <script>
                    alert('maaf password anda kurang tepat');
                </script>
            ";
        }

    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registrasi</title>
</head>
<body>

<h1>registrasi</h1>

<ul>
    <form action="" method="post">
        <li>
            <label for="">username :</label> <br>
            <input type="text" name="username" id="">
        </li>
        <li>
            <label for="">password :</label> <br>
            <input type="password" name="pass" id="">
        </li>
        <li>
            <label for="">konfirmasi password :</label> <br>
            <input type="password" name="pass2" id="">
        </li>
        <li>
            <button type="submit" name="register">registrasi!</button>
        </li>
    </form>
</ul>
    
</body>
</html>