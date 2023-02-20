<!DOCTYPE html>
<?php
    require_once 'koneksi.php';
    //untuk mengirim data ke table users
    if (isset($_POST['submit'])){
       $name = strip_tags($_POST['name']);
       $role = strip_tags($_POST['role']);
       $email = strip_tags($_POST['email']);
       $password = strip_tags($_POST['password']);
       $address = strip_tags($_POST['address']);


       //membuat sebuah validasi
       if (empty($name) || empty($email) || empty($password) || empty($address)) {
         echo 'data harus di isi !';
         //jika data yang dimasukkan lebih dari 1 atau ada persamaan request
       } elseif (count((array) $connect->query('select name from access where name = "'.$email.'"')->fetch_array()) > 1){
        echo 'data sudah ada !';
        //input data ke database
       } else {
        $hashing = md5($password);
        $input = $connect->query("insert into access(name,role,email,password,address) values ('$name','$role','$email','$hashing','$address')");
        if ($input){
            header("location: login_role.php");
        } else {
            echo 'gagal';
        }
       }
    }
?>
<body>
    <form method="post">
        <input type="text" name="name" autocomplete="off" placeholder="isi nama.."/>
        <br/>
        <select name="role">
            <option selected disable>--pilih role--</option>
            <option value="admin">Admin</option>
            <option value="guru">Guru</option>
        </select>
        <br>
        <input type="email" name="email" placeholder="isi email.."/>
        <br/>
        <input type="password" name="password" placeholder="isi password.."/>
        <br/>
        <textarea name="address" rows="5" placeholder="silahkan isi alamat.."></textarea>
        <br>
        <button type="submit" name="submit">Register</button>
    </form>
</body>