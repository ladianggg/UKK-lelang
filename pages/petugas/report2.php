
<?php
ob_start();
include "../../conf/conn.php";
require_once("../../plugins/dompdf/autoload.inc.php");

use Dompdf\Dompdf;
$dompdf = new Dompdf();

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas = $id LIMIT 1");

  if ($row = mysqli_fetch_array($query)) {
    $html = '<center><h3>Data petugas</h3></center><hr/><br/>';
    $html .= '<table border="2" width="100%">
    <tr><th>Nama Petugas</th><tr>Username<th></th><th>Password</th><th>Level</th><th>';
    $html .= "</td><td>".$row['nama_petugas']."</td><td>".$row['username']."</td><td>".$row['password']."</td><td>".$row['level']."</td></tr>";


    $html .= "</table>";
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'potrait');
    $dompdf->render();
    $dompdf->stream('laporan_petugas.pdf');
  } else {
    echo "Data petugas tidak ditemukan.";
  }
} else {
  $query = mysqli_query($connection, "SELECT * FROM petugas ORDER BY id_petugas DESC");

  $html = '<center><h3>Daftar Nama petugas</h3></center><hr/><br/>';
  $html .= '<table border="1" width="100%">
  <tr><th>Nama Petugas </th><tr>Username <th></tr><th>Password </th><th>Level </th><th>';
  while ($row = mysqli_fetch_array($query)) {
  $html .= "</td><td>".$row['nama_petugas']."</td><td>".$row['username']."</td><td>".$row['password']."</td><td>".$row['level']."</td></tr>";

  }

  $html .= "</table>";
  $dompdf->loadHtml($html);
  $dompdf->setPaper('A4', 'potrait');
  $dompdf->render();
  $dompdf->stream('daftar_nama_petugas.pdf');
}
?>