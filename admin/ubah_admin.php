<?php 
include '../function.php';

$id_admin = $_GET["id_admin"];

$admin = query("SELECT * FROM admin WHERE id_admin = $id_admin")[0];

if (isset($_POST["submit"])){


    if(ubah_admin($_POST) > 0){
        echo "
            <script>
                alert('Data berhasil diubah');
                document.location.href='admin.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data gagal diubah');
                document.location.href='admin.php';
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
    <title>Ubah Data Admin</title>
</head>
<body>
    
<h1 class="tambah">Ubah Data Admin</h1>

<div class="form-tambah">
    <form action="" method="post">
        <fieldset class="form">
            <legend>Isi Data</legend>
            <input type="hidden" name="id_admin" value="<?= $admin["id_admin"]; ?>">
        <p>
            <label class="input-label" for="np" >NP Admin</label>
            <input class= "input" type="text" name="np" id="np" autofocus required value="<?= $admin["np"]; ?>">
        </p>
        <p>
            <label class="input-label" for="nama_admin" >Nama Admin</label>
            <input class="input" type="text" name="nama_admin" id="nama_admin" required value="<?= $admin["nama_admin"]; ?>">
        </p>
        <p>
            <label class="input-label" for="shift_admin" >Shift Admin</label>
            <input class="input" type="text" name="shift_admin" id="shift_admin" value="<?= $admin["shift_admin"]; ?>">
        </p>
        <p>
            <button type="submit" name="submit">Ubah Data</button>
        </p>
    
    </fieldset>
    </form>
    </div>

</body>
</html>