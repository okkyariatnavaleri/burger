<?php 
include "../function.php";

$id_admin = $_GET["id_admin"];

if(hapus_admin($id_admin) > 0){

    echo "
    <script>
        alert('Data berhasil di hapus');
        document.location.href='admin.php';
    </script>";
}else{
    echo "
    <script>
        alert('Data berhasil di hapus');
        document.location.href='admin.php';
    </script>";
}

?>