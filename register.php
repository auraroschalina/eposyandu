<?php
require 'koneksi.php';

// Tangkap data dari form
$nama_pengguna = $_POST['nama_pengguna'];
$kata_sandi = $_POST['kata_sandi'];

// Cari di database
$query_sql = "SELECT * FROM db_admin WHERE nama_pengguna = '$nama_pengguna' AND kata_sandi = '$kata_sandi'";
$result = mysqli_query($conn, $query_sql);

// Cek apakah ada datanya
if (mysqli_num_rows($result) > 0) {
    // Login sukses
    header("Location: data.html");
} else {
    // Login gagal
    echo "<script>alert('Nama Pengguna atau Kata Sandi salah!'); window.location.href='login.html';</script>";
}
?>