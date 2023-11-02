<?php 
include '../function.php';


if (isset($_POST["submit"])){

    if(tambah_customer($_POST) > 0){
        echo "
            <script>
                alert('Data berhasil ditambah');
                document.location.href='customer.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data gagal ditambah');
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
    <title>Tambah Data Customer</title>
</head>
<body>
    
<h1 class="tambah">Tambah Data Customer</h1>

<div class="form-tambah">
    <form action="" method="post">
        <fieldset class="form">
            <legend>Isi Data</legend>
        <p>
            <label class="input-label" for="nama_customer" >Nama Customer</label>
            <input class="input" type="text" name="nama_customer" id="nama_customer" autofocus required>
        </p>
        <p>
            <label class="input-label" for="tlp_customer" >Nomor Telpon Customer</label>
            <input class="input" type="text" name="tlp_customer" id="tlp_customer" required>
        </p>
        <p>
            <button type="submit" name="submit">Simpan Data</button>
        </p>
    
    </fieldset>
    </form>
    </div>

</body>
</html>