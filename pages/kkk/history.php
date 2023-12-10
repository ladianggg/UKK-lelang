<?php
include "../../conf/conn.php";

// Check if id_barang is set in the $_GET array
if (isset($_GET['id_barang'])) {
    $id_barang = $_GET['id_barang'];

    // Check if a record with the given id_barang already exists
    $check_query = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
    $result = mysqli_query($koneksi, $check_query);

    if (!$result) {
        die(mysqli_error($koneksi));
    }


        // If a record with id_barang doesn't exist, insert a new one
        $insert_query = "INSERT INTO barang (id_barang) VALUES ('$id_barang')";
        if (!mysqli_query($koneksi, $insert_query)) {
            die(mysqli_error($koneksi));
        } else {
            echo '<script>alert("Data Berhasil Disimpan !!!");
                  window.location.href="../../index.php?page=data_history_lelang"</script>';
        }
    }
 else {
    // Handle the case when id_barang is not set
    echo "Error: Missing required parameter 'id_barang'.";
}
?>
