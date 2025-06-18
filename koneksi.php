<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$database = "eposyandu";
$username = "root";
$password = "";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

echo "Koneksi berhasil!";
?>