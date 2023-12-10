<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      TAMBAH BARANG
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">TAMBAH BARANG</li>
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
            <form method="post" action="pages/barang/tambah_barang_proses.php" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
                </div>
                <!-- <div class="form-group"> -->
                  <!-- <label>Tanggal</label> -->
                  <input type="hidden" name="tanggal" class="form-control" value="<?php echo  date('Y-m-d');?>" required>
                <!-- </div> -->
                <div class="form-group">
                  <label>Harga Awal</label>
                  <input type="text" name="harga_awal" class="form-control" placeholder="Harga Awal" required>
                </div>
                <div class="form-group">
                  <label>Deskripsi Barang</label>
                  <input type="text" name="deskripsi_barang" class="form-control" placeholder="Deskripsi Barang" required>
                </div>
                <div class="form-group">
                  <label>Foto</label>
                  <input type="file" class="form-control" name="foto" required/>                
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





