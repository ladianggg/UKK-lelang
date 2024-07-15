<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Event by ID</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h3 class="text-center">Daftar Nama Acara</h3>
    <hr/>
    <div class="text-right no-print">

        <button onclick="printTable()" class="btn btn-primary">Print</button>
        
    </div>
    <table id="eventTable" class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Acara</th>
                <th>Tanggal</th>
                <th>Lokasi</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "../conf/conn.php";

            $id = isset($_GET['id']) ? $_GET['id'] : '';
            $queryStr = $id ? "SELECT * FROM event WHERE id = $id" : "SELECT * FROM event";
            $query = mysqli_query($koneksi, $queryStr);

            $no = 1;
            while ($row = mysqli_fetch_array($query)) {
                echo "<tr>
                    <td>{$no}</td>
                    <td>{$row['nama_acara']}</td>
                    <td>{$row['tanggal']}</td>
                    <td>{$row['lokasi']}</td>
                    <td>{$row['deskripsi']}</td>
                </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</div>

<script>
function filterEvent() {
    const eventId = document.getElementById('eventId').value;
    if (eventId) {
        window.location.href = `?id=${eventId}`;
    } else {
        alert('Please enter a valid event ID.');
    }
}

function printTable() {
    window.print();
}
</script>

</body>
</html>
