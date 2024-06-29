<?php
//koneksi database
include 'koneksi.php';

//menangkap data yang dikirim dari form
$id =$_POST['id'];
$name =$_POST['name'];
$username =$_POST['username'];
$email =$_POST['email']; 
$password =$_POST['password'];
$repassword =$_POST['repassword']; 

//update data ke database
$pass  = password_hash($password, PASSWORD_DEFAULT);
$cek = mysqli_query($con,"UPDATE users SET name = '$name', username = '$username', password = '$pass', email = '$email', repassword = '$repassword' WHERE id = '$id'");

//mengalihkan halaman kembali ke index.php
header("location:list.php");
?>