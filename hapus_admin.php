<?php
//fungsi delete data
include('koneksi.php');

//memanggil parameter id yang akan dihapus
$id = $_GET['id'];
$foto = $_GET['foto'];

//jikalau ada foto maka sekalian dihapus berserta file yg ada difoldernya
if (is_file("images/".$foto)){
    //fungsi hapus file di folder
    unlink("images/".$foto);
    //membuat query hapus data 
    mysqli_query($connect, "delete from siswa where id = '$id'");
    echo "<script>
        alert('berhasil hapus data')
        window.location.href='halaman_admin.php'
    </script>";
    //jikalau foto tidak ada untuk dihapus
} else {
    $deletetanpafolder = mysqli_query($connect, "delete from siswa where id = '$id'");
    if ($deletetanpafolder) {
        echo "<script>
            alert('berhasil hapus data')
            window.location.href='halaman_admin.php'
            </script>";
    } else {
        echo "<script>
            alert('gagal!')
            </script>";
    }
}
?>