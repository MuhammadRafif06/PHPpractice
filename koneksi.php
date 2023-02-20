<?php
//isi detail database
$db_host = 'localhost';
$db_usern = 'root';
$db_pass = '';
$db_name = 'sekolah';

//membuat koneksi
$connect = mysqli_connect($db_host, $db_usern, $db_pass, $db_name);
if ($connect->errno){
    echo $connect->error;
    exit;
} 
?>  