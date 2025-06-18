<?php
require 'koneksi.php'; // koneksi ke database

// Query data balita
$result_balita = mysqli_query($conn, "SELECT * FROM balita");

// Query data orangtua
$result_orangtua = mysqli_query($conn, "SELECT * FROM orangtua");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Balita & Orang Tua</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            margin-bottom: 40px;
        }

        th, td {
            border: 1px solid #888;
            padding: 8px 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <h2>Data Balita</h2>
    <table>
        <tr>
            <th>Nama Lengkap</th>
            <th>Tempat/Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Nama Orang Tua</th>
            <th>Tinggi Badan</th>
            <th>Berat Badan</th>
            <th>Lingkar Kepala</th>
            <th>Lingkar Lengan</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result_balita)) { ?>
            <tr>
                <td><?= htmlspecialchars($row['nama_lengkap']); ?></td>
                <td><?= htmlspecialchars($row['tempat_tanggal_lahir']); ?></td>
                <td><?= htmlspecialchars($row['alamat']); ?></td>
                <td><?= htmlspecialchars($row['nama_orangtua']); ?></td>
                <td><?= htmlspecialchars($row['tinggi_badan']); ?></td>
                <td><?= htmlspecialchars($row['berat_badan']); ?></td>
                <td><?= htmlspecialchars($row['lingkar_kepala']); ?></td>
                <td><?= htmlspecialchars($row['lingkar_lengan']); ?></td>
            </tr>
        <?php } ?>
    </table>

    <h2>Data Orang Tua</h2>
    <table>
        <tr>
            <th>Nama Lengkap</th>
            <th>Tempat/Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Tinggi Badan</th>
            <th>Berat Badan</th>
            <th>Gula Darah</th>
            <th>Kolestrol</th>
            <th>Tekanan Darah</th>
            <th>Lingkar Perut</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result_orangtua)) { ?>
            <tr>
                <td><?= htmlspecialchars($row['nama_lengkap']); ?></td>
                <td><?= htmlspecialchars($row['tempat_tanggal_lahir']); ?></td>
                <td><?= htmlspecialchars($row['alamat']); ?></td>
                <td><?= htmlspecialchars($row['tinggi_badan']); ?></td>
                <td><?= htmlspecialchars($row['berat_badan']); ?></td>
                <td><?= htmlspecialchars($row['gula_darah']); ?></td>
                <td><?= htmlspecialchars($row['kolestrol']); ?></td>
                <td><?= htmlspecialchars($row['tekanan_darah']); ?></td>
                <td><?= htmlspecialchars($row['lingkar_perut']); ?></td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>

