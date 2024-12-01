<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_booking"; // Ganti sesuai dengan nama database yang digunakan

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['simpan'])) {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nomor_identitas = $_POST['nomor_identitas'];
    $tipe_kamar = $_POST['tipe_kamar'];
    $tanggal_pesan = $_POST['tanggal_pesan'];
    $durasi = $_POST['durasi'];
    $termasuk_breakfast = isset($_POST['termasuk_breakfast']) ? 1 : 0; // 1 untuk Ya, 0 untuk Tidak
    $total_bayar = $_POST['total_bayar'];

    // Query untuk menyimpan data ke database
    $query = "INSERT INTO bookings (nama, jenis_kelamin, nomor_identitas, tipe_kamar, tanggal_pesan, durasi, termasuk_breakfast, total_bayar)
              VALUES ('$nama', '$jenis_kelamin', '$nomor_identitas', '$tipe_kamar', '$tanggal_pesan', '$durasi', '$termasuk_breakfast', '$total_bayar')";

    // Eksekusi query
    if ($conn->query($query) === TRUE) {
        echo "Pemesanan berhasil disimpan.";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    $conn->close();
}
?>