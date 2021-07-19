<?php
include '../config/koneksi.php';
$delete = mysqli_query($conn, "DELETE FROM masuk WHERE id = '".$_GET['id']."'");

 if($delete){
	header('location: tab_masuk.php?hapus=sukses');
}
else{
		header('location: tab_masuk.php?hapus=gagal');
}

?>
