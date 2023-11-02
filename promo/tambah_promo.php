<?php 
include '../function.php';
if (isset($_POST["submit"])){

    if(tambah_promo($_POST) > 0){
        echo "
            <script>
                alert('Data berhasil ditambah');
                document.location.href='../produk/produk.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data gagal ditambah');
                document.location.href='../produk/produk.php';
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
    <title>Document</title>
</head>
<body>

<h1 class="tambah">Tambah Data Promo</h1>

<div class="form-tambah">
    <form action="" method="post">
        <fieldset class="form">
            <legend>Isi Data</legend>
        <p>
            <label class="input-label" for="nama_promo" >Nama Promo</label>
            <input class="input" type="text" name="nama_promo" id="nama_promo" autofocus required>
        </p>
        <p>
            <label class="input-label" for="potongan" >Potongan</label>
            <input class="input" type="text" name="potongan" id="potongan" required>
            <span class="input-group-text" >%</span>
        </p>
        <p>
            <button type="submit" name="submit">Simpan Data</button>
        </p>
</body>
</html>