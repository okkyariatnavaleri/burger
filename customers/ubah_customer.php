<?php 
include '../function.php';

$id_customer = $_GET["id_customer"];

$customer = query("SELECT * FROM customer WHERE id_customer = $id_customer")[0];

if (isset($_POST["submit"])){


    if(ubah_customer($_POST) > 0){
        echo "
            <script>
                alert('Data berhasil diubah');
                document.location.href='customer.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data gagal diubah');
                document.location.href='customer.php';
            </script>
        ";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Ubah Data Customer</title>
</head>
<body>
    
<h1 class="tambah">Ubah Data Customer</h1>

<div class="form-tambah">
    <form action="" method="post">
        <fieldset class="form">
            <legend>Isi Data</legend>
            <input type="hidden" name="id_customer" value="<?= $customer["id_customer"]; ?>">
        <p>
            <label class="input-label" for="nama_customer" >Nama Customer</label>
            <input class="input" type="text" name="nama_customer" id="nama_customer" required value="<?= $customer["nama_customer"]; ?>">
        </p>
        <p>
            <label class="input-label" for="tlp_customer" >Nomor Telpon Customer</label>
            <input class="input" type="text" name="tlp_customer" id="tlp_customer" value="<?= $customer["tlp_customer"]; ?>">
        </p>
        <p>
            <button type="submit" name="submit">Ubah Data</button>
        </p>
    
    </fieldset>
    </form>
    </div>

</body>
</html>