<?php
include "../../conf/conn.php";
if($_POST)
{
$nama_lengkap = $_POST['nama_lengkap'];
$username = $_POST['username'];
$password = $_POST['password'];
$telp = $_POST['telp'];
$query = ("INSERT INTO masyarakat(id_user,nama_lengkap,username,password,telp) VALUES ('','".$nama_lengkap."','".$username."','".$password."','".$telp."')");
if(!mysqli_query($koneksi, "$query")){
die(mysqli_error($koneksi));
}else{
echo '<script>alert("Data Berhasil Ditambahkan !!!");
window.location.href="../../index.php?page=data_masyarakat"</script>';
}
}
?>
