<!-- <?php
      include "data_history_lelang.php";
      ?> -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>DATA LELANG</h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
      <li class="active">DATA LELANG</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <a href="index.php?page=tambah_lelang" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
            <!-- <a href="pages/report.php" class="btn btn-info" role="button" title="Generate PDF"><i class="glyphicon glyphicon-file"></i> Print PDF</a> -->
          </div>
          <div class="box-body table-responsive">
            <table id="lelang" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>ID BARANG</th>
                  <th>NAMA</th>
                  <th>HARGA AKHIR</th>
                  <th>ID PETUGAS</th>
                  <th>STATUS</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>

                <?php
                include "conf/conn.php";
                $no = 0;
                // $harga_akhir = $_POST ['harga_akhir'];
                // $penawaran_harga = $_GET ['penawaran_harga'];
                
                $query = mysqli_query($koneksi, "SELECT * FROM lelang ORDER BY id_lelang DESC");
                // echo "UPDATE lelang SET harga_akhir='$harga_akhir' WHERE penawaran_harga ='$penawaran_harga'";
                
                
                while ($row = mysqli_fetch_array($query)) {
                  ?>

<tr>
  <td><?php echo $no = $no + 1; ?></td>
  <td><?php echo $row['id_barang']; ?></td>
  <td><?php echo $row['nama']; ?></td>
  <td><?php echo $row['harga_akhir']; ?></td>
  <td><?php echo $row['id_petugas']; ?></td>
  <td><?php echo $row['status']; ?></td>
  <td>
    <a href="index.php?page=ubah_lelang&id=<?= $row['id_lelang']; ?>" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i></a>
  
                 </td>
                  </tr>

                <?php } ?>
              
                <?php 
                if (isset($_GET['id_lelang'])) {
                  $id_lelang = $_GET['id_lelang'];
              
                  // Additional logic to add data to the lelang history
                  // Insert into the lelang history table, update values, etc.
              
                  // For demonstration purposes, let's just display the received data
                  echo "Adding Barang with ID: " . htmlspecialchars($id_barang) . " to Lelang History";
              }
                ?>

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
    $('#lelang').DataTable();
  });
</script>