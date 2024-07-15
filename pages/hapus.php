<?php
include "../conf/conn.php";
$id = $_GET['id'];
$query = ("DELETE FROM event WHERE id ='$id'");
if(!mysqli_query($koneksi, "$query")){
die(mysqli_error($koneksi));
}else{
echo '<script>alert("Data Berhasil Dihapus !!!");
window.location.href="../index.php?page=beranda"</script>';
}
?>