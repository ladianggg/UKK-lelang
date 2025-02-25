<?php
include "../../conf/conn.php";

if ($_POST) {
    $nama_barang = mysqli_real_escape_string($koneksi, $_POST['nama_barang']);
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    $harga_awal = mysqli_real_escape_string($koneksi, $_POST['harga_awal']);
    $deskripsi_barang = mysqli_real_escape_string($koneksi, $_POST['deskripsi_barang']);
    $foto = $_FILES['foto']['name'];

    if ($foto != "") {
        $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg'); // Ekstensi file gambar yang diizinkan
        $x = explode('.', $foto);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['foto']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak . '-' . $foto; // Nama file baru

        if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
            if (move_uploaded_file($file_tmp, '../../pages/foto/' . $nama_gambar_baru)) {
                $query = "INSERT INTO barang (nama_barang, tanggal, harga_awal, deskripsi_barang, foto) 
                          VALUES ('$nama_barang', '$tanggal', '$harga_awal', '$deskripsi_barang', '$nama_gambar_baru')";

                if (mysqli_query($koneksi, $query)) {
                    echo '<script>alert("Data Berhasil Ditambah !!!"); 
                          window.location.href="../../index.php?page=data_barang";</script>';
                } else {
                    echo '<script>alert("Gagal menyimpan data: ' . mysqli_error($koneksi) . '");</script>';
                }
            } else {
                echo '<script>alert("Gagal mengunggah foto.");</script>';
            }
        } else {
            echo '<script>alert("Ekstensi file tidak diperbolehkan.");</script>';
        }
    } else {
        echo '<script>alert("Silakan unggah foto.");</script>';
    }
}
?>
