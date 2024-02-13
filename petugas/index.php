<?php
include "sidebar.php";
?>
<?php 
session_start();

	// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
	header("location:../index.php?pesan=gagal");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Petugas Elya</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<div class="content">
			<div class="card mt-2">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<b>Data Barang</b>
									<?php
									include '../koneksi.php';
									$data_produk = mysqli_query($koneksi,"SELECT * FROM produk");
									$jumlah_produk = mysqli_num_rows($data_produk);
									?>
									<h3><?php echo $jumlah_produk; ?></h3>
									<a href="data_barang.php" class="btn btn-outline-primary btn-sm">Detail</a>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<b>Data Pembelian</b>
									<?php
									include '../koneksi.php';
									$data_penjualan = mysqli_query($koneksi,"SELECT * FROM penjualan");
									$jumlah_penjualan = mysqli_num_rows($data_penjualan);
									?>
									<h3><?php echo $jumlah_penjualan; ?></h3>
									<a href="pembelian.php" class="btn btn-outline-primary btn-sm">Detail</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			include "footer.php";
			?>