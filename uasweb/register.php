<?php
date_default_timezone_set('asia/makassar');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/6acc3fbd7c.js" crossorigin="anonymous"></script>
    <title>Register Form</title>
    <link rel="icon" href="https://www.freepnglogos.com/uploads/honda-logo-png/honda-motorcycles-logo-wing-10.png"></head>
</head>
<body>
    <div class="container-regis" >
        <div class="judul">
            <h2><i class="fa-solid fa-registered regis"></i>Registrasi</h2>
        </div>
        <div class="form" >

            <form  method="post"  autocomplete="off" enctype="multipart/form-data">
                <div class="ikons">
                    <i class="fa-solid fa-user icon"></i>
                    <input class="input-field" type="text" name="username" class="input" placeholder="Username" required>
                </div>
                <div class="ikons">
                    <i class="fa-solid fa-envelope icon"></i> 
                    <input class="input-field"type="email" name="email" class="input" placeholder="Email" required>
                </div>
                <div class="ikons">
                    <i class="fa-solid fa-lock icon"></i>
                    <input class="input-field"type="password" name="password" class="input" placeholder="Password" required>
                </div>
                <div class="ikons">
                    <i class="fa-solid fa-lock icon"></i>
                    <input class="input-field" type="password" name="konfirmasi" class="input" placeholder="Konfirmasi password" required>
                </div>
                <input type="hidden" name="tanggalBuat" value=<?= date("d/m/Y")?>>                
                <label> <input class="input-field"type="checkbox" checked="checked" name="remember" required        > Bersedia Memenuhi Persyaratan? </label><br>
              
                <input type="submit" name="registrasi" class="submit" value="Daftar "><br><br>
            </form>
            <p class="login">Sudah punya akun? <i class="fa-solid fa-arrow-right"></i>
                <a href="login.php">Login</a>
            </p>
        
        </div>
    </div>
    <script src="js/uncek.js"></script>
</body>
</html>




<?php

    require 'koneksi.php';

    if(isset($_POST['registrasi'])){
        $id_user      = ['id_user'];
        $username     = $_POST['username'];
        $password     = $_POST['password'];
        $email        = $_POST['email'];
        $tanggal      = $_POST['tanggalBuat'];
        $konfirmasi   = $_POST['konfirmasi'];



        $user       = $db->query("SELECT * FROM user where username='$username'");
        $num_user   = mysqli_num_rows($user);

        if($num_user > 0){  
            echo"
                <script>
                    alert('Username telah di gunakan');
                </script>";
        }else{
            if($password == $konfirmasi){
                // $password = password_hash($password, PASSWORD_DEFAULT);
                $password  = md5($password);

                $query  = "INSERT INTO user(id_user, username, psw, email, tgl)
                            VALUES('', '$username', '$password', '$email','$tanggal' )";
                $result = $db->query($query);

                if($result){
                    echo"
                        <script>
                            alert('Registrasi berhasil');
                            document.location.href = 'login.php';
                        </script>";
                }else{
                    echo"
                        <script>
                            alert('Registrasi Gagal ');
                            document.location.href = 'register.php';
                        </script>";
                }echo "
                    <script>
                        alert('Password = $password');
                    </script>";
            }else{
                echo "
                    <script>
                        alert('Konfirmasi Password Salah');
                    </script>";
            }
        }
    }
?>



<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

body{
    font-family: 'Poppins', sans-serif;

}

h2{
    font-size:35px;
}
.regis {
    color:green;
}
.ikons i{
    background:#87898c;
    position: absolute;
}

.ikons {
    width: 100%;    
    margin-bottom: 10px;
}

.icon {
    padding: 12px;
    margin-top:7px;
    color:white;    
    height:23px;
    /* min-width: -12px; */

}
.logo {
    text-decoration:line-through;
    font-size:22px;
    text-align: center;
    margin-bottom:55px;

}
.container-regis{
    max-width: 500px;
    margin: auto;
}


  input[type=text], input[type=password], input[type=email  ] {
  width: 100%;
  padding: 13.5px 20px;
  padding-left:45px;
  margin: 8px 0;
  border: 1px solid #ccc;
  box-sizing: border-box;
  font-size:15px;

}

.submit {
  font-size:18px;
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  border-radius:4px;

}
.login {
    margin-top:-21px;
    float:right;
}
.login a{
    text-decoration:none;
}

input[type=checkbox]{
    cursor:pointer;

}
</style>