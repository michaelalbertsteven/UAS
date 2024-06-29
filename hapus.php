<?php
//koneksi database
include 'koneksi.php';

//menangkap data id yang dikirim dari url
$id = $_GET['id'];

//menghapus data dari database
mysqli_query($con,"DELETE FROM users WHERE id = '$id'");

//mengalihkan halaman kembali ke index.php
header("location:list.php");