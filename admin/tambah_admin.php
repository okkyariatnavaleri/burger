<?php 
include '../function.php';


if (isset($_POST["submit"])){


    if(tambah_admin($_POST) > 0){
        echo "
            <script>
                alert('Data berhasil ditambah');
                document.location.href='admin.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data gagal ditambah');
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
    <title>Tambah Data Admin</title>
</head>
<body>
    
<h1 class="tambah">Tambah Data Admin</h1>

<div class="form-tambah">
    <form action="" method="post">
        <fieldset class="form">
            <legend>Isi Data</legend>
        <p>
            <label class="input-label" for="np" >NP Admin</label>
            <input class= "input" type="text" name="np" id="np" autofocus required>
        </p>
        <p>
            <label class="input-label" for="nama_admin" >Nama Admin</label>
            <input class="input" type="text" name="nama_admin" id="nama_admin" required>
        </p>
        <p>
            <!-- <label class="input-label" for="shift_admin" >Shift Admin</label>
            <input class="input" type="text" name="shift_admin" id="shift_admin"> -->
            <select style="width: 20%; text-align:center;" name="shift_admin" required>
            <option value="" >--- Pilih Shift ---</option>
            <option value="Pagi">Pagi</option>
            <option value="Siang">Siang</option>
            <option value="Malam">Malam</option>
            </select >
        </p>
        <p>
            <button type="submit" name="submit">Simpan Data</button>
        </p>
    
    </fieldset>
    </form>
    </div>

</body>
</html>