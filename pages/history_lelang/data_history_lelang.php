<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>HISTORY LELANG</h1>
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
                    <div class="box-header"></div>
                    <div class="box-body table-responsive">
                        <table id="history_lelang" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID LELANG</th>
                                    <th>ID BARANG</th>
                                    <th>ID USER</th>
                                    <th>PENAWARAN HARGA</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "conf/conn.php";
                                
                                $no = 0;
                                $is_first = true; // Menandai pemenang tertinggi
                                
                                $query = mysqli_query($koneksi, "SELECT * FROM history_lelang ORDER BY penawaran_harga DESC");
                                while ($row = mysqli_fetch_array($query)) {
                                    $no++;
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['id_lelang']; ?></td>
                                        <td><?php echo $row['id_barang']; ?></td>
                                        <td><?php echo $row['id_user']; ?></td>
                                        <td>Rp <?php echo number_format($row['penawaran_harga'], 0, ',', '.'); ?></td>
                                        <td><?php echo $is_first ? "<p>Pemenang!</p>" : "<p>Bukan Pemenang</p>"; ?></td>
                                    </tr>
                                    <?php
                                    $is_first = false;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Javascript Datatable -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#history_lelang').DataTable();
    });
</script>
