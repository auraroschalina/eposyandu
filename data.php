<?php
$host = "localhost";
$user = "root";
$password = ""; // Ubah jika ada password MySQL kamu
$db = "eposyandu";

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kategori = $_POST['kategori'] ?? '';

    if ($kategori === 'balita') {
        // Ambil dan validasi data balita sesuai nama input dari form
        $nama_lengkap = $_POST['balita_nama_lengkap'] ?? '';
        $tempat_tanggal_lahir = $_POST['balita_tempat_tanggal_lahir'] ?? '';
        $alamat_lengkap = $_POST['balita_alamat_lengkap'] ?? '';
        $nama_orangtua = $_POST['balita_nama_orangtua'] ?? '';
        $tinggi_badan = $_POST['balita_tinggi_badan'] ?? '';
        $berat_badan = $_POST['balita_berat_badan'] ?? '';
        $lingkar_kepala = $_POST['balita_lingkar_kepala'] ?? '';
        $lingkar_lengan = $_POST['balita_lingkar_lengan'] ?? '';

        if (!$nama_lengkap || !$tempat_tanggal_lahir) {
            die("Nama lengkap dan tempat/tanggal lahir balita wajib diisi.");
        }

        $stmt = $conn->prepare("INSERT INTO balita (nama_lengkap, tempat_tanggal_lahir, alamat, nama_orangtua, tinggi_badan, berat_badan, lingkar_kepala, lingkar_lengan) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $nama_lengkap, $tempat_tanggal_lahir, $alamat_lengkap, $nama_orangtua, $tinggi_badan, $berat_badan, $lingkar_kepala, $lingkar_lengan);

        if ($stmt->execute()) {
            echo "<script> window.location.href='popupdata.html';</script>";
        } else {
            echo "Gagal menyimpan data balita: " . $stmt->error;
        }

        $stmt->close();

    } elseif ($kategori === 'orangtua') {
        // Ambil data orang tua sesuai nama input form
        $nama_lengkap = $_POST['ortu_nama_lengkap'] ?? '';
        $tempat_tanggal_lahir = $_POST['ortu_tempat_tanggal_lahir'] ?? '';
        $alamat_lengkap = $_POST['ortu_alamat_lengkap'] ?? '';
        $tinggi_badan = $_POST['ortu_tinggi_badan'] ?? '';
        $berat_badan = $_POST['ortu_berat_badan'] ?? '';
        $gula_darah = $_POST['ortu_gula_darah'] ?? '';
        $kolestrol = $_POST['ortu_kolestrol'] ?? '';
        $tekanan_darah = $_POST['ortu_tekanan_darah'] ?? '';
        $lingkar_perut = $_POST['ortu_lingkar_perut'] ?? '';

        if (!$nama_lengkap || !$tempat_tanggal_lahir) {
            die("Nama lengkap dan tempat/tanggal lahir orang tua wajib diisi.");
        }

        // Prepared statement untuk insert data orang tua
        $stmt = $conn->prepare("INSERT INTO orangtua (nama_lengkap, tempat_tanggal_lahir, alamat, tinggi_badan, berat_badan, gula_darah, kolestrol, tekanan_darah, lingkar_perut) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $nama_lengkap, $tempat_tanggal_lahir, $alamat_lengkap, $tinggi_badan, $berat_badan, $gula_darah, $kolestrol, $tekanan_darah, $lingkar_perut);

        if ($stmt->execute()) {
             echo "<script> window.location.href='popupdata.html';</script>";
        } else {
            echo "Gagal menyimpan data orang tua: " . $stmt->error;
        }

        $stmt->close();

    } else {
        echo "Kategori tidak dikenali.";
    }
} else {
    echo "Form belum disubmit.";
}

$conn->close();
?>
