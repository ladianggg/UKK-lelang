<?php
ob_start();
include "../conf/conn.php";
require_once("../plugins/dompdf/autoload.inc.php");

use Dompdf\Dompdf;
$dompdf = new Dompdf();
//$id = $_GET['id'];
$query = mysqli_query($koneksi,"select * from lelang");

$html = '<center><h3>Daftar Nama lelang</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
<tr><th>Id Barang</th><th>Tanggal</th><th>Harga Awal</th><th>Id User</th><th>Id Petugas</th><th>status</th><th>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
 $html .= "<tr><td>".$no."</td><td>".$row['id_barang']."</td><td>".$row['tanggal']."</td><td>".$row['harga_awal']."</td><td>".$row['id_user']."</td></tr>".$row['id_petugas']."</td></tr>".$row['status']."</td></tr>";
 $no++;
}

$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_lelang.pdf');
?>