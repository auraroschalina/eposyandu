<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $deskripsi = $_POST['deskripsi'];

    $query_sql = "INSERT INTO laporan (nama, jenis, deskripsi) VALUES ('$nama', '$jenis', '$deskripsi')";

    if (mysqli_query($conn, $query_sql)) {
        // Jika berhasil, langsung kembali ke form
        header('Location: keluhan.html');
        exit();
    } else {
        // Kalau gagal, bisa alihkan ke halaman error atau kasih alert
        echo "<script>
            alert('Gagal mengirim laporan.');
            window.location.href = 'keluhan.html';
        </script>";
    }
} else {
    // Jika buka file ini bukan dari form POST
    header('Location: keluhan.html');
    exit();
}
?>
