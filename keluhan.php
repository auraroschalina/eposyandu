<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $deskripsi = $_POST['deskripsi'];


    // Query insert
    $query = "INSERT INTO pengaduan (nama, jenis, deskripsi) VALUES ('$nama', '$jenis', '$deskripsi')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Laporan Diterima!'); window.location.href='keluhan.html';</script>";
    } else {
        echo "<br><strong>Error:</strong> " . mysqli_error($conn);
    }
}
?>