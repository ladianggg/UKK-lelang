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
                    <form role="form" method="post" action="pages/history_lelang/transaksi_lelang_proses.php">
                        <div class="box-body">
                            <div class="form-group">
                                <label>ID Barang</label>
                                <input type="text" name="id" id="id" class="form-control pencarian" placeholder="ID" required>
                            </div>
                            <div class="form-group">
                                <label>tanggal</label>
                                <input type="date" id="tanggal" name="tanggal" class="form-control" placeholder="Tanggal" readonly>
                            </div>
                            <div class="form-group">
                                <label>Harga akhir</label>
                                <input type="number" id="harga" name="harga" class="form-control" placeholder="Harga Akhir" readonly>
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" id="jumlah" name="jumlah" class="form-control" placeholder="Jumlah Barang">
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
                                <table id="produk" class="table table-bordered">
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
                                        $query = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY id DESC");
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <tr class="pilih" data-id="<?php echo $row['id']; ?>" data-barang="<?php echo $row['nama_barang']; ?>" data-harga="<?php echo $row['harga']; ?>">
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['nama_barang']; ?></td>
                                                <td><?php echo $row['harga']; ?></td>
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
    $(document).ready(function () {
        $(".pencarian").focusin(function () {
            $("#myModal").modal('show');
        });
        $('#produk').DataTable();

        $(document).on('click', '.pilih', function (e) {
            document.getElementById("id").value = $(this).data('id');
            document.getElementById("nama").value = $(this).data('barang');
            document.getElementById("harga").value = $(this).data('harga');
            $('#myModal').modal('hide');
        });
    });
</script>


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
                    <form role="form" method="post" action="pages/history_lelang/transaksi_lelang_proses.php">
                        <div class="box-body">
                            <div class="form-group">
                                <label>ID Barang</label>
                                <input type="text" name="id" id="id" class="form-control pencarian" placeholder="ID" required>
                            </div>
                            <div class="form-group">
                                <label>tanggal</label>
                                <input type="date" id="tanggal" name="tanggal" class="form-control" placeholder="Tanggal" readonly>
                            </div>
                            <div class="form-group">
                                <label>Harga akhir</label>
                                <input type="number" id="harga" name="harga" class="form-control" placeholder="Harga Produk" readonly>
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" id="jumlah" name="jumlah" class="form-control" placeholder="Jumlah Barang">
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
                                <table id="produk" class="table table-bordered">
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
                                        $query = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY id DESC");
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <tr class="pilih" data-id="<?php echo $row['id']; ?>" data-barang="<?php echo $row['nama_barang']; ?>" data-harga="<?php echo $row['harga']; ?>">
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['nama_barang']; ?></td>
                                                <td><?php echo $row['harga']; ?></td>
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
    $(document).ready(function () {
        $(".pencarian").focusin(function () {
            $("#myModal").modal('show');
        });
        $('#produk').DataTable();

        $(document).on('click', '.pilih', function (e) {
            document.getElementById("id").value = $(this).data('id');
            document.getElementById("nama").value = $(this).data('barang');
            document.getElementById("harga").value = $(this).data('harga');
            $('#myModal').modal('hide');
        });
    });
</script>


