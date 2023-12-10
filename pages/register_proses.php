<?php
include "../conf/conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_petugas = $_POST['nama_petugas'];
    $level = $_POST['level'];

    // Validate input (you should perform more comprehensive validation)
    if (empty($username) || empty($password) || empty($nama_petugas) || empty($level)) {
        // Handle validation errors, redirect back to the registration page, or show an error message.
        echo 'All fields are required.';
        exit;
    }

    // Hash the password
    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert user into the database
    $query = "INSERT INTO petugas (nama_petugas, username, password, level) VALUES ('$nama_petugas', '$username', '$password', '$level')";
    echo $query;
    // Execute the query
    if (mysqli_query($koneksi, $query)) {
        echo '<script>alert("Registration successful! Please log in.");
        window.location.href="login.php"</script>';
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    // Close the database connection
    mysqli_close($koneksi);
} else {
    // Handle cases where the form wasn't submitted properly
    echo 'Invalid request.';
}
?>
