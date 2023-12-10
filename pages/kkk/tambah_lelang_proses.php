<?php
include "../../conf/conn.php";
if($_POST)
{
$id_barang = $_POST['id_barang'];
$tanggal = $_POST['tanggal'];
$harga_awal = $_POST['harga_awal'];
$id_user = $_POST['id_user'];
$id_petugas = $_POST['id_petugas'];
$status = $_POST['status'];
$query = ("INSERT INTO lelang(id_lelang,id_barang,tanggal,harga_awal,id_user,id_petugas,status) VALUES ('','".$id_lelang."','".$id_barang."','".$tanggal."','".$harga_awal."','".$id_user."','".$id_petugas."')");
if(!mysqli_query($koneksi, "$query")){
die(mysqli_error($koneksi));
}else{
echo '<script>alert("Data Berhasil Ditambahkan !!!");
window.location.href="../../index.php?page=data_lelang"</script>';
}
}
?>
