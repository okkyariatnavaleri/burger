<?php

//connect ke database
$host = "localhost";
$user = "root";
$pass = "";
$db = "burger_stall";

$conn = mysqli_connect($host, $user, $pass, $db);


//query data 
function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows  = [];
	
	while ($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}

//=========================== AWAL FUNCTION DARI ADMIN ===========================

//tambah data admin
function tambah_admin($data){
    global $conn;
    $np = htmlspecialchars($data["np"]);
    $nama_admin = htmlspecialchars($data["nama_admin"]);
    $shift_admin = htmlspecialchars($data ["shift_admin"]);


    $query = "INSERT INTO admin VALUES
            (
                '','$np', '$nama_admin', '$shift_admin'
            )";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//hapus data admin
function hapus_admin($id_admin){
    global $conn;

    mysqli_query($conn, "DELETE FROM admin WHERE id_admin = $id_admin");

    return mysqli_affected_rows($conn);
}

//ubah data admin
function ubah_admin($data){
    global $conn;
    $id_admin = $data["id_admin"];
    $np = htmlspecialchars($data["np"]);
    $nama_admin = htmlspecialchars($data["nama_admin"]);
    $shift_admin = htmlspecialchars($data ["shift_admin"]);


    $query = "UPDATE admin SET
                np = '$np',
                nama_admin = '$nama_admin',
                shift_admin = '$shift_admin'
                WHERE id_admin = '$id_admin'
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// cari admin
function cari_admin($keyword){
    $query = "SELECT * FROM admin WHERE
        np LIKE '%$keyword%' OR
        nama_admin LIKE '%$keyword%' OR
        shift_admin LIKE '%$keyword%'
    ";
    return query($query); 
} 
//=========================== AKHIR FUNCTION DARI ADMIN ===========================

//=========================== AWAL FUNCTION DARI CUSTOMER ===========================
// tambah customer
function tambah_customer($data){
    global $conn;
    $nama_customer = htmlspecialchars($data["nama_customer"]);
    $tlp_customer = htmlspecialchars($data ["tlp_customer"]);


    $query = "INSERT INTO customer VALUES
            (
                '','$nama_customer', '$tlp_customer'
            )";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// hapus customer
function hapus_customer($id_customer){
    global $conn;

    mysqli_query($conn, "DELETE FROM customer WHERE id_customer = $id_customer");

    return mysqli_affected_rows($conn);
}

// ubah data customer
function ubah_customer($data){
    global $conn;
    $id_customer = $data["id_customer"];
    $nama_customer = htmlspecialchars($data["nama_customer"]);
    $tlp_customer = htmlspecialchars($data ["tlp_customer"]);


    $query = "UPDATE customer SET
                nama_customer = '$nama_customer',
                tlp_customer = '$tlp_customer'
                WHERE id_customer = '$id_customer'
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// cari customer
function cari_customer($keyword){
    $query = "SELECT * FROM customer WHERE
        nama_customer LIKE '%$keyword%' OR
        tlp_customer LIKE '%$keyword%' 
    ";
    return query($query); 
} 

//=========================== AKHIR FUNCTION DARI CUSTOMER ===========================
//=========================== AWAL FUNCTION DARI PRODUK ===========================

// tambah produk
function tambah_produk($data){
    global $conn;
    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $harga_produk= htmlspecialchars($data ["harga_produk"]);
    $jumlah_produk = htmlspecialchars($data["jumlah_produk"]);

    $gambar_produk = upload();
    if(!$gambar_produk){
        return false;
    } 

    $query = "INSERT INTO produk VALUES
            (
                '','$nama_produk', '$harga_produk', '$gambar_produk','$jumlah_produk'
            )";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// upload foto
function upload(){

    $nama_file = $_FILES['gambar_produk']['name'];
    $ukuran_file = $_FILES['gambar_produk']['size'];
    $error = $_FILES['gambar_produk']['error'];
    $tmp = $_FILES ['gambar_produk']['tmp_name'];  

    // cek gambar di upload apa tidak
    if($error === 4 ){
        echo "<script>
            alert('Pilih gambar dulu dong..')
        </script>";
        return false;
    }
    
    // cek jenis gambar yang di upload
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $nama_file);
    $ekstensiGambar = strtolower(end($ekstensiGambarValid));
    if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "<script>
                alert('Ekstensi gambar tidak sesuai..')
            </script>";
    return false;
    }

    // cek ukuran terlalu besar
    if($ukuran_file > 6000000){
        echo "<script>
                alert('Ukuran gambar terlalu besar..')
            </script>";
    return false;
    }

    //jika lolos upload
    // generate nama random untuk file foto agar tidak bentrok ada yang sama
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmp,'../assets/img/'. $namaFileBaru);
    
    return $namaFileBaru;
}

// hapus produk
function hapus_produk($id_produk){
    global $conn;

    mysqli_query($conn, "DELETE FROM produk WHERE id_produk = $id_produk");

    return mysqli_affected_rows($conn);
}

// ubah data produk
function ubah_produk($data){
    global $conn;
    $id_produk= $data["id_produk"];
    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $harga_produk = htmlspecialchars($data ["harga_produk"]);
    $gambar_lama = htmlspecialchars($data["gambar_lama"]);
    $jumlah_produk = htmlspecialchars($data["jumlah_produk"]);

    // cek gambar diubah apa tidak
    if($_FILES["gambar_produk"]["error"] === 4){
        $gambar_produk = $gambar_lama;
    }else{
        $gambar_produk = upload();
    }

    $query = "UPDATE produk SET
                nama_produk= '$nama_produk',
                harga_produk = '$harga_produk',
                gambar_produk = '$gambar_produk',
                jumlah_produk = '$jumlah_produk'
                WHERE id_produk = '$id_produk'
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// cari customer
function cari_produk($keyword){
    $query = "SELECT * FROM produk WHERE
        nama_produk LIKE '%$keyword%' OR
        harga_produk LIKE '%$keyword%' 
    ";
    return query($query); 
} 

    function registrasi($data) {
        global $conn;

        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);

        //cek usernamet sudah ada atau belum
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
        if (mysqli_fetch_assoc($result)){

            echo "<script>
            alert('username yang dipilih sudah terdaftar!')
            </script>";
        return false;
        }

        //cek konfirmasi password

        if ($password !== $password2) {
            echo "<script>
                alert('konfirmasi password tidak sesuai!');
            </scrip>";
            return false;
        }

        //enkripsi password 
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        //tambahka user baru ke database
        mysqli_query($conn,"INSERT INTO user VALUES('','$username', '$password')");

        return mysqli_affected_rows($conn);
    }

    //=========================== AWAL FUNCTION DATA TRANSAKSI ===========================

    // tambah transaksi
    function tambah_transaksi($data){
        global $conn;

        
        $nama_admin = htmlspecialchars($data["nama_admin"]);
        $nama_produk = htmlspecialchars($data["nama_produk"]);
        $nama_customer = htmlspecialchars($data["nama_customer"]);
        $jumlah_pesanan = htmlspecialchars($data["jumlah_pesanan"]);
        $nama_promo = htmlspecialchars($data["nama_promo"]);
        
        $stokBarang = mysqli_query($conn,"SELECT * FROM produk WHERE id_produk = '$nama_produk'");
        $stk = mysqli_fetch_array($stokBarang);
        $stok = $stk['jumlah_produk'];
        $sisa = $stok - $jumlah_pesanan;
        if ($stok < $jumlah_pesanan) {

            echo"<script>
            alert('Maaf, stok tidak cukup');
            document.location.href='data_transaksi.php';
            </script>";

        }
        else{
        $insert = "INSERT INTO `transaksi` (`id_transaksi`, `id_admin`, `id_customer`, `id_produk`, `id_promo`, `jumlah_pesanan`, `tanggal_transaksi`) VALUES  
        (NULL,'$nama_admin', '$nama_customer', '$nama_produk', '$nama_promo', '$jumlah_pesanan', current_timestamp());";
        mysqli_query($conn, $insert);
        if($insert){
            $upstok = mysqli_query($conn,"UPDATE produk SET jumlah_produk='$sisa' WHERE id_produk='$nama_produk'");
        }
        
        }
        return mysqli_affected_rows($conn);
    }
    



    //hapus data transaksi
function hapus_transaksi($id_transaksi){
    global $conn;

    mysqli_query($conn, "DELETE FROM transaksi WHERE id_transaksi = $id_transaksi");

    return mysqli_affected_rows($conn);
}

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}

    //=========================== AKHIR FUNCTION DATA TRANSAKSI ===========================


    //=========================== AWAL FUNCTION DATA PROMO ===========================
    //tambah data promo
function tambah_promo($data){
    global $conn;
    $nama_promo = htmlspecialchars($data ["nama_promo"]);
    $potongan = htmlspecialchars($data["potongan"]);

    $query = "INSERT INTO promo VALUES
            (
                '','$nama_promo', '$potongan'
            )";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


//ubah data promo
function ubah_promo($data){
    global $conn;
    $id_promo = $data['id_promo'];
    $nama_promo = htmlspecialchars($data ["nama_promo"]);
    $potongan = htmlspecialchars($data["potongan"]);
    
    
    $query = "UPDATE promo SET
                nama_promo = '$nama_promo', 
                potongan = '$potongan'
                WHERE id_promo = '$id_promo'
            ";

    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}


//hapus data promo
function hapus_promo($id_promo){
    global $conn;

    mysqli_query($conn, "DELETE FROM promo WHERE id_promo = $id_promo");

    return mysqli_affected_rows($conn);
}

//=========================== AKHIR FUNCTION DATA PROMO ===========================
?>

