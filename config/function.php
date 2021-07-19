<?php
session_start();
$conn = mysqli_connect("localhost","root","","barang");

if(isset($_POST['addnewbarang'])){
    $namabarang = $_POST['namabarang'];
    $deskripsi = $_POST['deskripsi'];
    $stock = $_POST['stock'];

    $addtotable = mysqli_query($conn,"insert into stock(namabarang, deskripsi, stock) value('$namabarang','$deskripsi','$stock')");
    if($addtotable){
        header('location:index.php');
    } else {
        echo 'gagal';
        header('location:index.php');
    }
};


if(isset($_POST['barangmasuk'])){
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $cekstocksekarang = mysqli_query($conn,"select * from stock where idbarang='$idbarang'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $tambahkanstocksekarangdenganquantity = $stocksekarang+$qty;

    $addtomasuk = mysqli_query($conn,"insert into masuk (idbarang, keterangan, qty) values('$barangnya','$penerima','$qty')");
    $updatestockmasuk = mysqli_query($conn, "update stock set stock='$tambahkanstocksekarangdenganquantity'where idbarang='$barangnya'");
    
    if($addtomasuk&&$updatestockmasuk){
        header('location:masuk.php');
    } else {
        echo 'gagal';
        header('location:masuk.php');
    }
}


if(isset($_POST['addbarangkeluar'])){
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $cekstocksekarang = mysqli_query($conn,"select * from stock where idbarang='$idbarang'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $tambahkanstocksekarangdenganquantity = $stocksekarang-$qty;

    $addtokeluar = mysqli_query($conn,"insert into keluar (idbarang, penerima, qty) values('$barangnya','$penerima','$qty')");
    $updatestockmasuk = mysqli_query($conn, "update stock set stock='$tambahkanstocksekarangdenganquantity'where idbarang='$barangnya'");
    
    if($addtokeluar&&$updatestockmasuk){
        header('location:keluar.php');
    } else {
        echo 'gagal';
        header('location:keluar.php');
    }
}


if(isset($_POST['updatebarang'])){
    $idb = $_POST['idb'];
    $namabarang = $_POST['namabarang'];
    $deskripsi = $_POST['deskripsi'];

    $update = mysqli_query($conn,"update stock set namabarang='$namabarang', deskripsi='$deskripsi' where idbarang ='$idb'");
    if($update){
        header('location:index.php');
    } else {
        echo 'gagal';
        header('location:index.php');
    }
}


if(isset($_POST['hapusbarang'])){
    $idb = $_POST['idb'];

    $hapus = mysqli_query($conn, "delete from stock where idbarang='$idb'");
    if($hapus){
        header('location:index.php');
    } else {
        echo 'gagal';
        header('location:index.php');
    }
};


if(isset($_POST['updatebarangmasuk'])){
    $idb = $_POST['idb'];
    $idm = $_POST['idm'];
    $deskripsi = $_POST['keterangan'];
    $qty = $_POST['qty'];

    $lihatstock = mysqli_query($conn,"select * from stock where idbarang='$idb'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stockskrg = $stocknya['stock'];

    $qtyskrg = mysqli_query($conn, "select * from masuk where idmasuk='$idm'");
    $qtynya = mysqli_fetch_array($qtyskrg);
    $qtyskrg = $qtynya['qty'];

    if($qty>$qtyskrg){
        $selisih = $qty-$qtyskrg;
        $kurangin = $stockskrg - $selisih;
        $kurangistocknya = mysqli_query($conn, "update stock set stock='$kurangin' where idbarang='$idb'");
        $updatenya = mysqli_query($conn, "update masuk set qty='$qty' keterangan='$deskripsi' where idmasuk'$idm'");
            if($kurangistocknya&&$updatenya){
                header('location:masuk.php');
            } else {
                echo 'gagal';
                header('location:masuk.php');
            }
    } else {
        $selisih = $qtyskrg-$qty;
        $kurangin = $stockskrg + $selisih;
        $kurangistocknya = mysqli_query($conn, "update stock set stock='$kurangin' where idbarang='$idb'");
        $updatenya = mysqli_query($conn, "update masuk set qty='$qty' keterangan='$deskripsi' where idmasuk'$idm'");
            if($kurangistocknya&&$updatenya){
                header('location:masuk.php');
            } else {
                echo 'gagal';
                header('location:masuk.php');
            }
    }
}

?>