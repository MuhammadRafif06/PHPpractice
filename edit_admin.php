<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit & Update admin</title>
</head>
<body>
<form method="post">
    <?php
        //fungsi edit data
        include('koneksi.php');
        //memanggil parmater id yang akan diedit
        $id = $_GET['id'];
        //membuta query untuk mengedit data berdasarkan paramter id
        $result = mysqli_query($connect, "select * from siswa where id = $id");
        //membuat loopingan objek berdasarkan parameter id
        while($edit = mysqli_fetch_array($result)) {
            $nik = $edit['nik'];
            $nama = $edit['nama'];
            $kelas = $edit['kelas'];
            $jurusan = $edit['jurusan'];
            $alamat = $edit['alamat'];
        }

    ?>
        <table width="25%" border="0">
            <tr>
                <td>Nik</td>
                <td><input type="number" name="nik" value=<?php echo $nik;?>></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"value=<?php echo $nama;?>></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td><input type="number" name="kelas"value=<?php echo $kelas;?>></td>
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
                    <textarea name="alamat" rows="5"><?php echo $alamat;?></textarea>
                </td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                <td><button type="submit" name="update">apdet</button>
                </td>
            </tr>
        </table>
     </form>
</body>
</html>