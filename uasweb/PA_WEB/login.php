<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/6acc3fbd7c.js" crossorigin="anonymous"></script>
    <title>Login Form</title>
    <link rel="icon" href="https://www.freepnglogos.com/uploads/honda-logo-png/honda-motorcycles-logo-wing-10.png"></head>
<body>
    <div class="container-login">
        <div class="judul">
        <h2>Login</h2>
        </div>
        <div class="form-login">
            <form action="" method="POST"  autocomplete="off">
                <div class="ikons">
                    <i class="fa-solid fa-user icon"></i>
                    <input class="input-field" type="text" name="username" placeholder="Masukan Username Anda" class="input" required>
                </div>
                <div class="ikons">
                <i class="fa-solid fa-lock icon"></i>
                    <input class="input-field" type="password" id="password" name="password" placeholder="Masukan Password Anda" class="input" required>
                    <span class="show-hide">
                    <i id="mata" class="fa fa-eye"></i>
                </span>
                </div>
                <input type="submit" name="login" value="Masuk  " class="submit"><br><br>
            </form>
            <p class="regis">Belum punya akun? <i class="fa-solid fa-arrow-right"></i>
                <a href="register.php">Daftar?</a>
            </p>
        </div>
    </div>
    <script src= "js/slide.js"></script>
</body>
</html>
<?php 
require 'koneksi.php';
session_start();

if (isset($_SESSION['login'])) {
    header("Location: admin/index.php");
}


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM user WHERE username='$username' AND psw='$password'";
    $result = mysqli_query($db, $sql);
    if ($result->num_rows > 0) {    
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['pelanggan'] = $row;
        if($username == "admin"){        
            echo "<script>
            alert('Welcome @$username!');
            document.location.href = 'admin/index.php';
          </script>";}
        echo "<script>
                alert('Login berhasil! @$username');
                document.location.href = 'user/index.php';
              </script>";
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
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

.show-hide{
    position: absolute;
    right:430px;
    bottom:366px;
    font-size:18px;
}
.show-hide i{
    background-color: #ffffff;
    cursor: pointer;
    display: none;
}
.show-hide i.hide:before{
    content: '\f070';
}

#password:valid ~ .show-hide i{
    display: block;
}
.logo {
    text-decoration:line-through;
    font-size:22px;
    text-align: center;
    margin-bottom:55px;

}
.container-login{
    max-width: 500px;
    margin: auto;
}

  input[type=text], input[type=password] {
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
.regis {
    margin-top:-21px;
    float:right;
}
.regis a{
    text-decoration:none;

}

@media (max-width: 430px) {
    .container-login {
    width: 300px;
    }
}
@media (max-width: 638px) {
    .show-hide{
    position: absolute;
    right:60px;
    bottom:297px;
    font-size:18px;
    }
}

</style>