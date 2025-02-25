<?php
include "../../conf/conn.php";

if($_POST) {
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $tanggal = $_POST['tanggal'];
    $harga_awal = $_POST['harga_awal'];
    $deskripsi_barang = $_POST['deskripsi_barang'];
    $foto = $_FILES['foto']['name'];

    if($foto != "") {
        $ekstensi_diperbolehkan = array('png','jpg', 'jpeg');
        $x = explode('.', $foto);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['foto']['tmp_name'];
        $angka_acak = rand(1,999);
        $nama_gambar_baru = $angka_acak.'-'.$nama_barang;

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, '../../pages/foto/'.$nama_gambar_baru);

            $query = "UPDATE barang SET nama_barang='$nama_barang',tanggal='$tanggal',harga_awal='$harga_awal',deskripsi_barang='$deskripsi_barang', foto='$nama_gambar_baru' WHERE id_barang ='$id_barang'";
            
            if(!mysqli_query($koneksi, $query)) {
                die(mysqli_error($koneksi));
            } else {
                echo '<script>alert("Data Berhasil Ditambah !!!");
                window.location.href="../../index.php?page=data_barang"</script>';
            }
        }
    }
}
?>
