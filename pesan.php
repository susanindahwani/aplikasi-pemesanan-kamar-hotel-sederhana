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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['simpan'])) {
        // Simpan data ke database
        $nama = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $nomor_identitas = $_POST['nomor_identitas'];
        $tipe_kamar = $_POST['tipe_kamar'];
        $tanggal_pesan = $_POST['tanggal_pesan'];
        $durasi = $_POST['durasi'];
        $termasuk_breakfast = isset($_POST['termasuk_breakfast']) ? 1 : 0;

        // Tentukan harga per hari
        if ($tipe_kamar == 'Standar') {
            $harga_per_hari = 500000;
        } elseif ($tipe_kamar == 'Deluxe') {
            $harga_per_hari = 800000;
        } elseif ($tipe_kamar == 'Family') {
            $harga_per_hari= 1200000;
        }

        // Hitung total harga
        $total_harga = $harga_per_hari * $durasi;
        $diskon = ($durasi > 3) ? 0.1 * $total_harga : 0; // Diskon 10% jika durasi lebih dari 3 hari
        $total_bayar = $total_harga - $diskon;

        if ($termasuk_breakfast) {
            $total_bayar += 80000; // Tambahan untuk breakfast
        }

        // Simpan ke tabel bookings
        $sql = "INSERT INTO bookings (nama_pemesan, jenis_kelamin, nomor_identitas, tipe_kamar, tanggal_pesan, durasi, diskon, total_bayar) 
                VALUES ('$nama', '$jenis_kelamin', '$nomor_identitas', '$tipe_kamar', '$tanggal_pesan', '$durasi', '$diskon', '$total_bayar')";

        if ($conn->query($sql) === TRUE) {
            echo "Data pemesanan berhasil disimpan!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['cancel'])) {
        // Kosongkan form dan tidak melakukan apa-apa
        header("Location: pesen.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Kamar</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* Reset dasar */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f7f7;
            color: #333;
        }

        /* Kontainer utama */
        .container {
            width: 90%;
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Judul */
        h1 {
            text-align: center;
            color: #007BFF;
            font-size: 28px;
            margin-bottom: 30px;
        }

        /* Styling untuk setiap form group */
        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-size: 16px;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }

        /* Input, Select, dan Checkbox */
        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 10px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="date"]:focus,
        select:focus {
            border-color: #007BFF;
        }

        /* Tombol Simpan dan Cancel */
        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn-container button {
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-simpan {
            background-color: #28a745;
            color: white;
        }

        .btn-cancel {
            background-color: #dc3545;
            color: white;
        }

        /* Tombol Kembali ke Beranda */
        .btn-back-home {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            margin-top: 20px;
            width: 95%;
            display: block;
        }

        .btn-back-home:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Hotel Perfect</h1>
        <p>Pemesanan kamar mudah dan cepat, buat pengalaman Anda lebih menyenangkan!</p>
        <form method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="nama">Nama Pemesan:</label>
                <input type="text" id="nama" name="nama" required>
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nomor_identitas">Nomor Identitas:</label>
                <input type="text" id="nomor_identitas" name="nomor_identitas" maxlength="16" required>
                <div id="error-message" class="error-message"></div>
            </div>

            <div class="form-group">
                <label for="tipe_kamar">Tipe Kamar:</label>
                <select id="tipe_kamar" name="tipe_kamar" required>
                    <option value="Standar">Standar</option>
                    <option value="Deluxe">Deluxe</option>
                    <option value="Family">Family</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal_pesan">Tanggal Pesan:</label>
                <input type="date" id="tanggal_pesan" name="tanggal_pesan" required>
            </div>

            <div class="form-group">
                <label for="durasi">Durasi Menginap (Hari):</label>
                <input type="number" id="durasi" name="durasi" required min="1">
            </div>

            <div class="form-group">
                <label for="termasuk_breakfast">Termasuk Breakfast:</label>
                <div style="display: flex; align-items: center; gap: 5px;">
                    <input type="checkbox" id="termasuk_breakfast" name="termasuk_breakfast">
                    <label for="termasuk_breakfast" style="margin: 0;">Ya</label>
                </div>
            </div>

            <button type="button" class="btn-submit" onclick="hitungTotalBayar()">Hitung Total Bayar</button>
            
            <div class="total-bayar" id="totalBayar">Total Bayar: Rp 0</div>

            <div class="btn-container">
                <button type="submit" class="btn-simpan" name="simpan">Simpan</button>
                <button type="submit" class="btn-cancel" name="cancel">Cancel</button>
            </div>
        </form>

        <!-- Tombol kembali ke beranda -->
        <a href="index.php" class="btn-back-home">Kembali ke Beranda</a>
    </div>

    <script>
        // Menambahkan batasan tanggal untuk tidak memilih tanggal kemarin atau sebelumnya
        window.onload = function() {
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0
            var yyyy = today.getFullYear();

            today = yyyy + '-' + mm + '-' + dd;
            document.getElementById("tanggal_pesan").setAttribute("min", today);
        }

        function hitungTotalBayar() {
            var tipeKamar = document.getElementById("tipe_kamar").value;
            var durasi = parseInt(document.getElementById("durasi").value);
            var termasukBreakfast = document.getElementById("termasuk_breakfast").checked;
            var hargaKamar = 0;
            var discount = 0;
            var tambahanBreakfast = 0;

            // Menentukan harga kamar berdasarkan tipe
            if (tipeKamar === "Standar") {
                hargaKamar = 500000;  // harga kamar Standar
            } else if (tipeKamar === "Deluxe") {
                hargaKamar = 800000;  // harga kamar Deluxe
            } else if (tipeKamar === "Family") {
                hargaKamar = 1200000;  // harga kamar Family 
            }

            // Menghitung diskon jika durasi menginap lebih dari 3 hari
            if (durasi > 3) {
                discount = (hargaKamar * durasi) * 0.1;  // Diskon 10% dari total harga menginap
            }

            // Menghitung tambahan biaya breakfast
            if (termasukBreakfast) {
                tambahanBreakfast = 80000;  // Tambahan biaya breakfast
            }

            // Menghitung total bayar
            var totalBayar = (hargaKamar * durasi) - discount + tambahanBreakfast;

            // Menampilkan hasil total bayar
            document.getElementById("totalBayar").innerText = "Total Bayar: Rp " + totalBayar.toLocaleString();
        }

        function validateForm() {
            var nomorIdentitas = document.getElementById("nomor_identitas").value;
            var errorMessage = document.getElementById("error-message");

            if (nomorIdentitas.length !== 16) {
                errorMessage.innerText = "Isian salah.. data harus 16 digit!";
                return false; // Prevent form submission
            } else {
                errorMessage.innerText = "";
                return true; // Allow form submission
            }
        }
    </script>
</body>
</html>
