<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            DETAIL BARANG
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
            <li class="active">DETAIL BARANG</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <?php
                    include "conf/conn.php";

                    // Check if the 'id' parameter is set in the URL
                    if (isset($_GET['id'])) {
                        $id_barang = $_GET['id'];
                        // Fetch the foto details based on the provided id_barang
                        $query = mysqli_query($koneksi, "
                        SELECT *
                        FROM barang
                        INNER JOIN lelang ON barang.id_barang = lelang.id_barang
                        WHERE barang.id_barang = $id_barang
                    ");
                                            
                        //  die (mysqli_error($koneksi));
                        $row = mysqli_fetch_array($query); 

                        $id_lelang = $row['id_lelang'];
                        $id_user = $_SESSION['id_user'];

                    //     $query = "INSERT INTO history_lelang (id_lelang, id_barang, penawaran_harga, id_user) VALUES ('$id_lelang', '$id_barang', '$penawaran_harga', '$id_user')";
                    // echo $query;
                       
                            // echo $query;
                            echo "<div style='display: flex;'>";
                            echo "<img src='pages/foto/".$row['foto']."' alt='foto Image' style='max-width: 200px;'>";
                            echo "<div style='margin-left: 20px;'>";
                            echo "<h2 style='font-size: 24px;'>". $row['nama_barang']."</h2>";
                            echo "<p style='font-size: 18px;'>Tanggal: ".$row['tanggal']."</p>";
                            echo "<p style='font-size: 18px;'>Harga Awal: Rp " . number_format($row['harga_awal'], 0, ',', '.') . "</p>";
                            echo "<p style='font-size: 18px;'>Deskripsi Barang: ".$row['deskripsi_barang']."</p>";
                            echo "<p style='font-size: 18px;'>Harga Akhir: Rp " . number_format($row['harga_akhir'], 0, ',', '.') ."</p>";
                            // echo "<p style='font-size: 18px;'>Tenggat Waktu: ".$row['foto']."</p><br>";

                            echo '<form method="POST" action="pages//history lelang/detail_proses.php">';
                            echo '<div class="form-group">';
                            echo '<label>masukkan penawaran harga</label>';
                            echo '<input type="number" name="penawaran_harga" class="form-control" placeholder="Penawaran" required min="0">';
                            echo '<input type="hidden" name="id_lelang" value="' . $id_lelang . '">';
                            echo '<input type="hidden" name="id_barang" value="' . $id_barang . '">';
                            echo '<input type="hidden" name="id_user" value="' .$id_user . '">';
                            echo '<input type="hidden" name="harga_awal" value="' .$row['harga_awal'] . '">';
                            echo '<input type="hidden" name="harga_akhir" value="' .$row['harga_akhir'] . '">';
                            echo "<br>";
                            echo '<button type="submit" class="btn btn-primary" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Penawaran </button>';
                          
                            echo '</div>';
                            echo '</form>';

                            echo '</a>';
                            echo "</div>";
                            echo "</div>";
                    } else {
                        echo '<script>alert("penawaran berhasil !!!");
                         window.location.href="../../index.php?page=menu_lelang";</script>';
                    }

                    // Close the database connection
                    mysqli_close($koneksi);
                    ?>
                </div>
            </div>
        </div>
    </section>
</div>
