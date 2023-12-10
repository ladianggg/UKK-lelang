<?php
include "../../conf/conn.php";
if($_POST)
{
  $id_barang = $_POST['id_barang'];

$nama_barang = $_POST['nama_barang'];
$tanggal = $_POST['tanggal'];
$harga_awal = $_POST['harga_awal'];
$deskripsi_barang = $_POST['deskripsi_barang'];
//$foto = $_POST['foto']['name'];

                  $query = ("UPDATE barang SET nama_barang='$nama_barang',tanggal='$tanggal',harga_awal='$harga_awal',deskripsi_barang='$deskripsi_barang' WHERE id_barang ='$id_barang'");
                  if(!mysqli_query($koneksi,"$query")){
                  die(mysqli_error($koneksi));
                  }else{
                  // 
                  echo '<script>alert("Data Berhasil Ditambah !!!");
                  window.location.href="../../index.php?page=data_barang"</script>';
                  ///
                  }
                  } 

?>



