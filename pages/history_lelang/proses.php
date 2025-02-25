<?php
// pages/history lelang/proses.php

if (isset($_POST['change_status'])) {
    $id_barang = $_POST['id_barang'];
    $id_lelang = $_POST['id_lelang'];

    // Perform the necessary logic to change the status
    // Update the status in your database or perform any other operations

    // For example, updating the status to a new value (you should adapt this according to your actual logic)
    $status = 'Terpilih';

    // Assuming you have a database connection, update the status
    include "../../conf/conn.php";
    $updateQuery = "UPDATE lelang SET status = '$status' WHERE id_lelang = '$id_lelang'";
    
    if (mysqli_query($koneksi, $updateQuery)) {
        echo $status; // Return the updated status to be displayed on the page
    } else {
        echo "Error updating status: " . mysqli_error($koneksi);
    }
    exit(); // Stop further execution after handling the status change
}
?>
