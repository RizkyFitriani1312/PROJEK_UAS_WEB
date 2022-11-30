<?php
// Memamnggil file koneksi.php;
include "..\koneksi.php";
	if (isset($_GET['id_produk'])) {
		// Mengahapus data berdasarkan id;
		$hapus = "DELETE FROM produk WHERE id_produk='$_GET[id_produk]'";
		$db->query($hapus);
	}
?>
<script>
	alert("Data Berhasil Di Hapus");
	location.href="data_produk.php";
</script>