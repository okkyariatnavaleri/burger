<?php 
include '../function.php';


if (isset($_POST["submit"])){
// $nama_produk = htmlspecialchars($_POST["nama_produk"]);  
// $jumlah_pesanan = htmlspecialchars($_POST["jumlah_pesanan"]);
// $conn = mysqli_connect($host, $user, $pass, $db);
// $stokBarang = mysqli_query($conn,"SELECT * FROM produk WHERE id_produk = '$nama_produk'");
// $stk = mysqli_fetch_array($stokBarang);
// $stok = $stk['jumlah_produk'];
// $sisa = $stok - $jumlah_pesanan;
// var_dump($sisa);
    if(tambah_transaksi($_POST) > 0){
        echo "
            <script>
                alert('Data berhasil ditambah');
                document.location.href='data_transaksi.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data gagal ditambah');
                document.location.href='data_transaksi.php';
            </script>
        ";
    }
}



$customer =query("SELECT * FROM customer ");
$produk = query("SELECT * FROM produk ");
$admin = query("SELECT * FROM admin");
$promo = query('SELECT * FROM promo');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Tambah Data Transaksi</title>
</head>
<body>
    
<h1 class="tambah">Tambah Data Transaksi</h1>

<div class="form-tambah">
    <form action="" method="post">
        <fieldset class="form">
            <legend>Isi Data</legend>
            <p>
        <select style="width: 20%; text-align:center;" name="nama_admin" required>
            <option selected="selected" value="" >--- Pilih Admin---</option>
            <?php foreach($admin as $row): ?>
            <option value="<?= $row['id_admin'] ?>"><?=  $row['nama_admin']; ?></option>
            <?php  endforeach ?>
            </select >
        </p>
            <p>
        <select style="width: 20%; text-align:center;" name="nama_customer" required>
            <option selected="selected" value="" >--- Pilih Customer---</option>
            <?php foreach($customer as $row): ?>
            <option value="<?= $row['id_customer'] ?>"><?=  $row['nama_customer']; ?></option>
            <?php  endforeach ?>
            </select >
        </p>
        <p>
        <select style="width: 20%; text-align:center;" name="nama_produk" required>
            <option selected="selected" value="" >--- Pilih Produk---</option>
            <?php foreach($produk as $row): ?>
            <option value="<?= $row['id_produk']?>"><?=  $row['nama_produk']; ?></option>
            <?php endforeach; ?>
            </select >
        </p>
        <p>
        <select style="width: 20%; text-align:center;" name="nama_promo" required>
            <option selected="selected" value="" >--- Pilih Promo---</option>
            <?php foreach($promo as $row): ?>
            <option value="<?= $row['id_promo']?>"><?=  $row['nama_promo']; ?></option>
            <?php endforeach; ?>
            </select >
        </p>
        <p>
            <label class="input-label" for="jumlah_pesanan" >Jumlah Pesanan</label>
            <input class="input" type="number" name="jumlah_pesanan" id="jumlah_pesanan" required>
        </p>
        <p>
            <button type="submit" name="submit">Simpan Data</button>
        </p>
    
    </fieldset>
    </form>
    </div>

</body>
</html>