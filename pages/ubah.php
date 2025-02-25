<?php
$q="SELECT * FROM event WHERE id='".$_GET['id']."'";
$query = mysqli_query($koneksi,$q );
echo $q;
//  die (mysqli_error($koneksi));
$row = mysqli_fetch_array($query);
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      UBAH DATA
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">UBAH DATA</li>
      </ol>
<<<<<<< HEAD:pages/petugas/tambah_petugas.php

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
            <form role="form" method="post" action="pages/petugas/tambah_petugas_proses.php">
=======
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="pages/ubah_proses.php">
>>>>>>> d3f811c111654e47608021c90f73765bb31bc5dc:pages/ubah.php
              <div class="box-body">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="form-group">
                  <label>Nama Acara</label>
                  <input type="text" name="nama_acara" value="<?php echo $row['nama_acara']; ?>" class="form-control" placeholder="Nama Acara" required>
                </div>
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" name="tanggal" value="<?php echo $row['tanggal']; ?>" class="form-control" placeholder="Tanggal" required>
                </div>
                <div class="form-group">
                  <label>Lokasi</label>
                  <input type="text" name="lokasi" value="<?php echo $row['lokasi']; ?>" class="form-control" placeholder="Lokasi" required>
                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <input type="text" name="deskripsi" value="<?php echo $row['deskripsi']; ?>" class="form-control" placeholder="Deskripsi" required>
                </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
              </div>
            </form>
<<<<<<< HEAD:pages/petugas/tambah_petugas.php
          

=======
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->
>>>>>>> d3f811c111654e47608021c90f73765bb31bc5dc:pages/ubah.php
