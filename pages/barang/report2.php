<?php
ob_start();
include "../../conf/conn.php";
require_once("../../plugins/dompdf/autoload.inc.php");

use Dompdf\Dompdf;
$dompdf = new Dompdf();

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang = $id LIMIT 1");

  if ($row = mysqli_fetch_array($query)) {
    $html = '<center><h3>Data barang</h3></center><hr/><br/>';
    $html .= '<table border="2" width="100%">
    <tr><th>Kode barang</th><tr><th>Judul </th><th>Penulis</th><th>Penerbit </th><th>Tahun Penerbit</th><th>Stok</th></tr>';
    $html .= "</td><td>".$row['nama_barang']."</td><td>".$row['harga']."</td><td>".$row['harga_awal']."</td><td>".$row['deskripsi_barang']."</td></tr>".$row['foto']."</td></tr>";


    $html .= "</table>";
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'potrait');
    $dompdf->render();
    $dompdf->stream('laporan_barang.pdf');
  } else {
    echo "Data barang tidak ditemukan.";
  }
} else {
  $query = mysqli_query($connection, "SELECT * FROM barang ORDER BY id_barang DESC");

  $html = '<center><h3>Daftar Nama barang</h3></center><hr/><br/>';
  $html .= '<table border="1" width="100%">
  <tr><th>Nama Barang</th><tr>tanggal<th></th><th>Harga Awal</th><th>Deskripsi Barang</th><th>Foto</th><th>';
  while ($row = mysqli_fetch_array($query)) {
    $html .= "</td><td>".$row['kode_barang']."</td><td>".$row['judul_barang']."</td><td>".$row['penulis_barang']."</td><td>".$row['penerbit_barang']."</td></tr>".$row['tahun_penerbit']."</td></tr>".$row['stok']."</td></tr>";

  }

  $html .= "</table>";
  $dompdf->loadHtml($html);
  $dompdf->setPaper('A4', 'potrait');
  $dompdf->render();
  $dompdf->stream('daftar_nama_barang.pdf');
}
?>