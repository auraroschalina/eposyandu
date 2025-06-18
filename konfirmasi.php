<?php
// Konfigurasi koneksi database
$host = 'localhost';
$user = 'root';
$password = ''; // Ganti jika ada password MySQL
$database = 'eposyandu';

// Buat koneksi
$conn = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$nama = $_POST['nama'];
$tanggallahir = $_POST['tanggallahir'];
$alamat = $_POST['alamat'];
$event = $_POST['event'];

// Masukkan ke database
$sql = "INSERT INTO konfirmasi (nama, tanggallahir, alamat, event) 
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $nama, $tanggallahir, $alamat, $event);

if ($stmt->execute()) {
    echo "<script>
            alert('Konfirmasi berhasil dikirim!');
            window.location.href = 'jadwal.html';
          </script>";
} else {
    echo "Error: " . $stmt->error;
}

// Tutup koneksi
$stmt->close();
$conn->close();
?>
