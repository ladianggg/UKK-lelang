<?php
if (!empty($_SESSION['kantong_belanja'])) {
?>

  <div class="content-wrapper">
    <section class="content-header">
      <h4>Daftar Pesanan Anda</h4>
      <br>

      <table class="table table-bordered table-hover">
        <thead>
          <tr align="center">
            <th>#</th>
            <th>NAMA MASAKAN</th>
            <th>PEMBELIAN</th>
            <th>HARGA</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($_SESSION['kantong_belanja'])) {
            $cart = unserialize(serialize($_SESSION['kantong_belanja']));
            $index = 0;
            $no = 1;
            $total = 0;
            $total_bayar = 0;
            for ($i = 0; $i < count($cart); $i++) {
              $total = $_SESSION['kantong_belanja'][$i]['harga'] *
                $_SESSION['kantong_belanja'][$i]['pembelian'];
              $total_bayar += $total;
          ?>
              <tr>
                <td align="center"><?= $no++; ?></td>
                <td><?= $cart[$i]['nama_masakan']; ?></td>
                <td align="center"><?= $cart[$i]['pembelian']; ?></td>
                <td><?= 'Rp ' . number_format($cart[$i]['harga'], 0, ',', '.') ?></td>
                <td><?= 'Rp ' . number_format($total, 0, ',', '.') ?></td>
              </tr>
            <?php
              $index++;
            }
            ?>
            <tr>
              <td colspan="4" align="right"><strong>Total Bayar</strong></td>
              <td><strong><?= 'Rp ' . number_format($total_bayar, 0, ',', '.') ?></strong></td>
              <td align="center">
              </td>
            </tr>
            <form method="POST" action="pages/pesan/pesan_proses.php">
              <tr>
                <td>Total Belanja</td>
                <td><input class="form-control" type="number" name="total_bayar" id="total" value="<?= $total_bayar; ?>" readonly></td>
              </tr>
              <tr>
                <td>No Meja</td>
                <td><input class="form-control pencarian" type="text" name="no_meja" id="no_meja" placeholder="Pilih No Meja" required></td>
              </tr>
              <input class="form-control pencarian" type="hidden" name="id_order" id="id_order" required readonly>
              <tr>
                <td colspan="2" align="right"><button type="submit" class="btn btn-primary" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i>
                    Pesan</button>
                </td>
              </tr>
            </form>
        </tbody>

      </table>
      <br>
      <hr>
  <?php
          }
        }
  ?>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">DATA BARANG</h4>
        </div>
        <div class="modal-body">
          <table id="produk" class="table table-bordered">
            <thead>
              <tr>
                <th>NO</th>
                <th>NO MEJA</th>
                <th>TANGGAL</th>
                <th>NAMA USER</th>
                <th>KETERANGAN</th>
              </tr>
            </thead>
            <tbody>

              <?php
              include "conf/conn.php";
              $no = 0;
              $query = mysqli_query($koneksi, "SELECT `order`.*, user.nama_user FROM `order`
                INNER JOIN user ON `order`.id_user = user.id_user
                WHERE `order`.keterangan = 'belum pesan'  
                ORDER BY `order`.id_order DESC")
                or die(mysqli_error($koneksi));

              while ($row = mysqli_fetch_array($query)) {
              ?>

                <tr class="pilih" data-id_order="<?php echo $row['id_order']; ?>" data-no_meja="<?php echo $row['no_meja']; ?>">
                  <td><?php echo $no = $no + 1; ?></td>
                  <td><?php echo $row['no_meja']; ?></td>
                  <td><?php echo $row['tanggal']; ?></td>
                  <td><?php echo $row['nama_user']; ?></td>
                  <td><?php echo $row['keterangan']; ?></td>
                  <td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box -->
  </div>
  </div>
  </section>
  <!-- /.content -->
  <!-- /.content-wrapper -->
  <script type="text/javascript">
    $(document).ready(function() {
      $(".pencarian").focusin(function() {
        $("#myModal").modal('show'); // ini fungsi untuk menampilkan modal
      });
      $('#produk').DataTable();
    });
    $(document).on('click', '.pilih', function(e) {
      document.getElementById("id_order").value = $(this).attr('data-id_order');
      document.getElementById("no_meja").value = $(this).attr('data-no_meja');
      $('#myModal').modal('hide');
    });
  </script>