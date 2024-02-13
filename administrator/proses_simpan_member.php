<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data yang di kirim dari form
$NIK = $_POST['NIK'];
$Nama = $_POST['Nama'];
$JenisKelamin = $_POST['JenisKelamin'];
$Alamat = $_POST['Alamat'];
$NomorTelepon= $_POST['NomorTelepon'];
 
// menginput data ke database
mysqli_query($koneksi,"insert into member values('$NIK','$Nama','$JenisKelamin','$Alamat','$NomorTelepon')");
 
// mengalihkan halaman kembali ke data_member.php
header("location:data_member.php?pesan=simpan");
 
?>