<!DOCTYPE html>
<?php
    require_once 'koneksi.php';
    //untuk mengirim data ke table users
    if (isset($_POST['submit'])){
       $username = strip_tags($_POST['username']);
       $email = strip_tags($_POST['email']);
       $nama = strip_tags($_POST['nama']);
       $password = strip_tags($_POST['password']);

       //membuat sebuah validasi
       if (empty($username) || empty($email) || empty($nama) || empty($password)) {
         echo 'data harus di isi !';
         //jika data yang dimasukkan lebih dari 1 atau ada persamaan request
       } elseif (count((array) $connect->query('select username from users where username = "'.$username.'"')->fetch_array()) > 1){
        echo 'data sudah ada !';
        //input data ke database
       } else {
        $hashing = md5($password);
        $input = $connect->query("insert into users(nama,username,email,password) values ('$nama','$username','$email','$hashing')");
        if ($input){
            echo 'sukses';
        } else {
            echo 'gagal';
        }
       }
    }
?>
<body>
    <form method="post">
        <input type="text" name="username" autocomplete="off" placeholder="isi username.."/>
        <br/>
        <input type="email" name="email" autocomplete="off" placeholder="isi email.."/>
        <br/>
        <input type="text" name="nama" autocomplete="off" placeholder="isi nama lengkap.."/>
        <br/>
        <input type="password" name="password" autocomplete="off" placeholder="isi password.."/>
        <br/>
        <button type="submit" name="submit">Register</button>
    </form>
</body>