<?php
include "../../conf/conn.php";
if($_POST)
{
$id_user = $_POST['id_user'];
$nama_lengkap = $_POST['nama_lengkap'];
$username = $_POST['username'];
$password = $_POST['password'];
$telp = $_POST['telp'];
$query = ("UPDATE masyarakat SET nama_lengkap='$nama_lengkap',username='$username',password='$password',telp='$telp' WHERE id_user  ='$id_user'");

if(!mysqli_query($koneksi,"$query")){
die(mysqli_error($koneksi));
}else{
echo '<script>alert("Data Berhasil Diubah !!!");
window.location.href="../../index.php?page=data_masyarakat"</script>';

}
}
?>