<?php 
    session_start();
    $_SESSION =[];
    //untuk menghapus semua session ketika logout
    session_destroy();
    //redirect ke halaman login
    header('location: login_role.php')
?>