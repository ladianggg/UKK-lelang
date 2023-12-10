<?php
$query = mysqli_query($koneksi, "SELECT * FROM lelang WHERE id_lelang='".$_GET['id']."'");
//  die (mysqli_error($koneksi));
$row = mysqli_fetch_array($query);
// print_r($row);
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      UBAH LELANG
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">UBAH LELANG</li>
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
            <form role="form" method="post" action="pages/lelang/ubah_lelang_proses.php">
                        <div class="box-body">
                        <div class="form-group">
                                <label>ID Lelang</label>
                                <input type="text" name="id_lelang" id="id_lelang"  value="<?php echo $_GET['id']; ?>" class="form-control pencarian" placeholder="id_lelang" readonly >
                            </div>
                            <div class="form-group">
                                <label>ID Barang</label>
                                <input type="text" name="id_barang" id="id_barang" value="<?php echo $row['id_barang']; ?>" class="form-control pencarian" placeholder="ID" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" id="nama" value="<?php echo $row['nama']; ?>" class="form-control pencarian" placeholder="nama" readonly>
                            </div>
                            <div class="form-group">
                                <label>ID petugas</label>
                                <input type="text" id="id_petugas" name="id_petugas" value="<?php echo $row['id_petugas']; ?>" class="form-control" placeholder="id_petugas"readonly >
                            </div>
                            <div class="form-group">
                                <label>Harga Akhir</label>
                                <input type="number" id="harga_akhir" name="harga_akhir" value="<?php echo $row['harga_akhir']; ?>" class="form-control" placeholder="Harga Akhir" readonly>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="dibuka">Di Buka</option>
                                    <option value="ditutup">Di Tutup</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" title="Simpan Data">
                                <i class="glyphicon glyphicon-floppy-disk"></i> Simpan
                            </button>
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