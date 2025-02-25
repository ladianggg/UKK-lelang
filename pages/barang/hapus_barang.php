<?php
include "../../conf/conn.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    include "../../conf/conn.php";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    
        // Cek apakah ID ada di database sebelum menghapus
        $cek = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang = '$id'");
        if (mysqli_num_rows($cek) > 0) {
            // Hapus data terkait di tabel lelang terlebih dahulu
            mysqli_query($koneksi, "DELETE FROM lelang WHERE id_barang = '$id'");
    
            // Hapus data dari tabel barang
            $query = "DELETE FROM barang WHERE id_barang = '$id'"; 
            if (mysqli_query($koneksi, $query)) {
                echo '<script>alert("Data berhasil dihapus!"); window.location.href="../../index.php?page=data_barang";</script>';
            } else {
                echo '<script>alert("Gagal menghapus data: ' . mysqli_error($koneksi) . '");</script>';
            }
        } else {
            echo '<script>alert("Data tidak ditemukan!"); window.location.href="../../index.php?page=data_barang";</script>';
        }
    } else {
        echo '<script>alert("ID tidak ditemukan dalam parameter!"); window.location.href="../../index.php?page=data_barang";</script>';
    }}
    ?>
