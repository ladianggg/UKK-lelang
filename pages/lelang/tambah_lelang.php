<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            TRANSAKSI BARANG
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
            <li class="active">TRANSAKSI BARANG</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- form start -->
                    <form role="form" method="post" action="pages/lelang/tambah_lelang_proses.php">
                        <div class="box-body">
                            <div class="form-group">
                                <label>ID Barang</label>
                                <input type="text" name="id_barang" id="id_barang" class="form-control pencarian" placeholder="ID" required>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control pencarian" placeholder="nama" readonly>
                            </div>
                            <div class="form-group">
                                <label>ID petugas</label>
                                <input type="text" id="id_petugas" name="id_petugas" class="form-control" placeholder="id_petugas" >
                            </div>
                            <div class="form-group">
                                <label>Harga Akhir</label>
                                <input type="number" id="harga_awal" name="harga_awal" class="form-control" placeholder="Harga Awal" readonly>
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

                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">DATA BARANG</h4>
                            </div>
                            <div class="modal-body">
                                <table id="lelang" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NAMA BARANG</th>
                                            <th>HARGA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include "conf/conn.php";
                                        $query = mysqli_query($koneksi,"SELECT * FROM barang ORDER BY id_barang DESC");
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <tr class="pilih" data-id="<?php echo $row['id_barang']; ?>" data-barang="<?php echo $row['nama_barang']; ?>" data-harga="<?php echo $row['harga_awal']; ?>">
                                                <td><?php echo $row['id_barang']; ?></td>
                                                <td><?php echo $row['nama_barang']; ?></td>
                                                <td><?php echo $row['harga_awal']; ?></td>
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
<!-- /.content-wrapper -->

<script type="text/javascript">
    $(document).ready(function() {
        $(".pencarian").focusin(function() {
            $("#myModal").modal('show');
        });
        $('#barang').DataTable();

        $(document).on('click', '.pilih', function(e) {
            document.getElementById("id_barang").value = $(this).data('id');
            document.getElementById("nama").value = $(this).data('barang');
            $('#myModal').modal('hide');
        });

    });
</script>