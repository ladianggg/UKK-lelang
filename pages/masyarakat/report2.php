<?php
ob_start();
include "../conf/conn.php";
require_once("../plugins/dompdf/autoload.inc.php");

use Dompdf\Dompdf;
$dompdf = new Dompdf();

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE id_user = $id LIMIT 1");

  if ($row = mysqli_fetch_array($query)) {
    $html = '<center><h3>Data masyarakat</h3></center><hr/><br/>';
    $html .= '<table border="1" width="100%">
    <tr><th>Nama lengkap</th><th>Username</th><th>Password</th><th>telp</th><th>';
    $html .= "<tr><td>".$row['nama_lengkap']."</td><td>".$row['username']."</td><td>".$row['password']."</td><td>".$row['']."</td></tr>";

    $html .= "</table>";
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'potrait');
    $dompdf->render();
    $dompdf->stream('laporan_masyarakat.pdf');
  } else {
    echo "Data masyarakat tidak ditemukan.";
  }
} else {
  $query = mysqli_query($connection, "SELECT * FROM masyarakat ORDER BY id_user DESC");

  $html = '<center><h3>Daftar Nama masyarakat</h3></center><hr/><br/>';
  $html .= '<table border="1" width="100%">
  <tr><th>Nama lengkap</th><th>Username</th><th>Password</th><th>telp</th><th>';
  
  while ($row = mysqli_fetch_array($query)) {
    $html .= "<tr><td>".$row['nama_lengkap']."</td><td>".$row['username']."</td><td>".$row['password']."</td><td>".$row['telp']."</td></tr>";
  }

  $html .= "</table>";
  $dompdf->loadHtml($html);
  $dompdf->setPaper('A4', 'potrait');
  $dompdf->render();
  $dompdf->stream('daftar_nama_masyarakat.pdf');
}
?>