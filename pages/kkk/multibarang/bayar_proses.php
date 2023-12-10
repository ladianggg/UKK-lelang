<div class="content-wrapper">

<?php 
session_start(); 
include "../../conf/conn.php"; 
if($_POST) 
{ 
date_default_timezone_set('Asia/Jakarta'); 
$tgl=date("Y-m-d H:i:s"); 
//echo $tgl; 
$total_belanja = $_POST['total']; 
//echo $total_belanja; 
//var_dump($_SESSION['kantong']); 
if (!empty($_SESSION['kantong_belanja'])) {  
$cart = unserialize(serialize($_SESSION['kantong_belanja']));  
$total_item=count($cart); 
//echo $total_item; 
$pegawai = $_SESSION['username']; 
//echo $user; 
//masukkan data ke tabel order 
 
$query = ("INSERT INTO jual(id,tgl,pegawai,total) 
 VALUES ('','".$tgl."','".$pegawai."','".$total_belanja."')"); 
//echo $query; 
if(!mysqli_query($koneksi,$query)){ 
    die(mysqli_error($koneksi)); 
    }else{ 
        //echo "data order sukses ditambahkan"; 
      } 
       
 
//cek id_order terbaru 
$check_id = mysqli_query($koneksi,"SELECT id FROM `jual` order by id desc limit 1"); 
$row = mysqli_fetch_array($check_id); 
$id_jual= $row['id']; 
//masukkan data ke tabel detail order 
for ($i=0; $i<count($cart); $i++) { 
$input = "insert into detail_jual(id,id_jual,id_barang,harga,qty,total) 
VALUES 
('','".$id_jual."','".$cart[$i]['id']."','".$cart[$i]['harga']."','".$cart[$i]['p
 embelian']."','".$cart[$i]['harga']*$cart[$i]['pembelian']."')"; 
if(!mysqli_query($koneksi,$input)){ 
    die(mysqli_error($koneksi)); 
    }else{ 
        //echo "data detail_order sukses ditambahkan"; 
      } 
        } 
} 
    else{ 
        echo "<br>kantong kosong"; 
    } 
//bersihkan kantong 
    unset($_SESSION["kantong_belanja"]); 
    header('Location: ../../index.php?page=data_multibarang'); 
 
} 
?>