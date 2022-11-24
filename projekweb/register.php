<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    <div class="container regis">

        <div class="judul">
            <h2>Registrasi</h2>
        </div>
        
        <div class="form">
            <form action="" method="post">

                <label for="email">Email</label><br>
                <input type="email" name="email_r" class="input" placeholder="Masukkan email"><br>

                <label for="username">Username</label><br>
                <input type="text" name="username_r" class="input" placeholder="Masukkan username"><br>

                <label for="password">Password</label><br>
                <input type="password" name="psw_r" class="input" placeholder="Password"><br>

                <label for="konfirmasi">Konfirmasi Password</label><br>
                <input type="password" name="konfirmasi_r" class="input" placeholder="Konfirmasi password"><br>

                <input type="submit" name="regis" class="submit" value="Registrasi"><br><br>
            </form>

            <p>Sudah punya akun?
                <a href="login.php">Login</a>
            </p>
        
        </div>
    </div>
</body>
</html>

<?php 
    require 'config.php';

    if(isset($_POST['regis'])){
        $email_r = $_POST['email_r'];
        $username_r = $_POST['username_r'];
        $psw_r = $_POST['psw_r'];
        $konfirmasi_r = $_POST['konfirmasi_r'];

        // cek username udah digunakan atau belum
        $user = $db->query("SELECT * FROM regis WHERE username_r='$username_r'");
        $num_user = mysqli_num_rows($user);

        if($num_user > 0){
            echo "
                <script>
                    alert('Username telah digunakan, silahkan cari username lain');
                </script>
            ";
        }else {
            if($psw_r == $konfirmasi_r){
                // $psw_r = password_hash($psw_r, PASSWORD_DEFAULT);
                $psw_r = md5($psw_r);
                $query = "INSERT INTO regis (email_r,username_r,psw_r,konfirmasi_r)
                            VALUES ('$email_r','$username_r','$psw_r','$konfirmasi_r')";
                $result3 = $db->query($query);

                if($result3){
                    echo "<script>
                            alert('Registrasi Berhasil');
                            document.location.href = 'login.php';
                        </script>";
                }else{
                    echo "<script>
                            alert('Registrasi Gagal');
                        </script>";
                }
            }else{
                echo "<script>
                            alert('Konfirmasi Password Salah!');
                        </script>";
            }
        }
    }
?>