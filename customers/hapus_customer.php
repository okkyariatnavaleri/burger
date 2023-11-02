<?php 
include "../function.php";

$id_customer = $_GET["id_customer"];

if(hapus_customer($id_customer) > 0){

    echo "
    <script>
        alert('Data berhasil di hapus');
        document.location.href='customer.php';
    </script>";
}else{
    echo "
    <script>
        alert('Data berhasil di hapus');
        document.location.href='customer.php';
    </script>";
}

?>