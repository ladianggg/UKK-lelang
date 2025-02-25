<?php
ob_start();
include "../../conf/conn.php";
require_once("../../plugins/dompdf/autoload.inc.php");

use Dompdf\Dompdf;
$dompdf = new Dompdf();
//$id = $_GET['id'];
$query = mysqli_query($koneksi,"select * from petugas");

$html = '<center><h3>Daftar Nama Petugas</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
<tr><th>Nama Petugas </th><tr>Username <th></th><th>Password </th><th>Level </th><th>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
 $html .= "<tr><td>".$no."</td><td>".$row['nama_petugas']."</td><td>".$row['username']."</td><td>".$row['password']."</td><td>".$row['level']."</td></tr>";
 $no++;
}

$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_petugas.pdf');
?>

