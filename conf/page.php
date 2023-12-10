<?php
if (isset($_GET['page'])) {
  $page = $_GET['page'];
  switch ($page) {
      // Beranda
    case 'data_petugas':
      include 'pages/petugas/data_petugas.php';
      break;

    case 'tambah_petugas':
      include 'pages/petugas/tambah_petugas.php';
      break;

    case 'ubah_petugas';
      include 'pages/petugas/ubah_petugas.php';
      break;

    case 'data_barang':
      include 'pages/barang/data_barang.php';
      break;

    case 'tambah_barang':
      include 'pages/barang/tambah_barang.php';
      break;

    case 'ubah_barang';
      include 'pages/barang/ubah_barang.php';
      break;

    case 'data_masyarakat':
      include 'pages/masyarakat/data_masyarakat.php';
      break;

    case 'tambah_masyarakat':
      include 'pages/masyarakat/tambah_masyarakat.php';
      break;

    case 'ubah_masyarakat';
      include 'pages/masyarakat/ubah_masyarakat.php';
      break;

    case 'data_lelang':
      include 'pages/lelang/data_lelang.php';
      break;

    case 'tambah_lelang':
      include 'pages/lelang/tambah_lelang.php';
      break;

      
    case 'ubah_lelang':
      include 'pages/lelang/ubah_lelang.php';
      break;

    case 'data_history_lelang';
      include 'pages/history lelang/data_history_lelang.php';
      break;

    case 'data_history_lelang_kelompok';
      include 'pages/history lelang/data_history_lelang_kelompok.php';
      break;


    case 'detail';
      include 'pages/history lelang/detail.php';
      break;

    case 'menu_lelang';
      include 'pages/history lelang/menu_lelang.php';
      break;

    case 'ubah_history';
      include 'pages/history lelang/ubah_history.php';
      break;
  }
} else {
  include "pages/beranda.php";
}
