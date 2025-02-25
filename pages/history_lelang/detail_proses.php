<?php
include "../../conf/conn.php";

if ($_POST) {
    $id_lelang = $_POST['id_lelang'];
    $id_barang = $_POST['id_barang'];
    $id_user = $_POST['id_user'];
    $penawaran_harga = $_POST['penawaran_harga'];
    $harga_awal = $_POST['harga_awal']; 
    $harga_akhir = $_POST['harga_akhir'];  
//  echo $penawaran_harga . " $harga_awal"; 
// return;
if ($penawaran_harga < $harga_akhir || $penawaran_harga < $harga_awal) {
    echo '<script>alert("Penawaran harga harus lebih besar dari harga awal."); window.location.href="../../index.php?page=detail&id=' . $id_barang . '";</script>';
} else {
    $query = "INSERT INTO history_lelang (id_lelang, id_barang, penawaran_harga, id_user) VALUES ('$id_lelang', '$id_barang', '$penawaran_harga', '$id_user')";
    // echo "UPDATE lelang SET harga_akhir='$harga_akhir' WHERE penawaran_harga ='$penawaran_harga'";
    if (!mysqli_query($koneksi, $query)) {
        die(mysqli_error($koneksi));
    } else {
        echo '<script>alert("Data Berhasil Ditambahkan !!!"); window.location.href="../../index.php?page=detail&id=' . $id_barang . '";</script>';
    }

    $query = "UPDATE lelang SET harga_akhir='$penawaran_harga' WHERE id_lelang ='$id_lelang'";
// echo $query;
    if (!mysqli_query($koneksi, $query)) {
        die(mysqli_error($koneksi));
    } else {
         echo '<script>alert("Data Berhasil Ditambahkan !!!"); window.location.href="../../index.php?page=detail.php";</script>';
    }
}



}
?>
