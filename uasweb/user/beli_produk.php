<?php
session_start();
$id_produk = $_GET['id_produk'] ;

if(isset($_SESSION['keranjang'] [$id_produk] )){
    $_SESSION['keranjang'] [$id_produk]+=1;
}else{
    $_SESSION['keranjang'] [$id_produk] = 1;
}

echo "<script> alert('Produk telah masuk keranjang!'); </script>";
echo "<script> location='index.php'; </script>";
?>