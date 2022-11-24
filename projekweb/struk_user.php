<?php 
    require 'config.php';
    $result5 = mysqli_query($db, "SELECT * FROM transaksi");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAMARINDA DESSERT</title>

    <style>
        body {
            background-color : #562B08
        }
        .box{
            height: 500px;
            width: 500px;
            background-color: #C16F36;
            margin: 0 auto;
            margin-top : 105px;
            border-radius : 20px;
        }

        .centang {
            padding-top: 25px;
            padding-left: 200px;
        }

        h3 {
            padding-left : 70px;
            font-family : Tahoma;
        }

        h4 {
            padding-left : 70px;
            font-family : Tahoma;

        }

        h5 {
            padding-left : auto;
            font-family : Tahoma;
            text-align : center;
        }

        .kembali {
            text-align : center;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #562B08;
            color: white;
            margin-left : 140px;
            font-family: Tahoma;
        } 
    </style>

</head>
<body>
    <?php 
        while($row_struk = mysqli_fetch_array($result5)){
    ?>
    <div class="box">
        <img src="img/centang.png" alt="centang" widht="100px" height="100px" class="centang">
        <h3>SELAMAT TRANSAKSI ANDA BERHASIL</h3>
        <h4>Jumlah Pembayaran Anda Sebesar : Rp <?=$row_struk['total_harga']?></h4>
        <h5>Pesanan Akan Segera Diproses dan Dikirimkan Ke Alamat Tujuan</h5>
        <h5>Terima Kasih Telah Berbelanja di Toko Kue "REKRIFIT"</h5> <br> <br>
        
        <a href="katalog.php" class="kembali">Kembali Ke Halaman Utama</a>

    </div>
    <?php
        }
    ?>
</body>
</html>