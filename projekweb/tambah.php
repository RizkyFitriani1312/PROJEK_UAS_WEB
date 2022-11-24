<?php 

require 'config.php';

if(isset($_POST['submit'])){
    $nama_kue = $_POST['nama_kue'];
    $harga_kue = $_POST['harga_kue'];
    $info_kue = $_POST['info_kue'];
    
    $foto_kue = $_FILES['foto_kue']['name'];
    $x = explode('.', $foto_kue);
    $ekstensi = strtolower(end($x));

    $foto_kue_baru = "$foto_kue.$ekstensi";
    $tmp = $_FILES['foto_kue']['tmp_name'];

    if (move_uploaded_file($tmp, 'img/'.$foto_kue_baru)){
    $kirim = mysqli_query($db, "INSERT INTO kue (nama_kue,harga_kue,info_kue,foto_kue) VALUES ('$nama_kue','$harga_kue','$info_kue','$foto_kue_baru')");
        if($kirim){
            header("Location:index.php");
        }else {
            echo "gagal mengirim";
        }
    }
}
?>
