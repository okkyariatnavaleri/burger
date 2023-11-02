<?php 
include '../function.php';

$id_produk = $_GET["id_produk"];

$produk= query("SELECT * FROM produk WHERE id_produk = $id_produk")[0];

if (isset($_POST["submit"])){

    if(ubah_produk($_POST) > 0){
        echo "
            <script>
                alert('Data berhasil diubah');
                document.location.href='produk.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data gagal diubah');
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
    <title>Ubah Data Produk</title>
</head>
<body>
    
<h1 class="tambah">Ubah Data Produk</h1>

<div class="form-tambah">
    <form action="" method="post" enctype="multipart/form-data">
        <fieldset class="form">
            <legend>Isi Data</legend>
            <input type="hidden" name="id_produk" value="<?= $produk["id_produk"]; ?>">
            <input type="hidden" name="gambar_lama" value="<?= $produk["gambar_produk"]; ?>">
        <p>
            <label class="input-label" for="nama_produk" >Nama Produk</label>
            <input class="input" type="text" name="nama_produk" id="nama_produk" required value="<?= $produk["nama_produk"]; ?>">
        </p>
        <p>
            <label class="input-label" for="harga_produk" >Harga Produk</label>
            <input class="input" type="number" name="harga_produk" id="harga_produk" value="<?= $produk["harga_produk"]; ?>">
        </p>
        <p>
            <label class="input-label" for="jumlah_produk" >Jumlah Produk</label>
            <input class="input" type="number" name="jumlah_produk" id="jumlah_produk" value="<?= $produk["jumlah_produk"]; ?>">
        </p>
        <p>
            <label class="input-label" for="gambar_produk" >Gambar Produk</label>
            <img src="../assets/img/<?= $produk['gambar_produk']?>" width="80px" alt=""><br>
            <input class="input" type="file" name="gambar_produk" id="gambar_produk">
        </p>
        <p>
            <button type="submit" name="submit">Ubah Data</button>
        </p>
    
    </fieldset>
    </form>
    </div>

</body>
</html>