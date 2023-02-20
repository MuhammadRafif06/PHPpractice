<!DOCTYPE html>
<html lang="en">

<head>

    <title>login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap v5.1.3 CDNs -->
    <link rel="stylesheet" href="loginform.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- CSS File -->
    <link rel="stylesheet" href="">

</head>

<body>

<?php
    //memanggil config database
    include 'koneksi.php';
    //menambahkan error list
    error_reporting(0);
    //membuat sebuah session
    session_start();
    //membuat validasi login jikalau sesi nama ada maka bisa login
    // if (isset($_SESSION['nama'])) {
    //     header('location: halamanutama.php');
    // }

    //membuat sebuah validasi mencocokan email password di database
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        //untuk mencocokan request dengan database
        $query = "select * from users where email = '$email' and password = '$password'";
        $hasil = mysqli_query($connect, $query);
        //jikalau data login sukses
        if ($hasil->num_rows > 0) {
            $baris = mysqli_fetch_assoc($hasil);
            $_SESSION['nama'] = $baris['nama'];
            $_SESSION['email'] = $baris['email'];
            $_SESSION['username'] = $baris['username'];
            header('location: halamanutama.php');
            // jikalau data login tidak ada atau gagal
        } else {
            echo "<script>alert('Email atau Password anda salah')</script>";
        }
    }
   ?>
    
    <div class="login">

        <h1 class="text-center">Hello!</h1>
        <form class="needs-validation" method="post">
            <div class="form-group was-validated">
                <label class="form-label" for="email">Email address</label>
                <input class="form-control" name="email" type="email" id="email" required>
                <div class="invalid-feedback">
                    Please enter your email address
                </div>
            </div>
            <div class="form-group was-validated">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" name="password" type="password" id="password" required>
                <div class="invalid-feedback">
                    Please enter your password
                </div>
            </div>
            <div class="form-group form-check">
                <input class="form-check-input" type="checkbox" id="check">
                <label class="form-check-label" for="check">Remember me</label>
            </div>
            <input class="btn btn-success w-100" name="submit" type="submit" value="Login">
        </form>
    </div>

</body>

</html>