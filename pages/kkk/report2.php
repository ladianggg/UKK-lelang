<?php
ob_start();
include "../conf/conn.php";
require_once("../plugins/dompdf/autoload.inc.php");

use Dompdf\Dompdf;
$dompdf = new Dompdf();

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = mysqli_query($koneksi, "SELECT * FROM lelang WHERE id_lelang = $id LIMIT 1");

  if ($row = mysqli_fetch_array($query)) {
    $html = '<center><h3>Data lelang</h3></center><hr/><br/>';
    $html .= '<table border="1" width="100%">
    <tr><th>Id Barang</th><th>Tanggal</th><th>Harga Awal</th><th>Id User</th><th>Id Petugas</th><th>status</th><th>';
    $html .= "</td><td>".$row['id_barang']."</td><td>".$row['tanggal']."</td><td>".$row['harga_awal']."</td><td>".$row['id_user']."</td></tr>".$row['id_petugas']."</td></tr>".$row['status']."</td></tr>";
    $html .= "</table>";
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'potrait');
    $dompdf->render();
    $dompdf->stream('laporan_lelang.pdf');
  } else {
    echo "Data lelang tidak ditemukan.";
  }
} else {
  $query = mysqli_query($connection, "SELECT * FROM lelang ORDER BY id_lelang DESC");

  $html = '<center><h3>Daftar Nama lelang</h3></center><hr/><br/>';
  $html .= '<table border="1" width="100%">
  <tr><th>Id Barang</th><th>Tanggal</th><th>Harga Awal</th><th>Id User</th><th>Id Petugas</th><th>status</th><th>';
  
  while ($row = mysqli_fetch_array($query)) {
    $html .= "</td><td>".$row['id_barang']."</td><td>".$row['tanggal']."</td><td>".$row['harga_awal']."</td><td>".$row['id_user']."</td></tr>".$row['id_petugas']."</td></tr>".$row['status']."</td></tr>";
  }

  $html .= "</table>";
  $dompdf->loadHtml($html);
  $dompdf->setPaper('A4', 'potrait');
  $dompdf->render();
  $dompdf->stream('daftar_nama_lelang.pdf');
}
?>