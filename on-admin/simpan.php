<?php
include 'koneksi.php';
// menyimpan data kedalam variabel
$nama            = $_POST['nama'];
$username           = $_POST['username'];
$password        = $_POST['password'];
$level_user  = $_POST['level_user'];

// query SQL untuk insert data
$query="INSERT INTO users SET nama='$nama',username='$username',password='$password',level_user='$level_user'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:tambah_user.php");
?>