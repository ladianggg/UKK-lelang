<?php
include "../../conf/conn.php";
if($_POST)
{
$nama_petugas = $_POST['nama_petugas'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

$query = ("INSERT  petugas (nama_petugas,username,password,level) VALUES ('".$nama_petugas."','".$username."','".$password."','".$level."')");
echo $query;

if(!mysqli_query($koneksi, "$query")){
 die(mysqli_error($koneksi));
}else{
echo '<script>alert("Data Berhasil Ditambahkan !!!");
window.location.href="../../index.php?page=data_petugas"</script>';
}

}
?>
