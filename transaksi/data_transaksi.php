<?php 
session_start();

if ( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
include "../function.php";

$transaksi = query("SELECT id_transaksi, admin.nama_admin,nama_produk, customer.nama_customer, produk.harga_produk, promo.nama_promo, promo.potongan, ((100 - promo.potongan)*(produk.harga_produk*jumlah_pesanan)/100) AS total,
                    tanggal_transaksi, jumlah_pesanan, (jumlah_pesanan*produk.harga_produk) AS tot 
                    FROM transaksi 
                    JOIN admin ON transaksi.id_admin = admin.id_admin
                    JOIN customer ON transaksi.id_customer = customer.id_customer
                    JOIN produk ON transaksi.id_produk = produk.id_produk
                    JOIN promo ON transaksi.id_promo = promo.id_promo
                    ORDER BY id_transaksi DESC
                    ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Data Transaksi</title>
</head>
<body>
      <div class="container">
        <nav>
            <a href="../index.php">Home</a>
            <a href="../admin/admin.php" >Admin</a>
            <a href="../customers/customer.php">Customer</a>
            <a href="../produk/produk.php">Produk</a>
            <a href="data_transaksi.php" class="active">Data Transaksi</a>  
            <a href="../laporan/laporan.php">Laporan</a>   
            <a class="logout" href="../logout.php">Logout</a> 
        </nav>
    </div>

<h1 style="text-align: center;">Data Transaksi</h1>


    <div class="table">
    <a class="tambah"href="tambah_transaksi.php">Tambah Data Transaksi</a>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No. </th> <th>Aksi</th> <th>No Transaksi</th> <th>Nama Admin</th> <th>Nama Customer</th> <th>Tanggal Transaksi</th> <th>Nama Produk</th><th>Harga Satuan</th> <th>Jumlah Pesanan</th> <th>Total Harga</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach($transaksi as $row ):  ?>
                <?php extract($row); ?>
            <tr>
                <td><?= $i ?></td>
                <td>
                    <a class= "hapus" href="hapus_transaksi.php?id_transaksi=<?= $row["id_transaksi"];?>" onclick="return confirm('yakin?');">Hapus</a>
                </td>
                <td style="text-align:center;"><?= $row["id_transaksi"] ?></td>
                <td style="text-align:center;"><?= $row["nama_admin"] ?></td>
                <td style="text-align:center;"><?= $row["nama_customer"] ?></td>
                <td style="text-align:center;"><?= $row["tanggal_transaksi"] ?></td>
                <td style="text-align:center;"><?= $row["nama_produk"] ?></td>
                <td style="text-align:center;"><?=rupiah( $row["harga_produk"]) ?></td>
                <td style="text-align:center;"><?= $row["jumlah_pesanan"] ?></td>
                <td style="text-align:center;"><?=rupiah( $row["total"]) ?></td>

            </tr>
            <?php $i++ ?>
            <?php endforeach; ?>
        </table>
    </div>

    
</body>
</html>