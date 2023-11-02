<?php
session_start();

if ( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
    include "function.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Home</title>
</head>
<body>
    <div class="container">
        <nav>
            <a href="index.php" class="active">Home</a>
            <a href="admin/admin.php" >Admin</a>
            <a href="customers/customer.php">Customer</a>
            <a href="produk/produk.php">Produk</a>
            <a href="transaksi/data_transaksi.php">Data Transaksi</a>  
            <a href="laporan/laporan.php">Laporan</a> 
            <a class="logout" href="logout.php">Logout</a>
        </nav>
    </div>

    <div class="welcome">
        <h1>Welcome to Burger Stall</h1>
    </div>
    
</body>
</html>