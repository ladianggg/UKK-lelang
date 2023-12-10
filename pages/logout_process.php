<?php
include '../conf/conn.php';
include '../conf/session.php';

$sess_admin = $_SESSION['id_petugas'] && $_SESSION['nama_petugas'];
if (isset($sess_admin)) {
    session_destroy();
    echo '<script>alert("Anda Telah Logout !!!");
window.location.href="login.php"</script>';
}