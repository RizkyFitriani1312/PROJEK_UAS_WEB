
<?php
try{
		//buat koneksi dengan database
		$dbh = new PDO ('mysql:host=localhost;
						dbname=uas',
						 "root", 
						 "");

		//set eror mode
		$dbh ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	catch (PDOException $e){
		//tampilan	Pesan Kesalahan jika koneksi gagal
		print "koneksi Gagal  :" . $e->getMessage() . "<br>";
		die();
}
?>