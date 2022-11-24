<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dessert Shop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container login">
        <div class="logo">
            <img src="img/logo.png" alt="logo toko" width="90%">
        </div>
        <div class="form-login">
            <h3>Login Admin</h3>
            <form action="" method="POST">
                <input type="text" name="email" placeholder="Email" class="input">
                <input type="password" name="password" placeholder="Password" class="input">
                <input type="submit" name="login_admin" value="Login" class="submit">
            </form>
        </div>
    </div>
</body>
</html>

            <?php
                session_start();
                if(isset($_POST['login_admin'])){
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $emailbenar = "rekrifit@gmail.com";
                    $passwordbenar = 12345;

                    if($email == $emailbenar AND $password == $passwordbenar) {
                        $_SESSION['login_admin'] = true;
                        echo "
                        <script>
                            alert('selamat datang $email');
                            document.location.href = 'index.php';
                        </script>
                    ";
                    }else {
                        echo "email atau password salah";
                    }
                }
            ?>

