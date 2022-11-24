<?php 
    require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Transaksi</title>
</head>
<body>
    <div class="container regis">

        <div class="judul">
            <h2>Pemesanan Produk</h2>
        </div>
        
        <div class="form">
            <form action="" method="post">

                <label for="username">Nama Lengkap</label><br>
                <input type="text" name="nama" class="input" placeholder="Masukkan Nama Lengkap Anda"><br>

                <label for="telepon">Nomor Telepon</label><br>
                <input type="number" name="telepon" class="input" placeholder="Masukkan Nomor Telepon Anda"><br>

                <label for="pemesanan">Alamat</label><br>
                <input type="text" name="alamat" class="input" placeholder="Masukkan Alamat Anda"> <br>

                <label for="pemesanan">Pilih Produk Kue Tradisional</label><br>
                <?php 
                    $select = mysqli_query($db, "SELECT * FROM kue");
                    while($row = mysqli_fetch_array($select)){
                ?>
                <tr>
                    <td ><input type="radio" name="nama_kue" value="<?=$row['nama_kue'] ?>"><?=$row['nama_kue'] ?><br></td>
                    <td><img src="img/<?=$row['foto_kue']?>" alt="" width="100px"></td><br>
                </tr>
                <?php
                    }
                ?>
                <label for="pemesanan">Jumlah Kue</label><br>
                <input type="number" name="jumlah_kue" class="input" placeholder="Masukkan Jumlah Kue Anda">

                <label for="pemesanan">Pilih Produk Minuman Tradisional</label><br>
                <?php 
                    $select1 = mysqli_query($db, "SELECT * FROM minuman");
                    while($row1 = mysqli_fetch_array($select1)){
                ?>
                <tr>
                    <td ><input type="radio" name="nama_minum" value="<?=$row1['nama_minum'] ?>"><?=$row1['nama_minum'] ?></td><br>
                    <td><img src="img/<?=$row1['foto_minum']?>" alt="" width="100px"></td><br>
                </tr>                   
                <?php
                    }
                ?>
                <label for="pemesanan">Jumlah minuman</label><br>
                <input type="number" name="jumlah_minum" class="input" placeholder="Masukkan Jumlah Minuman Anda">

                <label for="pemesanan">Metode Pembayaran</label><br>
                <input type="radio" name="metode_transaksi" value="Transfer Bank">Transfer Bank<br/>
                <input type="radio" name="metode_transaksi" value="Gopay">Gopay<br/>
                <input type="radio" name="metode_transaksi" value="OVO">OVO<br/>
                <input type="radio" name="metode_transaksi" value="Dana">Dana<br/>
                <input type="radio" name="metode_transaksi" value="Shopeepay">Shopeepay<br/>
                <input type="radio" name="metode_transaksi" value="COD">COD<br/>

                <label for="pemesanan">Tanggal Beli: </label>
                <input type="date" name="tanggal_beli" id=""> <br> <br>
                <input type="submit" name="transaksi" class="submit" value="Pesan Sekarang"><br><br>
            </form>

            <?php
                if(isset($_POST['transaksi'])){
                    $nama = $_POST['nama'];
                    $telepon = $_POST['telepon'];
                    $alamat = $_POST['alamat'];

                    $nama_kue = $_POST['nama_kue'];
                    $jumlah_kue = $_POST['jumlah_kue']; 

                    $nama_minum = $_POST['nama_minum'];
                    $jumlah_minum = $_POST['jumlah_minum'];

                    $metode_transaksi = $_POST['metode_transaksi'];
                    $tanggal_beli = $_POST['tanggal_beli'];
                    
                    $hasil_kue = mysqli_query($db, "SELECT * FROM kue WHERE nama_kue = '$nama_kue'");
                    $data_kue = mysqli_fetch_array($hasil_kue);
                    $harga_kue = $data_kue['harga_kue'] * $jumlah_kue;

                    $hasil_minum = mysqli_query($db, "SELECT * FROM minuman WHERE nama_minum = '$nama_minum'");
                    $data_minum = mysqli_fetch_array($hasil_minum);
                    $harga_minum = $data_minum['harga_minum'] * $jumlah_minum;

                    $total_harga = $harga_minum + $harga_kue;

                    $pemesanan = mysqli_query($db, "INSERT INTO transaksi (nama,telepon,alamat,nama_kue,jumlah_kue,harga_kue,nama_minum,jumlah_minum,harga_minum,metode_transaksi,tanggal_beli,total_harga) 
                                                    VALUES ('$nama','$telepon','$alamat','$nama_kue','$jumlah_kue','$harga_kue','$nama_minum','$jumlah_minum','$harga_minum','$metode_transaksi','$tanggal_beli','$total_harga')");
                    $result5 = $db->query($pemesanan);
                    if($pemesanan){
                        // header("Location:katalog.php");
                        echo "
                        <script>
                            document.location.href = 'struk_user.php';
                        </script>
                        ";
                    }else {
                        echo "gagal mengirim";
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>
