<?php
// config.php - File untuk menyambungkan ke database
$servername = "localhost";    // Server database
$username = "root";          // Username database (default XAMPP)
$password = "";              // Password database (kosong di XAMPP)
$dbname = "perpustakaan";        // Nama database yang akan digunakan

// Membuat koneksi ke database MySQL
$mysqli = new mysqli($servername, $username, $password, $dbname, 3307);

// Cek apakah koneksi berhasil
if ($mysqli->connect_error) {
    die("Koneksi ke database gagal: " . $mysqli->connect_error);
}

// Set charset ke UTF-8 untuk mendukung karakter Indonesia
$mysqli->set_charset("utf8");

echo "Koneksi ke database berhasil!";
?>