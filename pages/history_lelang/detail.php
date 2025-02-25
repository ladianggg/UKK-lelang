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
// Cek apakah koneksi ke database berhasil
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil ID barang dari URL
if (isset($_GET['id'])) {
    $id_barang = $_GET['id'];

    // Ambil data barang dan lelang
    $query = mysqli_query($koneksi, "
        SELECT * 
        FROM barang 
        INNER JOIN lelang ON barang.id_barang = lelang.id_barang 
        WHERE barang.id_barang = '$id_barang'
    ");

    if (!$query) {
        die("Query error: " . mysqli_error($koneksi));
    }

    // Periksa apakah data ditemukan
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_array($query);

        $id_lelang = $row['id_lelang'];
        $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : null;

        if (!$id_user) {
            die("Error: User tidak ditemukan, pastikan sudah login.");
        }

        echo "<div style='display: flex;'>";
        echo "<img src='pages/foto/" . $row['foto'] . "' alt='foto Image' style='max-width: 200px;'>";

        echo "<div style='margin-left: 20px;'>";
        echo "<h2 style='font-size: 24px;'>" . $row['nama_barang'] . "</h2>";
        echo "<p style='font-size: 18px;'>Tanggal: " . $row['tanggal'] . "</p>";
        echo "<p style='font-size: 18px;'>Harga Awal: Rp " . number_format($row['harga_awal'], 0, ',', '.') . "</p>";
        echo "<p style='font-size: 18px;'>Deskripsi Barang: " . $row['deskripsi_barang'] . "</p>";
        echo "<p style='font-size: 18px;'>Harga Akhir: Rp " . number_format($row['harga_akhir'], 0, ',', '.') . "</p>";

        echo '<form method="POST" action="pages/history_lelang/detail_proses.php">';
        echo '<div class="form-group">';
        echo '<label>Masukkan Penawaran Harga</label>';
        echo '<input type="number" name="penawaran_harga" class="form-control" placeholder="Penawaran" required min="0">';
        echo '<input type="hidden" name="id_lelang" value="' . $id_lelang . '">';
        echo '<input type="hidden" name="id_barang" value="' . $id_barang . '">';
        echo '<input type="hidden" name="id_user" value="' . $id_user . '">';
        echo '<input type="hidden" name="harga_awal" value="' . $row['harga_awal'] . '">';
        echo '<input type="hidden" name="harga_akhir" value="' . $row['harga_akhir'] . '">';
        echo "<br>";
        echo '<button type="submit" class="btn btn-primary" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Penawaran </button>';
        echo '</div>';
        echo '</form>';

        echo "</div>";
        echo "</div>";
    } else {
        echo "<p style='color: red; font-weight: bold;'>Data barang tidak ditemukan!</p>";
    }
} else {
    echo "<p style='color: red; font-weight: bold;'>ID barang tidak ditemukan dalam parameter URL.</p>";
}


                    // Close the database connection
                    mysqli_close($koneksi);
                    ?>
                </div>
            </div>
        </div>
    </section>
</div>
