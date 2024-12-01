<?php 
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_booking";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data pemesanan dari tabel bookings
$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pemesanan Hotel</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #007bff;
            font-size: 36px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: center;
            font-size: 16px;
        }

        th {
            background-color: #007bff;
            color: #ffffff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .total-bayar {
            font-weight: bold;
        }

        .no-records {
            text-align: center;
            font-size: 20px;
            color: #ff4d4d;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Daftar Pemesanan Kamar Hotel</h1>
    <a href="index.php">Kembali ke Beranda</a>

    <?php
    // Mengecek apakah ada data yang ditemukan
    if ($result->num_rows > 0) {
        echo '<table>
                <tr>
                    <th>No</th>
                    <th>Nama Pemesan</th>
                    <th>Jenis Kelamin</th>
                    <th>Nomor Identitas</th>
                    <th>Tipe Kamar</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Durasi Menginap</th>
                    <th>Diskon (%)</th>
                    <th>Total Bayar Setelah Diskon</th>
                </tr>';

        // Nomor urut untuk tabel
        $no = 1;
        
        // Mengambil data baris demi baris
        while($row = $result->fetch_assoc()) {
            // Array asosiatif yang memetakan kolom ke nilai
            // Misalnya, $row['nama_pemesan'] akan mengembalikan nilai nama pemesan pada baris ini.

            // Diskon persentase 10% jika durasi lebih dari 3 hari
            $diskon_persen = ($row['durasi'] > 3) ? 10 : 0;
            $diskon_nilai = $diskon_persen / 100 * $row['total_bayar'];
            $total_setelah_diskon = $row['total_bayar'] - $diskon_nilai;

            // Menampilkan data dalam tabel HTML
            echo "<tr>
                    <td>{$no}</td>
                    <td>{$row['nama_pemesan']}</td> <!-- Mengakses nilai dari array 'nama_pemesan' -->
                    <td>{$row['jenis_kelamin']}</td> <!-- Mengakses nilai dari array 'jenis_kelamin' -->
                    <td>{$row['nomor_identitas']}</td> <!-- Mengakses nilai dari array 'nomor_identitas' -->
                    <td>{$row['tipe_kamar']}</td> <!-- Mengakses nilai dari array 'tipe_kamar' -->
                    <td>{$row['tanggal_pesan']}</td> <!-- Mengakses nilai dari array 'tanggal_pesan' -->
                    <td>{$row['durasi']} hari</td> <!-- Mengakses nilai dari array 'durasi' -->
                    <td>{$diskon_persen}%</td>
                    <td>Rp " . number_format($total_setelah_diskon, 0, ',', '.') . "</td>
                </tr>";
            $no++;
        }
        echo '</table>';
    } else {
        echo '<p class="no-records">Tidak ada pemesanan.</p>';
    }
    ?>

</div>

</body>
</html>

<?php
// Tutup koneksi
$conn->close();
?>
