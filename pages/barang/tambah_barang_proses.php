<?php
include "../../conf/conn.php";
if($_POST)
{
$nama_barang = $_POST['nama_barang'];
$tanggal = $_POST['tanggal'];
$harga_awal = $_POST['harga_awal'];
$deskripsi_barang = $_POST['deskripsi_barang'];
//$foto = $_POST['foto']['name'];
$foto = $_FILES['foto']['name'];
//echo $gambar_produk;

if($foto != "") {
    $ekstensi_diperbolehkan = array('png','jpg', 'jpeg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$foto; //menggabungkan angka acak dengan nama file sebenarnya
          if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                  move_uploaded_file($file_tmp, '../../pages/foto/'.$nama_gambar_baru);
$query = ("INSERT INTO barang (nama_barang,tanggal,harga_awal,deskripsi_barang,foto) VALUES ('".$nama_barang."','".$tanggal."','".$harga_awal."','".$deskripsi_barang."','".$nama_gambar_baru."')");
if (!mysqli_query($koneksi, $query)) {
    die(mysqli_error($koneksi));
    echo $query;
} else {
    echo '<script>alert("Data Berhasil Ditambah !!!");
    window.location.href="../../index.php?page=data_barang"</script>';
}
          }
}
}   

?>
