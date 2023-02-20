<?php
//fungsi delete data
include('koneksi.php');

//memanggil parameter id yang akan dihapus
$id = $_GET['id'];

//membuat query untuk menghapus data berdasarkan parameter id
$result = mysqli_query($connect, "delete from siswa where id=$id");

if ($result) {
    echo "<script>
        alert('berhasil hapus data')
        window.location.href='halaman_admin.php'
        </script>";
} else {
    echo "<script>
        alert('gagal!')
        </script>";
}
?>