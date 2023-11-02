<?php 
session_start();

if ( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
include "../function.php";

$id_transaksi = $_GET["id_transaksi"];

if(hapus_transaksi($id_transaksi) > 0){

    echo "
    <script>
        alert('Data berhasil di hapus');
        document.location.href='data_transaksi.php';
    </script>";
}else{
    echo "
    <script>
        alert('Data berhasil di hapus');
        document.location.href='data_transaksi.php';
    </script>";
}

?>