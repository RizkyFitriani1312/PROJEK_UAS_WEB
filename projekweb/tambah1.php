<?php 

require 'config.php';

if(isset($_POST['submit'])){
    $nama_minum = $_POST['nama_minum'];
    $harga_minum = $_POST['harga_minum'];
    $info_minum = $_POST['info_minum'];

    $foto_minum = $_FILES['foto_minum']['name'];
    $x = explode('.', $foto_minum);
    $ekstensi = strtolower(end($x));

    $foto_minum_baru = "$foto_minum.$ekstensi";
    $tmp = $_FILES['foto_minum']['tmp_name'];

    if(move_uploaded_file($tmp, 'img/'.$foto_minum_baru)){
    $kirim1 = mysqli_query($db, "INSERT INTO minuman (nama_minum,harga_minum,info_minum,foto_minum) VALUES ('$nama_minum','$harga_minum','$info_minum','$foto_minum_baru')");
        if($kirim1){
            header("Location:index.php");
        }else {
            echo "gagal mengirim";
        }
    }
}
?>
