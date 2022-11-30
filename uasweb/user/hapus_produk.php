<?php
session_start();
$id = $_GET['id_produk'];
unset($_SESSION['keranjang'] [$id]);

echo "<script> alert('berhasil di hapus');</script>";
echo "<script> location='keranjang.php'; </script>";

?>