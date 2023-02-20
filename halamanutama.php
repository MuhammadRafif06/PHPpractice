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

    if (!$_SESSION['nama']){
        echo "<script>alert('anda harus login terlebih dahulu')</script>";
        header("location:loginform.php");
    }
    ?>
    selamat datang <?php echo $_SESSION['nama']?>
    <br>
    <?php echo $_SESSION['email']?>
    <br>
    <?php echo $_SESSION['username']?>
    <br>
    <a href="logout.php">logout</a>
</body>
</html>