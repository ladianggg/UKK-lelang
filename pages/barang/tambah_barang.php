<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      TAMBAH BARANG
      </h1>
      <ol class="breadcrumb">
        <li><a href=".php"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">TAMBAH BARANG</li>
      </ol>
    </section>
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahBarangModal">
  Tambah Barang
</button>

<!-- Modal -->
<div class="modal fade" id="tambahBarangModal" tabindex="-1" role="dialog" aria-labelledby="tambahBarangLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahBarangLabel">Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="pages/barang/tambah_barang_proses.php" enctype="multipart/form-data">
          <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
          </div>
          <input type="hidden" name="tanggal" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
          <div class="form-group">
            <label>Harga Awal</label>
            <input type="text" name="harga_awal" class="form-control" placeholder="Harga Awal" required>
          </div>
          <div class="form-group">
            <label>Deskripsi Barang</label>
        
