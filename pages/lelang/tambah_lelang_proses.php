<?php
include "../../conf/conn.php";

if ($_POST) {

    $id_barang = isset($_POST['id_barang']) ? $_POST['id_barang'] : '';
    $nama = $_POST['nama'];
    // $harga_awal = isset($_POST['harga_awal']) ? $_POST['harga_awal'] : '';
    // $id_user = $_POST['id_user'];
    $id_petugas = isset($_POST['id_petugas']) ? $_POST['id_petugas'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : '';

    // Define $id_lelang or set it to an appropriate value
    $id_lelang = generateInvoiceNumber(); // Replace with the actual value

    $query = "INSERT INTO lelang ( id_barang, nama, tanggal, id_petugas, status) VALUES ( '$id_barang', '$nama', NOW(), '$id_petugas', '$status')";
     echo $query;
    if (!mysqli_query($koneksi, $query)) {
        die(mysqli_error($koneksi));
    } else {
        echo '<script>alert("Data Berhasil Ditambahkan !!!");
        window.location.href="../../index.php?page=data_lelang"</script>';
    }
}

function generateInvoiceNumber() {
    // Mendapatkan tanggal saat ini
    $date = new DateTime();
    $currentDate = $date->format('Ymd');

    // Mendapatkan waktu saat ini
    $currentTime = time();

    // Menggabungkan tanggal dan waktu untuk membuat nomor faktur
    $invoiceNumber = 'INV' . $currentDate . $currentTime;   

    return $invoiceNumber;
}
?>
