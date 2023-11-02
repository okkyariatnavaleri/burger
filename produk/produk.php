<?php 
include "../function.php";
$produk = query("SELECT * FROM produk");

if(isset ($_POST["cari"])){
    $produk = cari_produk($_POST["keyword"]);
}

$promo =query('SELECT * FROM promo');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Produk</title>
</head>
<body>
      <div class="container">
        <nav>
            <a href="../index.php">Home</a>
            <a href="../admin/admin.php" >Admin</a>
            <a href="../customers/customer.php">Customer</a>
            <a href="produk.php" class="active">Produk</a>
            <a href="../transaksi/data_transaksi.php">Data Transaksi</a>  
            <a href="../laporan/laporan.php">Laporan</a> 
            <a  class="logout" href="../logout.php">Logout</a> 
        </nav>
    </div>

<h1 style="text-align: center;">Data Produk</h1>

    <div class="table">
    <a class="tambah"href="tambah_produk.php">Tambah Data Produk</a>
    <form class="cari"action="" method="post" >
        <input type="text" name="keyword" autofocus placeholder="masukkan keyword.." autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No. </th> <th>Aksi</th> <th>Gambar Produk</th> <th>Nama Produk</th><th>Stok</th> <th>Harga Produk</th> 
            </tr>
            <?php $i = 1; ?>
            <?php foreach($produk as $row): ?>
            <tr>
                <td><?= $i ?></td>
                <td>
                    <a href="ubah_produk.php?id_produk=<?=$row["id_produk"];?>">Edit</a>
                    <a class="hapus" href="hapus_produk.php?id_produk=<?= $row["id_produk"];?>" onclick="return confirm('yakin?');">Hapus</a>
                </td>
                <td style="text-align:center;"><img src="../assets/img/<?= $row["gambar_produk"];?>" width="200px" alt=""></td>
                <td style="text-align:center;"><?= $row["nama_produk"] ?></td>
                <td style="text-align:center;"><?= $row["jumlah_produk"] ?></td>
                <td style="text-align:center;"><?= rupiah($row["harga_produk"]) ?></td>
            </tr>
            <?php $i++ ?>
            <?php endforeach; ?>
        </table>
    </div>
<br><br><br><br><br>
    <div class="table">
    <a class="tambah"href="../promo/tambah_promo.php">Tambah Promo</a>
    <form class="cari"action="" method="post" >
        <input type="text" name="keyword" autofocus placeholder="masukkan keyword.." autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>
        
    
    <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No. </th> <th>Aksi</th> <th>Nama Promo</th> <th>Potongan</th> 
            </tr>
            <?php $i = 1; ?>
            <?php foreach($promo as $row): ?>
            <tr>
                <td><?= $i ?></td>
                <td>
                    <a href="../promo/ubah_promo.php?id_promo=<?=$row["id_promo"];?>">Edit</a>
                    <a class="hapus" href="../promo/hapus_promo.php?id_promo=<?= $row["id_promo"];?>" onclick="return confirm('yakin?');">Hapus</a>
                </td>
                <td><?= $row['nama_promo']?></td>
                <td><?= $row['potongan']?>%</td>
                
                
            </tr>
            <?php $i++ ?>
            <?php endforeach; ?>
        </table>
    </div>

    
</body>
</html>