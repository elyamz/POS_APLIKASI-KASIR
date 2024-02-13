<?php 
include '../koneksi.php';
?>

<html>
<head>
    <title></title>
    <style>
        #tabel {
            font-size: 15px;
            border-collapse: collapse;
        }
        #tabel td {
            padding-left: 5px;
            border: 1px solid black;
        }
    </style>
</head>
<body style='font-family:tahoma; font-size:8pt;'>
    <center>
        <table style='width:450px; font-size:16pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <tr>
                <td width='70%' align='center' vertical-align='top'>
                    <span style='color:black;'>
                        <b>KASIR ELYA</b></br>Jl.Masaran, Sragen
                    </span>
                    <br>
                    <span style='font-size:12pt'>No. : xxxxx, <?php echo date('d F Y'); ?> (user:xxxxx), 11:57:50</span></br><br>
                </td>
            </tr>
        </table>
        <style>
            hr {
                display: block;
                margin-top: 0.5em;
                margin-bottom: 0.5em;
                margin-left: auto;
                margin-right: auto;
                border-style: inset;
                border-width: 1px;
            } 
        </style>
        <table cellspacing='0' cellpadding='0' style='width:500px; font-size:12pt; font-family:calibri;  border-collapse: collapse;' border='0'>
            <tr align='center'>
                <td width='40%'>Produk</td>
                <td width='20%'>Harga</td>
                <td width='15%'>Jumlah</td>
                <td width='25%'>Subtotal</td>
            </tr>
            <tr>
                <td colspan='4'><hr></td>
            </tr>

            <?php 
                $no = 1;
                $data = mysqli_query($koneksi, "SELECT * FROM detailpenjualan dp
                    JOIN produk p ON dp.ProdukID = p.ProdukID");
                $total = 0; // Inisialisasi total
                while ($d = mysqli_fetch_array($data)) {
                    ?>
                    <tr>
                        <td><?php echo $d['NamaProduk']; ?></td>
                        <td>Rp. <?php echo number_format($d['Harga'], 0, ',', '.'); ?></td>
                        <td><?php echo $d['JumlahProduk']; ?></td>
                        <td>Rp. <?php 
                            $subtotal = $d['Harga'] * $d['JumlahProduk']; // Hitung subtotal
                            echo number_format($subtotal, 0, ',', '.');
                            $total += $subtotal; // Akumulasi total
                        ?></td>
                    </tr>
                    <?php 
                } 
            ?>

            <tr>
                <td colspan='4'><hr></td>
            </tr>
            <tr>
                <td colspan='3' align='right'>Total:</td>
                <td>Rp. <?php echo number_format($total, 0, ',', '.'); ?></td>
            </tr>
        </table>

        <table style='width:450px; font-size:12pt;' cellspacing='2'>
            <br><br>
            <tr>
                <td align='center'>****** TERIMAKASIH ******</br></td>
            </tr>
        </table>
    </center>

    <script>
        window.print();
    </script>
</body>
</html>
