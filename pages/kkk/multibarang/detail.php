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
                        $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang = $id_barang");
                        $foto = mysqli_fetch_assoc($query);

                        // Display the foto details
                        if ($foto) {
                            $tenggat_waktu = date('Y-m-d', strtotime('+1 month', strtotime($foto['tenggat_waktu'])));
                            echo "<div style='display: flex;'>";
                            echo "<img src='pages/foto/{$foto['foto']}' alt='foto Image' style='max-width: 200px;'>";
                            echo "<div style='margin-left: 20px;'>";
                            echo "<h2 style='font-size: 24px;'>{$foto['nama_barang']}</h2>";
                            echo "<p style='font-size: 18px;'>Tanggal: {$foto['tanggal']}</p>";
                            echo "<p style='font-size: 18px;'>Harga Awal: Rp " . number_format($foto['harga_awal'], 0, ',', '.') . "</p>";
                            echo "<p style='font-size: 18px;'>Deskripsi Barang: {$foto['deskripsi_barang']}</p>";
                            echo "<p style='font-size: 18px;'>Tenggat Waktu: {$foto['tenggat_waktu']}</p><br>"; // Menampilkan Tenggat Waktu
                            echo "<br>";
                            echo '<a href="index.php?page=transaksi_lelang&id=' . $foto['id_barang'] . '" class="btn btn-info" title="Generate PDF">';
                            echo '<span style="font-size: 18px;">Ikut Lelang Sekarang</span>';
                            echo '</a>';
                            echo "</div>";
                            echo "</div>";
                        } else {
                            echo "<p>foto not found.</p>";
                        }
                    } else {
                        echo "<p>Invalid request. Please provide a valid foto ID.</p>";
                    }

                    // Close the database connection
                    mysqli_close($koneksi);
                    ?>
                </div>
            </div>
        </div>
    </section>
</div>
