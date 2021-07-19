<?php
include '../config/koneksi.php';
$delete = mysqli_query($conn, "DELETE FROM stock WHERE id = '".$_GET['id']."'");

 if($delete){
	header('location: tab_stock.php?hapus=sukses');
}
else{
		header('location: tab_stock.php?hapus=gagal');
}

?>
