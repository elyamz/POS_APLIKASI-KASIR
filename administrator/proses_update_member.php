<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data yang di kirim dari form
$NIK = $_POST['NIK'];
$Nama = $_POST['Nama'];
$JenisKelamin = $_POST['JenisKelamin'];
$Alamat = $_POST['Alamat'];
$NomorTelepon = $_POST['NomorTelepon'];

// menginput data ke database
mysqli_query($koneksi,"update member set NIK='$NIK', Nama='$Nama', JenisKelamin='$JenisKelamin' , Alamat='$Alamat', NomorTelepon='$NomorTelepon' where NIK='$NIK' ");
 
// mengalihkan halaman kembali ke data_barang.php
header("location:data_member.php?pesan=update");
 
?>