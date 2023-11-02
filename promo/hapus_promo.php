<?php 
session_start();

if ( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
include "../function.php";

$id_promo = $_GET["id_promo"];

if(hapus_promo($id_promo) > 0){

    echo "
    <script>
        alert('Data berhasil di hapus');
        document.location.href='../produk/produk.php';
    </script>";
}else{
    echo "
    <script>
        alert('Data berhasil di hapus');
        document.location.href='../produk/produk.php';
    </script>";
}

?>