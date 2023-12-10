<?php
include "../../conf/conn.php";

if ($_POST) {
    $id_barang = $_POST['id_barang'];
    $id_petugas = $_POST['id_petugas'];
    $id_lelang = $_POST['id_lelang'];
    $harga_akhir = $_POST['harga_akhir'];
    $status = $_POST['status'];

    $query = "UPDATE lelang SET  status='$status' WHERE id_lelang ='$id_lelang ' ";
    
    // Debugging: Uncomment the line below to see the SQL query
    // echo $query;

    if (!mysqli_query($koneksi, $query)) {
        die("Error: " . mysqli_error($koneksi));
    } else {
        echo '<script>alert("Data Berhasil Diubah !!!");
              window.location.href="../../index.php?page=data_lelang"</script>';
    }
} else {
    echo "No data received from the form.";
}
?>
