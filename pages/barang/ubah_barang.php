<?php
$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='".$_GET['id']."'");

//  die (mysqli_error($koneksi));
$row = mysqli_fetch_array($query);
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      UBAH BARANG
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">UBAH BARANG</li>
      </ol>
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
            <form role="form" method="post" action="pages/barang/ubah_barang_proses.php" enctype="multipart/form-data">
              <div class="box-body">
                <input type="hidden" name="id_barang" value="<?php echo $row['id_barang']; ?>">
                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" name="nama_barang" value="<?php echo $row['nama_barang']; ?>" class="form-control" placeholder="Nama Barang" required>
                </div>
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" name="tanggal" value="<?php echo $row['tanggal']; ?>" class="form-control" placeholder="Tanggal" required>
                </div>
                <div class="form-group">
                  <label>Harga Awal</label>
                  <input type="text" name="harga_awal" value="<?php echo $row['harga_awal']; ?>" class="form-control" placeholder="Harga Awal" required>
                </div>
                <div class="form-group">
                  <label>Deskripsi Barang</label>
                  <input type="text" name="deskripsi_barang" value="<?php echo $row['deskripsi_barang']; ?>" class="form-control" placeholder="Deskripsi Barang" required>
                </div>
               
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->