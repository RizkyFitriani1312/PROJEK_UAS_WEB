<?php 

require 'config.php';

if(isset($_GET['id_m'])){
    $id_m = $_GET['id_m'];
    $hapus1 = mysqli_query($db, "DELETE FROM minuman WHERE id_m='$id_m'");

    if($hapus1){
        header("Location:index.php");
    }
}

?>