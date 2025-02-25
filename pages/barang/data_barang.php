<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>DATA BARANG</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
            <li class="active">DATA BARANG</li>
        </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahBarangModal" role="button" title="Tambah Data">
                    <i class="glyphicon glyphicon-plus"></i> Tambah
                </a>
                <a href="pages/barang/report.php" class="btn btn-info" role="button" title="Generate PDF">
                    <i class="glyphicon glyphicon-file"></i> Print PDF
                </a>
            </div>
            <div class="box-body">
                <div class="row">
                    <?php
                    include "conf/conn.php";
                    $stmt = $koneksi->prepare("SELECT id_barang, nama_barang, tanggal, harga_awal, foto FROM barang ORDER BY id_barang DESC");
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <div class="col-md-3 text-center" style="margin-bottom: 15px;">
                            <div class="card m-3 p-3">
                                <img src="pages/foto/<?php echo htmlspecialchars($row['foto']); ?>" class="card-img-top" alt="Product Image" style="height: 200px; width: 100%; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($row['nama_barang']); ?></h5>
                                    <p class="card-text">
                                        Tanggal: <?php echo htmlspecialchars($row['tanggal']); ?><br>
                                        Harga Awal: Rp <?php echo number_format($row['harga_awal'], 0, ',', '.'); ?>
                                    </p>
                                    <a href="index.php?page=ubah_barang&id=<?= $row['id_barang']; ?>" class="btn btn-success" role="button" title="Ubah Data">
                        <i class="glyphicon glyphicon-edit"></i>
                      </a>
                                    <a href="#" onclick="confirmDelete(<?= $row['id_barang']; ?>, '<?= htmlspecialchars($row['nama_barang']); ?>')" class="btn btn-danger" title="Hapus Data">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Tambah Barang -->
<div class="modal fade" id="tambahBarangModal" tabindex="-1" role="dialog" aria-labelledby="tambahBarangLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="tambahBarangLabel">Tambah Barang</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="pages/barang/tambah_barang_proses.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
                    </div>
                    <input type="hidden" name="tanggal" value="<?php echo date('Y-m-d'); ?>">
                    <div class="form-group">
                        <label>Harga Awal</label>
                        <input type="number" name="harga_awal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
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
                <p>Apakah Anda yakin ingin menghapus <strong id="namaBarangHapus"></strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="#" id="confirmDeleteBtn" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete(id, nama) {
    document.getElementById("namaBarangHapus").textContent = nama;
    document.getElementById("confirmDeleteBtn").href = "pages/barang/hapus_barang.php?id=" + id;
    $("#confirmDeleteModal").modal("show");
}
</script>