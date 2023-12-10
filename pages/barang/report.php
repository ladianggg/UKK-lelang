<?php
ob_start();
include "../../conf/conn.php";
require_once("../../plugins/dompdf/autoload.inc.php");

use Dompdf\Dompdf;
$dompdf = new Dompdf();
//$id = $_GET['id'];
$query = mysqli_query($koneksi,"select * from barang");

$html = '<center><h3>Daftar Barang </h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
<tr><th>Nama Barang</th><tr>tanggal<th></th><th>Harga Awal</th><th>Deskripsi Barang</th><th>Foto</th><th>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
$html .= "<tr><td>".$no."</td><td>".$row['nama_barang']."</td><td>".$row['tanggal']."</td><td>".$row['harga_awal']."</td><td>".$row['deskripsi_barang']."</td></tr>".$row['foto']."</td></tr>";
 $no++;
}

$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_.pdf');
?>

