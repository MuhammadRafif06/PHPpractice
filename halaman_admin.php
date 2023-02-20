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
    require_once 'koneksi.php';

    if (!$_SESSION['name']){
        echo "<script>alert('anda harus login terlebih dahulu')</script>";
        header("location:loginform.php");
    }
    ?>
    selamat datang <?php echo $_SESSION['name']?>
    <br>
    <?php echo $_SESSION['email']?>
    <br>
    ini adalah halaman admin
    <a href="logout_role.php">logout</a>

<!-- Buat fungsi ke halaman tambah data -->
<a href="tambah_admin.php">Tambah Data</a> 
<!-- Buat table untuk menampun datanya-->
<table width="100%" border="1">
    <tr>
        <th>Nik</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Alamat</th>
        <th>Opsi</th>
    </tr>
    <!-- Buat fungsi read data -->
    <?php
        $hasil = mysqli_query($connect, "select * FROM siswa ORDER BY id DESC");
        // me loop hasil query dari $hasil
        if ($hasil -> num_rows > 0){
        foreach ($hasil as $data) {
                echo "<tr>
                <td>".$data['nik']."</td>
                <td>".$data['nama']."</td>
                <td>".$data['kelas']."</td>
                <td>".$data['jurusan']."</td>
                <td>".$data['alamat']."</td>
                <td>
                    <a href='edit_admin.php?id=".$data['id']."'>Edit</a> |
                    <a href='hapus_admin.php?id=".$data['id']."'>Hapus</a>
                </td>
            </tr>";   
        }
            } else {
                echo "<tr><td colspan='6'>Data Masih Kosong</td></tr>";
        }
    ?>
</table>
</body>
</html>