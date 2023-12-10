<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      HISTORY LELANG
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
      <li class="active">HISTORY LELANG</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <!-- <a href="index.php?page=tambah_masyarakat" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
          <a href="pages/report.php" class="btn btn-info" role="button" title="Generate PDF"><i class="glyphicon glyphicon-file"></i> Print PDF</a>        -->
          </div>
          <div class="box-body table-responsive">
            <table id="history lelang" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>ID LELANG</th>
                  <th>ID BARANG</th>
                  <th>ID USER</th>
                  <th>PENAWARAN HARGA</th>
                  <th>STATUS</th>
                  <!-- <th>AKSI</th> -->

                </tr>
              </thead>
              <tbody>

                <?php
                include "conf/conn.php";
                if (isset($_GET['id'])) {
                  $id_barang = $_GET['id'];
                  $id_lelang = 'id_lelang';
                }
                //  $id_petugas = 'id_petugas';
                $id_user = 'id_user';
                $penawaran_harga = 'penawaran_harga';
                $harga_awal = 'harga_awal';
                $no = 0;
                //                $query = mysqli_query($koneksi, "INSERT INTO history_lelang (id_barang, penawaran_harga, id_user, ) VALUES ('$id_barang', '$penawaran_harga', '$id_user',)");
                // echo $query;

                $query = mysqli_query($koneksi, "SELECT * FROM history_lelang where id_lelang = $id_barang ORDER BY penawaran_harga DESC");
                // echo "SELECT * FROM masyarakat ORDER BY id_user DESC";
                //  or die (mysqli_error($koneksi)); 
              
                while ($row = mysqli_fetch_array($query)) {

                ?>

                  <tr>
                    <td><?php echo $no = $no + 1; ?></td>
                    <td><?php echo $row['id_lelang']; ?></td>
                    <td><?php echo $row['id_barang']; ?></td>
                    <td><?php echo $row['id_user']; ?></td>
                    <td>
                      <?php
                      echo "<p style='font-size: 14px;'> Rp " . number_format($row['penawaran_harga'], 0, ',', '.') . "</p>"; ?>
                    </td>

                    <td>
                      <?php

                      if ( $no == 1) {
                        echo "<p> pemenang  !</p>"; 
                      } else {
                        echo '<p> bukan pemenang</p>';
                      }
                      ?>

                    </td>


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
    $('#masyarakat').DataTable();
  });
</script>