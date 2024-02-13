<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data id yang di kirim dari url
$NIK = $_POST['NIK'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from member where NIK='$NIK'");
 
// mengalihkan halaman kembali ke data_barang.php
header("location:data_member.php?pesan=hapus");
 
?>