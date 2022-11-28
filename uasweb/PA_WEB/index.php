<?php
  require 'koneksi.php'; 
  session_start();

  $tampil  = "SELECT * FROM produk ";
  $hasi    = mysqli_query($db, $tampil);
  $jumlah  = mysqli_num_rows($hasi);
 

  $tampil  = "SELECT * FROM produk ";
  if( isset($_POST["cari"])){
    $nama_dicari = $_POST["keyword"];
    $tampil = "SELECT *FROM produk WHERE gambar         LIKE '%$nama_dicari%' OR
                                            nama        LIKE '%$nama_dicari%' OR
                                            harga       LIKE '%$nama_dicari%' OR
                                            stok        LIKE '%$nama_dicari%' OR
                                            deskripsi   LIKE '%$nama_dicari%' OR
                                            kategori    LIKE '%$nama_dicari%' OR
                                            id_produk   LIKE  '%$nama_dicari%'";
}

// if( isset($_POST["cari"])){
//   $nama_dicari = $_POST["keyword"];
//   $select_sql = "SELECT tb_pembelian.id_pembelian ,tb_pembelian.tanggal, 
//                 tb_produk.gambar, tb_user.username,tb_pembelian.jumlah, tb_pembelian.harga,
//                 tb_produk.desk,tb_produk.kategori FROM tb_pembelian
//                 INNER JOIN tb_user on tb_pembelian.id_user = tb_user.id_user
//                 INNER JOIN tb_produk on tb_pembelian.id_produk = tb_produk.id_produk
//                 WHERE (id_pembelian       LIKE '%$nama_dicari%' OR
//                       jumlah       LIKE '%$nama_dicari%' OR
//                       tanggal       LIKE '%$nama_dicari%' OR
//                       harga         LIKE '%$nama_dicari%' OR
//                       desk          LIKE '%$nama_dicari%' OR 
//                       kategori      LIKE '%$nama_dicari%')";}
  
// ?>  
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6acc3fbd7c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Produk</title>
    <link rel="icon" href="https://www.freepnglogos.com/uploads/honda-logo-png/honda-motorcycles-logo-wing-10.png">
</head>
<html>
<body>
<section id="home">
  <nav>
    <ul>
        <?php if(isset($_SESSION['username'])){
        }if(@$_SESSION['username']){
            echo "<li><a href='logout.php'>Logout</a></li>";
        }
    else {
      echo "<li><a href='login.php'>Login</a></li>";
    }
    ?>
    <li><a href="login.php">Keranjang</a></li>
    <li><a href="#about">About</a></li>
    <li><a href="#home">Home</a></li>
    <!-- <img src="https://serbasepeda.com/assets/frontend/images/logo-serbasepeda.svg" alt="SerbaSepeda Logo" class="image"> -->
    <img src="../img/logo.png" alt="kue Logo" class="image">
 
    </ul> 
  </nav>
  <div class ="header2">
     <div class="header-logo2">  Cari sesuai dengan keinginan anda </div>
       
      <form METHOD="POST" >
        <input class="srch" type="text" name="keyword"  placeholder="Masukan Keyword . . . .">
        <button  class="create" type="submit" name="cari"><i class="fas fa-search"></i> Cari Kata</button>
      </form>
    
      </div>
    <p class="info">Produk</p>

    <div class="container-card">
    <?php
      if($jumlah > 0){
        while($row = mysqli_fetch_assoc($hasi)){
    ?>
      <div class="card">
            <img src="img/<?=$row['gambar']?>" alt="gambar_produk" width="200px">
            <h1><?= $row['kategori'] ?></h1>
            <p class="price">Rp.<?= $row['harga']?></p>
            <p><?= $row['deskripsi']?></p>
            <a href="login.php"class="masukan"><i class="fa-solid fa-cart-plus"></i></a>
            <a href="login.php"><button class="cekout">Beli</button></a>
        </div>
    <?php
        }
    }
    ?>
    </div>
<footer class=" footer">
<section id="about">
      <div class ="footer-container">
      <div class="row">
      <img src="https://serbasepeda.com/assets/frontend/images/logo-serbasepeda.svg" alt="SerbaSepeda Logo" class="image">
        <div class ="footer-nav-section" >
          <h4 class ="heading">Serba Sepeda</h4>
          <ul class="items">
            <li class="item"><a href="#">Tentang Kami</a></li> 
            <li class="item"><a href="#"> Blog serba sepeda</a></li> 
            <li class="item"><a href="#"> daftar brand </a></li> 
            <li class="item"><a href="#">promosi </a></li> 
            <li class="item"><a href="#">garansi seumur hidup</a></li> 
            <li class="item"><a href="#">reward point & referal </a></li>
            <li class="item"> <a href="#">service sepeda </a></li> 
            <li class="item"><a href="#">lowongan kerja </a></li> 
          </ul>
      </div>
        <div class=" footer-nav-section">
          <h4 class ="heading"> Get Help</h4>
          <ul class =" items">  
            <li class="item" > <a href="#">FAQ(Frequently Asked Question</a></li> 
            <li class="item"><a href="#">syarat dan ketentuan</a></li> 
            <li class="item"> <a href="#">konfirmasi pembayaran</a></li> 
            <li class="item"> <a href="#">cara berbelanja</a></li> 
            <li class="item"> <a href="#">syarat dan cara kredit sepeda</a></li> 
            <li class="item"><a href="#">hubungi kami</a></li> 
          </ul>
        </div>
        <div class="footer-nav-section">
          <div class="media">
          <h4 class ="heading">Follow Us</h4>
            <ul class="media-items">
              <li><a href="https://wa.me/6281254424739"><i class="fa1 fas fa-phone"></i> Contact</a></li>
              <li><a href="https://twitter.com/Cnoxerr12345"><i class="fa1 fa-brands fa-twitter"></i> Twiter</a></li>
              <li><a href="https://www.instagram.com/ash4rr/"><i class="fa1 fa-brands fa-instagram"></i> Instagram</a></li>
            </ul>
        </div>
      </div>
    </div>
    </div>
  </section>
  </footer>
</section>
</body>
</html>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Cormorant:wght@700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700;900&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600&display=swap');

*{
    margin: 0;
    padding: 0;
}
body{
    font-family: 'Poppins', sans-serif;

}
.logo{
    margin-top: -30px;
    margin-left:12px;
}
nav{
  height:200px;
  /* background-color:#dee3ff; */
  /* background-image: linear-gradient(to right , #A0F1EA,#EAD6EE);
  background-image: linear-gradient(to top , #A0F1EA,#EAD6EE); */
  background-image: linear-gradient(to bottom, #E0FFFF,#E6E6FA );
  /* background-image: linear-gradient(to left,#C0C0C0,#FFF5EE); */
  border-bottom: 50px linear-gradient(to left , #A0F1EA,#EAD6EE);
}
 nav ul {
  list-style-type: none;
  margin: 0;
  font-size:20px;
  overflow: hidden;
  height: 150px;
  font-family: 'Nunito', sans-serif;
  padding : 33px 20px;
  padding-left:10px;
  

}
ul li a:hover{
    color: #145ba3;
    padding-left:10px;
  }

nav ul li {
  float: right;
}

nav ul li a {
  display: block;
  color:black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}



.header2{
   
   /* background-color: #dee7ec; */
   background-image: linear-gradient(to left,#FFF0F5,#E0FFFF);
   height: 50px;
  }
/* tulisan header2 */
.header-logo2{
    font-family: 'Nunito', sans-serif;
    font-size:20px;
    float: left;
    height : 30px;
    padding: 10px 30px;
    color:black;
    color:#505091;
  font-family: 'Cormorant', serif;
}

   /* form searching */
.srch{ 
  
   border: 1px;
   display: inline-block;
   width: 40%; 
   height:30%; 
   margin-top: 30px;color:white; 
  color: black;
  text-align: center;
  padding :10px;
  display: inline-block;
  font-size: 16px;
  border-radius:10px;

}
.create{
  margin-left:80px;
  color:white;
  background-color: #4CAF50; 
  border: 4px;
  color: white;
  text-align: center;
  text-decoration: none;
  padding :5px;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
  border-radius:10px;
}
.placholder{
   border: 1px solid rgb(8, 208, 172);

}

.container-card{
  display: flex;
  flex-wrap: wrap;
  
}
.card {
  flex: 0 1 24%;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  margin-bottom:35px;
  text-align: center;
 
}
.price {
  color: grey;
  font-size: 22px;
}
.masukan {  
  border: none;
  outline: 0;
  padding: 10px;
  color: white;
  background-color: #145ba3;
  cursor: pointer;
  width: 50%;
  margin-left: 65px;
  margin: bottom 55px;
  font-size: 18px;
   border-radius: 5px;
   margin-bottom:10px;
}

.cekout {  
  border: none;
  outline: 0;
  padding: 10px;
  color: white;
  background-color: #2f302f;
  text-align: center;
  cursor: pointer;
  width: 40%;
  height:45px;
  margin-left: -0px;
  font-size: 18px;
  margin-bottom:10px;
  border-radius: 5px;
}

input[type=text] {
  margin-right:-65px;
  padding: 3.5px;
  margin-top: 8px;
  font-size: 15px;
  font-family: 'Poppins', sans-serif;


  
}

.info{
  color:#505091;
  font-size:22px;
  padding-left:22px;
  margin-top:50px;
  font-family: 'Cormorant', serif;
  font-size:50px;
  border-bottom: 2px solid #dee7ec;

  
}

table {
  border-collapse: collapse;
  width: 90%;
  margin: auto;}

th, td {
  text-align: left;
  padding: 8px;
  border-bottom:1px solid #cad1db;

}

th {
  background-color: #242020;
  color: white;
}
.footer{
  /* background-color:#4a4a4a; */
  background-image: linear-gradient(to left,#778899,#4a4a4a);
  background-image: linear-gradient(to bottom,#778899,#4a4a4a);
  color: white;
  padding:50px 30px;
  border-top: 50px solid #dee7ec;
  
}
.footer-container{
  max-width:1170px;
  margin:auto;

}
.row{
  display: flex;
  flex:wrap;
}
.footer ul{
  list-style:none;
}
.footer-nav-section{
  width: 25%;
  padding: 0 25px;
}
.footer-nav-section h4{
  font-size: 18px;
  text-transform: capitalize;
  margin-bottom:15px;
  font-family: 'Poppins', sans-serif;
  font-style: bold;
  /* color:#505091; */
}
.footer-nav-section ul li:not(:last-child){
  margin-bottom:10px;
}
.footer-nav-section ul li a{
  font-size:16px;
  text-decoration:none;
  color: #ffffff;
  font-weight:300;
  color:#bbbb;
  display:block;
}
.footer-nav-section ul li a:hover{
  color: #ffffff;
  padding-left:10px;
}
/* responsive */
@media (max-width: 638px) {
  .masukan {  
  border: none;
  outline: 0;
  padding: 10px;
  color: white;
  background-color: #145ba3;
  cursor: pointer;
  margin-left: -15px;
  font-size: 18px;
}
}
@media (max-width: 757px) {
  .masukan {  
  border: none;
  outline: 0;
  padding: 10px;
  color: white;
  background-color: #145ba3;
  cursor: pointer;
  margin-left: -15px;
  font-size: 18px;
}
}

@media (max-width: 1021px) {
  .masukan {  
  border: none;
  outline: 0;
  padding: 10px;
  color: white;
  background-color: #145ba3;
  cursor: pointer;
  margin-left: -15px;
  font-size: 18px;
}
}
@media (min-width: 1194px) {
  .logo{
    margin-top: -39px;
    margin-left:-22px;
  }
}
@media (min-width: 377px) {
  .logo{
    margin-top: -99px;
    margin-left:-22px;
  }
  .info{
  font-size:50px;
  padding-left:22px;
  margin-top:50px;
  }
  .masukan {  
  border: none;
  outline: 0;
  padding: 10px;
  color: white;
  background-color: #145ba3;
  cursor: pointer;
  margin-left: -12px;
  font-size: 18px;
}

}

@media (min-width: 916px) {
  .logo{
    margin-top: -30px;
    margin-left:12px;
  }   
}
@media (min-width: 529px) {
  .logo{
    margin-top: -42px;
    margin-left:12px;
  }   
}

@media(max-width:767px){
  .footer-nav-section {
  width: 50%;
  margin-bottom:30px;

  }
}
@media(max-width:574px){
  .footer-nav-section {
  width: 100%;
  margin-bottom:30px;

  }
}
/* untuk searching search */

@media (max-width: 638px) {
  .srch{
    margin-left: -15px;
  }
  .create{
    /* margin-left: -15px; */
    font-size:16px;;
    padding: 5px;
  }

  .header-logo2{
    font-family: 'Nunito', sans-serif;
    font-size:20px;
    float: left;
    height : 30px;
    color:black;
    color:#505091;
  font-family: 'Cormorant', serif;
  }
}
@media (max-width: 757px) {
  .srch{
    margin-left: -15px;
  }
  .create{
    /* margin-left: -15px; */
    padding: 5px;
    font-size:16px;;
  }
  .header-logo2{
    font-family: 'Nunito', sans-serif;
    font-size:20px;
    float: left;
    height : 30px;
    padding: 10px 30px;
    color:black;
    color:#505091;
  font-family: 'Cormorant', serif;
  }
}
@media (max-width: 1021px) {
  .srch{
    margin-left: -15px;
  }
  .create{
    /* margin-left: -15px; */
    font-size:16px;;
    padding: 5px;
  }

  .header-logo2{
    font-family: 'Nunito', sans-serif;
    font-size:20px;
    float: left;
    height : 30px;
    color:black;
    color:#505091;
  font-family: 'Cormorant', serif;
  }}
@media (min-width: 1194px) {
  .srch{
    margin-left: -15px;
  }
  .create{
    /* margin-left: -15px; */
    padding: 5px;
    font-size:16px;;
  }
  .header-logo2{
    font-family: 'Nunito', sans-serif;
    font-size:20px;
    float: left;
    height : 30px;
    color:black;
    color:#505091;
  font-family: 'Cormorant', serif;
  }
}
@media (min-width: 377px) {  
  .srch{
    margin-left: -15px;
  }
  .create{
    /* margin-left: -15px; */
    padding: 5px;
    font-size:16px;;
  }
  .header-logo2{
  padding-left:22px;
  font-family: 'Nunito', sans-serif;
    font-size:20px;
    float: left;
    height : 30px;
    color:black;
    color:#505091;
  font-family: 'Cormorant', serif;
  }}
</style>