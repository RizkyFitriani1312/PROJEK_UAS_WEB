<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="container login">
        <div class="logo">
            <img src="img/logo.png" alt="logo toko" width="90%">
        </div>
        <div class="form-login">
            <h3>Login</h3>
            <form action="" method="post">
                <input type="text" name="username_r" placeholder="Email atau Username" class="input">
                <input type="password" name="psw_r" placeholder="Password" class="input">

                <input type="submit" name="login" value="Login" class="submit"><br><br>
            </form>

            <p>Anda belum punya akun?
                <a href="register.php">Register</a>
            </p> <br>
                
            <p>Login sebagai Admin
                <a href="login_admin.php">Login Admin</a>
            </p>

        </div>
    </div>
</body>
</html>

<?php
session_start();

require 'config.php';
    
    if(isset($_POST['login'])){
        $username_r = $_POST['username_r'];
        $psw_r = $_POST['psw_r'];
        $psw_r = md5($psw_r);

        $query = "SELECT * FROM regis WHERE username_r = '$username_r' OR email_r = '$username_r'";
        $result3 = $db->query($query);
        $row3 = mysqli_fetch_array($result3);
        $user = $row3['username_r'];

        // if(password_verify($psw_r, $row3['psw_r'])){
        if($psw_r == $row3['psw_r']){
            $_SESSION['login'] = true;

            echo "
                <script>
                    alert('selamat datang $user');
                    document.location.href = 'katalog.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('username dan pw salah');
                </script>
            ";
        }
    }
?>
