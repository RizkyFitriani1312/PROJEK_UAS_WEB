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
        <h3>Tambah Minuman Tradisional</h3>
        <form action="tambah1.php" method="post" enctype="multipart/form-data">
            
            <label for="">Nama Minuman</label><br><br>
            <input type="text" name="nama_minum" class="form-text"><br>
            
            <label for="">Harga Minuman</label><br><br>
            <input type="text" name="harga_minum" class="form-text"><br>
            
            <label for="">Informasi Minuman</label><br><br>
            <input type="text" name="info_minum" class="form-text"><br>
            
            <label for="">Foto Minuman</label><br><br>
            <input type="file" name="foto_minum"><br>

            <input type="submit" name="submit" value="Kirim" class="btn-submit">
        
        </form>
    </div>

</body>
</html>