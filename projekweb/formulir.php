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
        <h3>Tambah Kue Tradisional</h3>
        <form action="tambah.php" method="post" enctype="multipart/form-data">
            
            <label for="">Nama Kue</label><br><br>
            <input type="text" name="nama_kue" class="form-text" ><br>
            
            <label for="">Harga Kue</label><br><br>
            <input type="text" name="harga_kue" class="form-text"><br>
            
            <label for="">Informasi Kue</label><br><br>
            <input type="text" name="info_kue" class="form-text"><br>
            
            <label for="">Foto Kue</label><br><br>
            <input type="file" name="foto_kue"><br>

            <input type="submit" name="submit" value="Kirim" class="btn-submit">
        
        </form>
    </div>

</body>
</html>