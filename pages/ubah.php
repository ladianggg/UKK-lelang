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
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->