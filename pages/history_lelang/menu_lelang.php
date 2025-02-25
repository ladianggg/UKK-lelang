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
                <!-- <a href="index.php?page=tambah_barang" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
                <a href="pages/barang/report.php" class="btn btn-info" role="button" title="Generate PDF"><i class="glyphicon glyphicon-file"></i> Print PDF</a> -->
            </div>
            <div class="box-body">
                <div class="row">
                    
                    <?php
                    include "conf/conn.php";
                    $no = 0;
                    
                    $query = mysqli_query($koneksi, "SELECT l.id_lelang, l.id_barang, l.tanggal, l.harga_akhir, b.nama_barang, b.deskripsi_barang, b.foto, b.harga_awal FROM lelang as l join barang as b on b.id_barang = l.id_barang WHERE l.status = 'dibuka'");
                    
                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                    
                    <div class="col-md-3 text-center" style="margin-bottom: 15px; ">
                            <div class="card m-3 p-3">
                                <img src="pages/foto/<?php echo $row['foto'] ?>" class="card-img-top" alt="Product Image" style="height: 200px;">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['nama_barang']; ?></h5>
                                    <p class="card-text">
                                        Tanggal: <?php echo $row['tanggal']; ?><br>
                                        Harga Awal: Rp <?php echo number_format($row['harga_awal'], 0, ',', '.'); ?>
                                    </p>
                                    <!-- <a href="index.php?page=ubah_barang&id=<?= $row['id_barang']; ?>" class="btn btn-success" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i> Ubah</a>
                                    <a href="pages/barang/hapus_barang.php?id=<?= $row['id_barang']; ?>" onclick="return confirm('Yakin mau hapus data <?php echo $row['nama_barang']?>')" class="btn btn-danger" title="Hapus Data"><i class="glyphicon glyphicon-trash"></i> Hapus</a> -->
                                    <a href="index.php?page=detail&id=<?= $row['id_barang']; ?>" class="btn btn-info" title="Generate PDF"><i class="glyphicon glyphicon-file"></i>Detail</a>
                                </div>
                             </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
          














