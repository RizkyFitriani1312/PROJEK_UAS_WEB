<?php
// Memamnggil file koneksi.php;
include "..\koneksi.php";
	if (isset($_GET['id_user'])) {
		// Mengahapus data berdasarkan id;
		$hapus = "DELETE FROM user WHERE id_user='$_GET[id_user]'";
		$db->query($hapus);
	}
?>
<script>
	alert("Data Berhasil Di Hapus");
	location.href="info_user.php";
</script>