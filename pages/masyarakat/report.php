<?php
ob_start();
include "../conf/conn.php";
require_once("../plugins/dompdf/autoload.inc.php");

use Dompdf\Dompdf;
$dompdf = new Dompdf();
//$id = $_GET['id'];
$query = mysqli_query($koneksi,"SELECT * FROM masyarakat");

$html = '<center><h3>Daftar Nama Masyarakat</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
<tr><th>Nama lengkap</th><th>Username</th><th>Password</th><th>telp</th><th>';
$no = 1;  
while($row = mysqli_fetch_array($query))
print_r($row);
{
 $html .= "<tr><td>".$no."</td><td>".$row['nama_lengkap']."</td><td>".$row['username']."</td><td>".$row['password']."</td><td>".$row['telp']."</td></tr>";
 $no++;
}

$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_masyarakat.pdf');
?>