<?php
include "../conf/conn.php";

if (isset($_POST['username'], $_POST['password'], $_POST['level'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    if ($level == 'administrator' || $level == 'petugas') {
        $query = "SELECT * FROM petugas WHERE username = '$username' AND password = '$password' AND level = '$level'";
        $result = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION['id_petugas'] = $row['id_petugas'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['level'] = $row['level'];
            header("Location: ../index.php");
            exit();
        } else {
            header("Location: login.php");
        }
    } elseif ($level == 'masyarakat') {
        $query = "SELECT * FROM masyarakat WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['level'] = $row['level'];
            header("Location:../index.php");
            exit();
        } else {
            header("Location: login.php");

            $error = "Username, password, or level is incorrect";
        }
    } else {
        $error = "Invalid level";
    }
}
?>
