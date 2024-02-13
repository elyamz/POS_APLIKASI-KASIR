<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data yang di kirim dari form
$nama_petugas = $_POST['nama_petugas'];
$Husername = $_POST['username'];
$password = $_POST['password'];
$level= $_POST['level'];
 
// menginput data ke database
mysqli_query($koneksi,"insert into petugas values('','$nama_petugas','$username','$password','$level')");
 
// mengalihkan halaman kembali ke data_pengguna.php
header("location:data_pengguna.php?pesan=simpan");
 
?>