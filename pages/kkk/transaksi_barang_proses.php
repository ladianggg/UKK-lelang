<?php
include "../../conf/conn.php";

if (isset($_POST ['$id_barang'])) {
     $id_barang = $_POST['id_barang']; // Sesuaikan dengan nama kolom yang benar
    // $user = $_POST['user'];
    $penawaran_harga = $_POST['penawaran_harga'];
    $id_user = $_POST['id_user'];
    $id_lelang = $_POST['id_lelang'];
    // $status = $_POST['status'];

    $query = "INSERT INTO history_lelang (id_barang, penawaran_harga, id_user, id_lelang, ) 
              VALUES ('$id_barang', '$penawaran_harga', '$id_user', '$id_lelang',)";

    if (mysqli_query($koneksi, $query)) {
        echo '<script>alert("Data Berhasil Ditambahkan !!!");
              window.location.href="../../index.php?page=transaksi_barang"</script>';
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>
