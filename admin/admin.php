<?php 
session_start();

if ( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

include '../function.php';

$admin = query("SELECT * FROM admin");

if(isset ($_POST["cari"])){
    $admin = cari_admin($_POST["keyword"]);
}

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
            <a href="admin.php" class="active">Admin</a>
            <a href="../customers/customer.php">Customer</a>
            <a href="../produk/produk.php">Produk</a>
            <a href="../transaksi/data_transaksi.php">Data Transaksi</a>  
            <a href="../laporan/laporan.php">Laporan</a>
            <a class="logout" href="../logout.php">Logout</a>  
        </nav>
    </div>

<h1 style="text-align: center;">Data Admin</h1>

    <div class="table">
    <a class="tambah"href="tambah_admin.php">Tambah Data Admin</a>
    <form class="cari"action="" method="post" >
        <input type="text" name="keyword" autofocus placeholder="masukkan keyword.." autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No. </th> <th>Aksi</th> <th>No Karyawan</th>  <th>Nama</th> <th>Jadwal Shift</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach($admin as $row): ?>
            <tr>
                <td><?= $i ?></td>
                <td>
                    <a href="ubah_admin.php?id_admin=<?=$row["id_admin"];?>">Edit</a>
                    <a class="hapus" href="hapus_admin.php?id_admin=<?= $row["id_admin"];?>" onclick="return confirm('yakin?');">Hapus</a>
                </td>
                <td><?= $row["np"] ?></td>
                <td><?= $row["nama_admin"] ?></td>
                <td><?= $row["shift_admin"] ?></td>
            </tr>
            <?php $i++ ?>
            <?php endforeach; ?>
        </table>
    </div>

    
</body>
</html>