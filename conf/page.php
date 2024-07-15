<?php
if (isset($_GET['page'])) {
  $page = $_GET['page'];
  switch ($page) {
      // Beranda
    case 'beranda':
      include 'pages/beranda.php';
      break;

    case 'tambah':
      include 'pages/tambah.php';
      break;

    case 'ubah';
      include 'pages/ubah.php';
      break;


  }
} else {
  include "pages/beranda.php";
}
