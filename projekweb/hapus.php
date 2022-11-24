<?php 

require 'config.php';

if(isset($_GET['id_k'])){
    $id_k = $_GET['id_k'];
    $hapus = mysqli_query($db, "DELETE FROM kue WHERE id_k='$id_k'");

    if($hapus){
        header("Location:index.php");
    }
}

?>