<?php
include "../conf/conn.php";
if($_POST)
{
$nama_acara = $_POST['nama_acara'];
$tanggal = $_POST['tanggal'];
$lokasi = $_POST['lokasi'];
$deskripsi = $_POST['deskripsi'];

$query = ("INSERT  event (nama_acara,tanggal,lokasi,deskripsi) VALUES ('".$nama_acara."','".$tanggal."','".$lokasi."','".$deskripsi."')");
echo $query;

if(!mysqli_query($koneksi, "$query")){
 die(mysqli_error($koneksi));
}else{
echo '<script>alert("Data Berhasil Ditambahkan !!!");
window.location.href="../index.php?page=beranda"</script>';
}

}
?>
