

<?php 
 session_start();
    require 'config.php';
    $result = mysqli_query($db, "SELECT * FROM kue");

    if(isset($_GET['search'])) {
        $keyword = $_GET['keyword'];
        $result = mysqli_query($db, "SELECT * FROM kue WHERE nama_kue LIKE '%$keyword%'");
    }else{
        $result = mysqli_query($db, "SELECT * FROM kue");
    }
?>

<?php 
    require 'config.php';
    $result1 = mysqli_query($db, "SELECT * FROM minuman");

    if(isset($_GET['search'])) {
        $keyword = $_GET['keyword'];
        $result1 = mysqli_query($db, "SELECT * FROM minuman WHERE nama_minum LIKE '%$keyword%'");
    }else{
        $result1 = mysqli_query($db, "SELECT * FROM minuman");
    }
?>
<?php
    // session_start();
    if(!isset($_SESSION['login'])){
        header("Location:login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="style1.css">
    <title>Katalog</title>
</head>
<body class="body">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- NAVIGATION BAR -->
    <!-- <div class="container">
        <nav class="wrapper">
            <div class="brand">
                <div class="logoi">Samarinda</div>
                <div class="logod"> Dessert</div>
            </div>
            <div class="searching">
            <form action="" method="GET">
                <input type="text" name="keyword" placeholder="Cari Dessert..." class="resizedTextbox" />
                <input type="submit" name="search" value="search" class="cari">
            </form>
            </div>
            <ul class="navigation">
                <li><a href="tentang.html">Tentang</a></li>
                <li><a href="transaksi.php">Pemesanan</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>
    </div>
     -->
     <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">DISSERT FOOD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tentang.html">Tentang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="transaksi.php">Pemesanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Log Out</a>
            </li>
            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li> -->
            <!-- <li class="nav-item">
              <a class="nav-link disabled">lo</a>
            </li> -->
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" name ="keyword" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" name ="search"type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="main"> <br>
            
        <div class="section-title"> <p><b>Dessert Food</b></p> </div> <br>
        <table border=1>
            <?php 
                $i = 1;
                while($row = mysqli_fetch_array($result)){
            ?>
            
            <tr>
                <td><?=$i;?></td>
                <td nowrap><?=$row['nama_kue']?></td>
                <td><?=$row['harga_kue']?></td>
                <td><?=$row['info_kue']?></td>
                <td><img src="img/<?=$row['foto_kue']?>" alt="" width="100px"></td>
            </tr>
                
            <?php
                $i++; 
                    }
            ?>
            </table>  <br><br>  

            <div class="section-title"> <p><b>Dessert Drink</b></p></div> <br>
            <table border=1>
                <?php 
                    $j = 1;
                    while($row1 = mysqli_fetch_array($result1)){
                ?>

                <tr>
                    <td><?=$j;?></td>
                    <td nowrap><?=$row1['nama_minum']?></td>
                    <td><?=$row1['harga_minum']?></td>
                    <td><?=$row1['info_minum']?></td>
                    <td><img src="img/<?=$row1['foto_minum']?>" alt="" width="100px"></td>
                </tr>
                
                <?php
                    $j++; 
                        }
                ?>
            </table>
        </div>
    </div>

    <div class="footer">
        <div class="copyright">
            <div> <p><b>Copyright 2022 @Kelompok_5_C2020</b></p></div> <br> 
        </div>
    </div>

    <script>
        function ubahMode(){
            const ubah = document.body;
            ubah.classList.toggle("dark");
        }
    </script>
</body>
</html>
