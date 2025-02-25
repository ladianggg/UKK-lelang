<?php
include "../../conf/conn.php";
$id = $_GET['id'];
$query = "DELETE FROM lelang WHERE id_lelang ='$id'";
echo $query;

if (!mysqli_query($koneksi, $query)) {
    die(mysqli_error($koneksi));
} else {
    echo '<script>alert("Data Berhasil Dihapus !!!");
    window.location.href="../../index.php?page=data_lelang"</script>';
}