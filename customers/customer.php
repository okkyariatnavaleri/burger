<?php 
session_start();

if ( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

include '../function.php';

$customer = query("SELECT * FROM customer");

if(isset ($_POST["cari"])){
    $customer = cari_customer($_POST["keyword"]);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Customer</title>
</head>
<body>
      <div class="container">
        <nav>
            <a href="../index.php">Home</a>
            <a href="../admin/admin.php" >Admin</a>
            <a href="customer.php"class="active">Customer</a>
            <a href="../produk/produk.php">Produk</a>
            <a href="../transaksi/data_transaksi.php">Data Transaksi</a>  
            <a href="../laporan/laporan.php">Laporan</a>   
            <a class="logout" href="../logout.php">Logout</a>
        </nav>
    </div>

<h1 style="text-align: center;">Data Customer</h1>

    <div class="table">
    <a class="tambah"href="tambah_customer.php">Tambah Data Customer</a>
    <form class="cari"action="" method="post" >
        <input type="text" name="keyword" autofocus placeholder="masukkan keyword.." autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No. </th> <th>Aksi</th> <th>Nama</th> <th>No Telpon</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach($customer as $row): ?>
            <tr>
                <td><?= $i ?></td>
                <td>
                    <a href="ubah_customer.php?id_customer=<?=$row["id_customer"];?>">Edit</a>
                    <a class= "hapus" href="hapus_customer.php?id_customer=<?= $row["id_customer"];?>" onclick="return confirm('yakin?');">Hapus</a>
                </td>
                <td><?= $row["nama_customer"] ?></td>
                <td><?= $row["tlp_customer"] ?></td>
            </tr>
            <?php $i++ ?>
            <?php endforeach; ?>
        </table>
    </div>

    
</body>
</html>