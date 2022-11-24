<?php
    session_start();
    if(!isset($_SESSION['login_admin'])){
        header("Location:login_admin.php");
        exit;
    }
?>

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
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="style1.css">
    </head>
    <body>

        <header>
            <h2>Kue dan Minuman Tradisional Samarinda</h2>
            <ul class="navigation">
                <li><a href="index.php">CRUD Produk</a></li>
                <li><a href="index2.php">CRUD Akun User</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </header>

        <p>
        Tanggal : <?= date("d-m-Y")?>
        </p><br>

        <div class="list-table1">
            <h3>Struk Pemesanan User</h3>
            <table>
                <tr class="thead">
                    <th>No</th>
                    <th width="1000px">Nama Lengkap User</th>
                    <th width="1000px">Nomor telepon</th>
                    <th width="1000px">Alamat</th>
                    <th width="1000px">Pilihan Kue</th>
                    <th width="1000px">Jumlah Kue</th>
                    <th width="1000px">Pilihan Minuman</th>
                    <th width="1000px">Jumlah Minuman</th>
                    <th width="1000px">Metode Transaksi</th>
                    <th width="1000px">Tanggal Beli</th>
                    <th width="1000px">Total harga</th>
                </tr>

                <?php 
                    $struk = 1;
                    while($row_struk = mysqli_fetch_array($result5)){

                ?>

                <tr>
                    <td><?=$struk;?></td>
                    <td nowrap><?=$row_struk['nama']?></td>
                    <td><?=$row_struk['telepon']?></td>
                    <td><?=$row_struk['alamat']?></td>
                    <td><?=$row_struk['nama_kue']?></td>
                    <td><?=$row_struk['jumlah_kue']?></td>
                    <td><?=$row_struk['nama_minum']?></td>
                    <td><?=$row_struk['jumlah_minum']?></td>
                    <td><?=$row_struk['metode_transaksi']?></td>
                    <td><?=$row_struk['tanggal_beli']?></td>
                    <td><?=$row_struk['total_harga']?></td>
                </tr>
                
                <?php
                    $struk++; 
                        }
                ?>

            </table>
        </div>
    </body>
</html>