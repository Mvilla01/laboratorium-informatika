<?php

// Ini Adalah Code Menghubungkan Dengan Database

  $conn = mysqli_connect('localhost','root','','stok_konter') or die($conn);

// Ini adalah Code Menghitung jumlah Akhir Stock
//   if(isset($_POST['updatebarangmasuk'])){
//      $kode_barang = htmlspecialchars($_POST['kode_barang']);
//      $nama_barang = htmlspecialchars($_POST['nama_barang']);
//      $jumlah_barang = htmlspecialchars($_POST['jumlah_barang']);

//     $lihatstock = mysqli_query($conn,"select * from stock where jumlah_barang='$jumlah_barang'");
//     $stocknya = mysqli_fetch_array($lihatstock);
//     $stockskrg = $stocknya['stock'];

//     $qtyskrg = mysqli_query($conn, "select * from masuk where idmasuk='$idm'");
//     $qtynya = mysqli_fetch_array($qtyskrg);
//     $qtyskrg = $jumlah_barang['jumlah_barang'];

//     if($jumlah_barang>$qtyskrg){
//         $selisih = $jumlah_barang-$qtyskrg;
//         $kurangin = $stockskrg - $selisih;
//         $kurangistocknya = mysqli_query($conn, "update stock set stock='$kurangin' where idbarang='$idb'");
//         $updatenya = mysqli_query($conn, "update masuk set jumlah_barang='$jumlah_barang'");
//             if($kurangistocknya&&$updatenya){
//                 header('location:masuk.php');
//             } else {
//                 echo 'gagal';
//                 header('location:masuk.php');
//             }
//     } else {
//         $selisih = $qtyskrg-$jumlah_barang;
//         $kurangin = $stockskrg + $selisih;
//         $kurangistocknya = mysqli_query($conn, "update stock set stock='$kurangin' where idbarang='$idb'");
//         $updatenya = mysqli_query($conn, "update masuk set qty='$qty' keterangan='$deskripsi' where idmasuk'$idm'");
//             if($kurangistocknya&&$updatenya){
//                 header('location:masuk.php');
//             } else {
//                 echo 'gagal';
//                 header('location:masuk.php');
//             }
//     }
// }


?>
