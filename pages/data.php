<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      DATA PETUGAS
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
      <li class="active">DATA PETUGAS</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
        <div class="box box-primary">
          <div class="box-header">
            <a href="index.php?page=tambah_petugas" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
            <a href="pages/petugas/report.php" class="btn btn-info" role="button" title="Generate PDF"><i class="glyphicon glyphicon-file"></i> Print PDF</a>
          </div>
          <div class="box-body table-responsive">
            <table id="petugas" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>NAMA PETUGAS</th>
                  <th>USERNAME</th>
                  <th>PASSWORD</th>
                  <th>LEVEL</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>

                <?php
                include "conf/conn.php";
                $no = 0;

                $query = mysqli_query($koneksi, "SELECT * FROM petugas ORDER BY id_petugas DESC");

                while ($row = mysqli_fetch_array($query)) {
                  $no++;
                ?>

                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo htmlspecialchars($row['nama_petugas']); ?></td>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <!-- Sembunyikan Password -->
                    <td><?php echo htmlspecialchars($row['level']); ?></td>

                    <td>
                      <a href="index.php?page=ubah_petugas&id=<?= $row['id_petugas']; ?>" class="btn btn-success" role="button" title="Ubah Data">
                        <i class="glyphicon glyphicon-edit"></i>
                      </a>
                      <a href="#" class="btn btn-danger delete-btn" data-id="<?= $row['id_petugas']; ?>" data-nama="<?= $row['nama_petugas']; ?>" role="button" title="Hapus Data">
                        <i class="glyphicon glyphicon-trash"></i>
                      </a>
                      <a href="pages/petugas/report2.php?id=<?= $row['id_petugas']; ?>" class="btn btn-info" role="button" title="Generate PDF">
                        <i class="glyphicon glyphicon-file"></i>
                      </a>
                    </td>
                  </tr>

                <?php } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Modal Tambah Petugas -->
<div class="modal fade" id="tambahPetugasModal" tabindex="-1" role="dialog" aria-labelledby="tambahPetugasLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahPetugasLabel">Tambah Petugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" method="post" action="pages/petugas/tambah_petugas_proses.php">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Petugas</label>
            <input type="text" name="nama_petugas" class="form-control" placeholder="Nama Petugas" required>
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" placeholder="Username" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
          </div>
          <div class="form-group">
            <label>Level</label>
            <select class="form-control" name="level">
              <option value="">- Pilih Petugas -</option>
              <option value="Administrator">Administrator</option>
              <option value="Petugas">Petugas</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" title="Simpan Data">
            <i class="glyphicon glyphicon-floppy-disk"></i> Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmDeleteLabel">Konfirmasi Hapus</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda yakin ingin menghapus <strong id="namaPetugasHapus"></strong>?</p>
      </div>
      <div class="modal-footer">
        <a href="#" id="confirmDeleteBtn" class="btn btn-danger">Hapus</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<!-- Javascript untuk Delete Confirmation -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".delete-btn").forEach(button => {
            button.addEventListener("click", function () {
                let id = this.getAttribute("data-id");
                let nama = this.getAttribute("data-nama");
                document.getElementById("namaPetugasHapus").textContent = nama;
                document.getElementById("confirmDeleteBtn").href = `pages/petugas/hapus_petugas.php?id=${id}`;
                $("#confirmDeleteModal").modal("show");
            });
        });
    });
</script>

<!-- Javascript DataTable -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#petugas').DataTable();
  });
</script>
