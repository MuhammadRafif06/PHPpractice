<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>
     <!-- Buat fungsi ke halaman data admin -->
     <a href="halaman_admin.php">Kembali</a>

     <!-- form untuk mengisi data -->
     <form method="post" enctype="multipart/form-data">
        <table width="25%" border="0">
            <tr>
                <td>Nik</td>
                <td><input type="number" name="nik"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td><input type="file" name="foto"></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td><input type="number" name="kelas"></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>
                    <select name="jurusan">
                        <option selected disabled>-- Pilih Jurusan --</option>
                        <option value="RPL">RPL</option>
                        <option value="TKJ">TKJ</option>
                        <option value="DMM">DMM</option>
                    </select>    
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                    <textarea name="alamat" rows="5"></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" name="submit">KIRIM</button>
                </td>
            </tr>
        </table>
     </form>
     <?php
    require_once 'koneksi.php';
    //untuk mengirim data ke table users
    if (isset($_POST['submit'])){
       $nik = ($_POST['nik']);
       $nama = ($_POST['nama']);
       $foto = ($_POST['foto']);
       $kelas = ($_POST['kelas']);
       $jurusan = ($_POST['jurusan']);
       $alamat = ($_POST['alamat']);

       //untuk membuat sebuah nilai random
       $ran = rand();
       $ekstensi = ['png','jpg','jpeg','svg'];
       $namafile = $_FILES['foto']['name'];
       $ukuran = $_FILES['foto']['size'];
       $ext = pathinfo($namafile, PATHINFO_EXTENSION);
       //membuat sebuah validasi
       if (empty($nik) || empty($nama) || empty($kelas) || empty($jurusan) || empty($alamat)) {
         echo "<script>alert('Data tidak boleh kosong !');</script>";
         //jika data yang dimasukkan lebih dari 1 atau ada persamaan request
       } elseif (count((array) $connect->query('select nik from siswa where nik = "'.$nik.'"')->fetch_array()) > 1){
        echo '<script>alert("Nik sudah ada !");</script>';
        //input data ke database
       } else {
        if (!in_array($ext, $ekstensi)) {
            echo '<script>
                  alert("Format file tidak sesuai");
                  </script>';
        } else {
            if ($ukuran < 1044070) {
                $xx = $ran.'_'.$namafile;
                //untuk menampung file kedalam folder yang dituju
                move_uploaded_file($_FILES['foto']['tmp_name'], 'images/'.$ran.'_'.$namafile);
                //query untuk menyimpan data di database
                $connect->query("insert into siswa(nik,nama,foto,kelas,jurusan,alamat) values ('$nik','$nama','$xx','$kelas','$jurusan','$alamat')");
                echo '<script>
                    alert("Data berhasil ditambahkan !");
                    window.location.href = "halaman_admin.php";  
                </script>';
            } else {
                echo '<script>
                     alert(" gagal Maning !");  
                </script>';
              }
           }
        }
    }
?>
</body>
</html>