<?php 

require 'config.php';

if(isset($_GET['id_r'])){
    $id_r = $_GET['id_r'];
    $hapus2 = mysqli_query($db, "DELETE FROM regis WHERE id_r='$id_r'");

    if($hapus2){
        header("Location:index2.php");
    }
}

?>