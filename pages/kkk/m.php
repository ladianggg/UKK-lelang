<div class="form-group">
                <label>ID Peminjaman</label>
                <input type="text" name="id_peminjaman" id="id_peminjaman" class="form-control pencarian-buku" placeholder="ID Buku" required>
              </div>
              <div class="form-group">
                <label>Judul Buku</label>
                <input type="text" id="judul_buku" name="judul_buku" class="form-control pencarian-buku" placeholder="Judul Buku" readonly>
              </div>
              <div class="form-group">
                <label>Nama Anggota</label>
                <input type="text" id="nama_anggota" name="nama_anggota" class="form-control pencarian-buku" placeholder="Nama Anggota" readonly>
              </div>
              <div class="form-group">
                <label>Nama Petugas</label>
                <input type="text" id="nama_petugas" name="nama_petugas" class="form-control pencarian-buku" placeholder="Nama Petugas" readonly>
              </div>

              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
              </div>
          </form>
        </div>
        <div class="modal fade" id="modalBuku" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">DATA BUKU</h4>
              </div>
              <div class="modal-body">
                <table id="buku" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Tanggal Peminjaman</th>
                      <th>Tenggat Kembali</th>
                      <th>Judul Buku</th>
                      <th>Nama Anggota</th>
                      <th>Nama Petugas</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include "conf/conn.php";
                    $no = 0;
                    $query = mysqli_query($koneksi, "SELECT peminjaman.*, buku.kode_buku, buku.judul_buku, 
                    anggota.kode_anggota, anggota.nama_anggota, petugas.nama_petugas, petugas.jabatan_petugas 
                FROM peminjaman
                INNER JOIN buku ON peminjaman.id_buku = buku.id_buku
                INNER JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota
                INNER JOIN petugas ON peminjaman.id_petugas = petugas.id_petugas
                ORDER BY peminjaman.id_peminjaman DESC")
                      or die(mysqli_error($koneksi));

                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                      <tr class="pilih-buku" data-id_peminjaman="<?php echo $row['id_peminjaman']; ?>" data-judul_buku="<?php echo $row['judul_buku']; ?>" data-nama_anggota="<?php echo $row['nama_anggota']; ?>" data-nama_petugas="<?php echo $row['nama_petugas']; ?>">
                        <td><?php echo $row['id_peminjaman']; ?></td>
                        <td><?php echo $row['tanggal_pinjam']; ?></td>
                        <td><?php echo $row['tanggal_kembali']; ?></td>
                        <td><?php echo $row['judul_buku']; ?></td>
                        <td><?php echo $row['nama_anggota']; ?></td>
                        <td><?php echo $row['nama_petugas']; ?></td>
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
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $(".pencarian-buku").focusin(function() {
      $("#modalBuku").modal('show');
    });
    $('#buku').DataTable();
  });

  $(document).on('click', '.pilih-buku', function(e) {
    document.getElementById("id_peminjaman").value = $(this).attr('data-id_peminjaman');
    document.getElementById("judul_buku").value = $(this).attr('data-judul_buku');
    document.getElementById("nama_anggota").value = $(this).attr('data-nama_anggota');
    document.getElementById("nama_petugas").value = $(this).attr('data-nama_petugas');
    $('#modalBuku').modal('hide');
  });
</script>