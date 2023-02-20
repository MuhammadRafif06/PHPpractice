<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
</head>
<body>
    <?php
    //untuk menjalankan sesi yang kita panggil
    session_start();

    if (!$_SESSION['name']){
        echo "<script>alert('anda harus login terlebih dahulu')</script>";
        header("location:loginform.php");
    }
    ?>
    selamat datang <?php echo $_SESSION['name']?>
    <br>
    <?php echo $_SESSION['email']?>
    <br>
    ini adalah halaman guru
    <a href="logout_role.php">logout</a>
</body>
</html>