<?php 
    require 'config.php';

    if(isset($_GET['id_r'])){
        $id_r = $_GET['id_r'];
        $result3 = mysqli_query($db, "SELECT * FROM regis WHERE id_r = '$id_r' ");
        $row2 = mysqli_fetch_array($result3);
    }

    if(isset($_POST['regis'])){
        $email_r = $_POST['email_r'];
        $username_r = $_POST['username_r'];
        $psw_r = $_POST['psw_r'];
        $konfirmasi_r = $_POST['konfirmasi_r'];

        $update2 = mysqli_query($db, "UPDATE regis SET email_r='$email_r', username_r='$username_r', psw_r='$psw_r', konfirmasi_r='$konfirmasi_r' WHERE id_r='$id_r'");
        $result3 = $db->query($update2);
        if($update2){
            header("Location:index2.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAMARINDA DESSERT</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h2>Kue dan Minuman Tradisional Samarinda</h2>
    </header>
    
    <div class="form-class">
        <h3>Edit Data Akun User</h3>
        <form action="" method="post">
            
            <label for="">Email</label>
            <input type="email" name="email_r" class="input" placeholder="Masukkan email" value=<?=$row2['email_r'];?>><br>
            
            <label for="">Username</label>
            <input type="text" name="username_r" class="input" placeholder="Masukkan username" value=<?=$row2['username_r'];?>><br>
            
            <label for="">Password</label>
            <input type="password" name="psw_r" class="input" placeholder="Password" value=<?=$row2['psw_r'];?>><br>
            
            <label for="">Konfirmasi Password</label>
            <input type="password" name="konfirmasi_r" class="input" placeholder="Konfirmasi password" value=<?=$row2['konfirmasi_r'];?>><br>

            <input type="submit" name="submit" value="Kirim" class="btn-submit">
        
        </form>
        </div>

</body>
</html>