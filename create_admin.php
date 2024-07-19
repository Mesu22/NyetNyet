<?php

$servername = "localhost";
$username = "root"; // Ganti dengan nama pengguna MySQL Anda
$password = ""; // Ganti dengan kata sandi MySQL Anda
$dbname = "admin_dashboard";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Menggunakan password_hash untuk mengenkripsi password
$admin_password = 'admin1'; // Ganti dengan password yang diinginkan
$hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);

// SQL untuk menambahkan data admin
$sql = "INSERT INTO users (username, password, email, is_admin) VALUES ('admin', '$hashed_password', 'admin@example.com', 1)";

if ($conn->query($sql) === TRUE) {
    echo "New admin created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
?>
