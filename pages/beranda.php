<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      DATA ACARA
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
      <li class="active">DATA ACARA</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
          <a href="index.php?page=tambah" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
          <a href="pages/report.php" class="btn btn-info" role="button" title="Generate PDF"><i class="glyphicon glyphicon-file"></i> Print PDF</a>  
        </div>
          <div class="box-body table-responsive">
            <table id="event" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>NAMA ACARA</th>
                  <th>TANGGAL</th>
                  <th>LOKASI</th>
                  <th>DESKRIPSI</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>

                <?php
                include "conf/conn.php";
                $no = 0;

                $query = mysqli_query($koneksi, "SELECT * FROM event ORDER BY id DESC");
                
                //  or die (mysqli_error($koneksi)); 
                while ($row = mysqli_fetch_array($query)) {
                ?>

                  <tr>
                    <td><?php echo $no = $no + 1; ?></td>
                    <td><?php echo $row['nama_acara']; ?></td>
                    <td><?php echo $row['tanggal']; ?></td>
                    <td><?php echo $row['lokasi']; ?></td>
                    <td><?php echo $row['deskripsi']; ?></td>

                    <td>
                      <a href="index.php?page=ubah&id=<?= $row['id']; ?>" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i></a>
                      <a href="pages/hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger" role="button" title="Hapus Data"><i class="glyphicon glyphicon-trash"></i></a>
                      <a href="pages/report2.php?id=<?= $row['id']; ?>" class="btn btn-info" role="button" title="Generate PDF"><i class="glyphicon glyphicon-file"></i></a>

                    </td>
                  </tr>

                <?php } ?>

              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Javascript Datatable -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#event').DataTable();
  });
</script>