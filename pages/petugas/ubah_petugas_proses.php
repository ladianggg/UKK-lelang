<?php
include "../../conf/conn.php";
if($_POST)
{
    // print_r($_POST);
$id_petugas = $_POST['id_petugas'];    
$nama_petugas = $_POST['nama_petugas'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

$query = ("UPDATE petugas SET nama_petugas='$nama_petugas',username='$username',password='$password',level='$level' WHERE id_petugas ='$id_petugas'");
// echo $query;

if(!mysqli_query($koneksi,"$query")){
die(mysqli_error($koneksi));
}else{
    
echo '<script>alert("Data Berhasil Diubah !!!");
window.location.href="../../index.php?page=data_petugas"</script>';

}

}
?>