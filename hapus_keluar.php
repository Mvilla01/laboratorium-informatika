<?php
include '../config/koneksi.php';
$delete = mysqli_query($conn, "DELETE FROM keluar WHERE id = '".$_GET['id']."'");

 if($delete){
	header('location: tab_keluar.php?hapus=sukses');
}
else{
		header('location: tab_keluar.php?hapus=gagal');
}

?>
