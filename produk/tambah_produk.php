<?php 
include '../function.php';


if (isset($_POST["submit"])){



    if(tambah_produk($_POST) > 0){
        echo "
            <script>
                alert('Data berhasil ditambah');
                document.location.href='produk.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data gagal ditambah');
                document.location.href='produk.php';
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
    <title>Tambah Data Produk</title>
</head>
<body>
    
<h1 class="tambah">Tambah Data Produk</h1>

<div class="form-tambah">
    <form action="" method="post" enctype="multipart/form-data">
        <fieldset class="form">
            <legend>Isi Data Produk</legend>
        <p>
            <label class="input-label" for="nama_produk" >Nama Produk</label>
            <input class="input" type="text" name="nama_produk" id="nama_produk" autofocus required>
        </p>
        <p>
            <label class="input-label" for="harga_produk" >Harga Produk</label>
            <input class="input" type="number" name="harga_produk" id="harga_produk" required>
        </p>
        <p>
            <label class="input-label" for="jumlah_produk" >Jumlah Produk</label>
            <input class="input" type="number" name="jumlah_produk" id="jumlah_produk" required>
        </p>
        <p>
            <label class="input-label" for="gambar_produk" >Gambar Produk</label>
            <input class="input" type="file" name="gambar_produk" id="gambar_produk" required>
        </p>
        <p>
            <button type="submit" name="submit">Simpan Data</button>
        </p>
    
    </fieldset>
    </form>
    </div>

</body>
</html>