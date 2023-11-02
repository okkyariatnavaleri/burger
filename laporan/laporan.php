<?php
session_start();

if ( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

include "../function.php";

$transaksi = query("SELECT id_transaksi,produk.nama_produk, transaksi.jumlah_pesanan, produk.harga_produk, promo.nama_promo, promo.potongan, ((100 - promo.potongan)*(produk.harga_produk*jumlah_pesanan)/100) AS total,
                    tanggal_transaksi, jumlah_pesanan, (jumlah_pesanan*produk.harga_produk) AS tot 
                    FROM transaksi 
                    JOIN produk ON transaksi.id_produk = produk.id_produk
                    JOIN promo ON transaksi.id_promo = promo.id_promo
                    ORDER BY id_transaksi DESC
                    ");

$subTotalHarga = query("SELECT SUM(jumlah_pesanan *harga_produk) as total
                                            FROM transaksi
                                            JOIN produk ON transaksi.id_produk = produk.id_produk  
                                            ");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Admin</title>
</head>
<body>
      <div class="container">
        <nav>
            <a href="../index.php">Home</a>
            <a href="../admin/admin.php" >Admin</a>
            <a href="../customers/customer.php">Customer</a>
            <a href="../produk/produk.php">Produk</a>
            <a href="../transaksi/data_transaksi.php">Data Transaksi</a>  
            <a href="laporan.php"class="active">Laporan</a>  
            <a class="logout" href="../logout.php">Logout</a>
        </nav>
    </div>

<h1 style="text-align: center;">Data Laporan</h1>

    <div class="table">
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No. </th> <th>Nomor Transaksi</th> <th>Nama Produk</th> <th>Jumlah Pesanan</th> <th>Total Harga</th> 
            </tr>
            <?php $i = 1; ?>
            <?php foreach($transaksi as $row ):  ?>
                <?php extract($row); ?>
                
                <tr>
                <td><?= $i ?></td>
               
                <td style="text-align:center;"><?= $row["id_transaksi"] ?></td>
                <td style="text-align:center;"><?= $row["nama_produk"] ?></td>
                <td style="text-align:center;"><?= $row["jumlah_pesanan"] ?></td>
                <td style="text-align:center;"><?= rupiah($row["total"]) ?></td>

            </tr>
            <?php $i++ ?>
            <?php endforeach; ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Jumlah Pendapatan</td>
                <?php foreach ($subTotalHarga as $row):?>
                <td style="text-align : center;"><?= rupiah($row['total'])?></td>
                <?php endforeach?>
            </tr>
        </table>
    </div>

    
</body>
</html>