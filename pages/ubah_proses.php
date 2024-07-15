<?php
include "../conf/conn.php";
if($_POST)
{
    // print_r($_POST);
    $id = $_POST['id'];
    $nama_acara = $_POST['nama_acara'];
    $tanggal = $_POST['tanggal'];
    $lokasi = $_POST['lokasi'];
    $deskripsi = $_POST['deskripsi'];
    
$query = ("UPDATE event SET nama_acara='$nama_acara',tanggal='$tanggal',lokasi='$lokasi',deskripsi='$deskripsi' WHERE id ='$id'");
// echo $query;

if(!mysqli_query($koneksi,"$query")){
die(mysqli_error($koneksi));
}else{
    
echo '<script>alert("Data Berhasil Diubah !!!");
window.location.href="../index.php?page=beranda"</script>';

}
 
}
?>