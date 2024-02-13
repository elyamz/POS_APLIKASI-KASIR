<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #abd5bd;
        }

        @media print {
            /* Style untuk media cetak */
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <h2><b>Laporan Penjualan</b></h2>
    <br>
    <?php
    include '../koneksi.php';

    $query = "SELECT penjualan.PenjualanID, penjualan.TanggalPenjualan, pelanggan.PelangganID, pelanggan.NamaPelanggan, penjualan.TotalHarga,
              SUM(detailpenjualan.JumlahProduk) AS TotalBarang
              FROM penjualan
              INNER JOIN pelanggan ON penjualan.PelangganID = pelanggan.PelangganID
              INNER JOIN detailpenjualan ON penjualan.PenjualanID = detailpenjualan.PenjualanID
              GROUP BY penjualan.PenjualanID";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
    ?>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Penjualan</th>
                        <th>Tanggal Penjualan</th>
                        <th>Pelanggan ID</th>
                        <th>Nama Pelanggan</th>
                        <th>Total Barang</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['PenjualanID']; ?></td>
                            <td><?php echo $row['TanggalPenjualan']; ?></td>
                            <td><?php echo $row['PelangganID']; ?></td>
                            <td><?php echo $row['NamaPelanggan']; ?></td>
                            <td><?php echo $row['TotalBarang']; ?></td>
                            <td>Rp. <?php echo number_format($row['TotalHarga'], 0, ',', '.'); ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
    <?php
        } else {
            echo "<p>Tidak ada data penjualan.</p>";
        }
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }

    mysqli_free_result($result);
    mysqli_close($koneksi);
    ?>
    <br>
    <button class="no-print" onclick="window.print()">Cetak</button>
    <a href="../administrator/index.php" class="no-print"><button>Kembali</button></a>
</body>
</html>
