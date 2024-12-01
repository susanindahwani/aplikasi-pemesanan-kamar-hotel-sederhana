<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Perfect - Booking Your Perfect Stay</title>
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

        /* Header dan Hero Image */
        header {
            position: relative;
            height: 80vh;
            background: url('assets/images/standar.jpg') no-repeat center center/cover;
            color: white;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        header h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        header p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        header .cta-button {
            padding: 15px 30px;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 18px;
            cursor: pointer;
            text-decoration: none;
        }

        header .cta-button:hover {
            background-color: #0056b3;
        }

        /* Menu Navigation */
        .menu {
            display: flex;
            justify-content: center;
            background-color: #333;
        }

        .menu a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            text-transform: uppercase;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .menu a:hover {
            background-color: #555;
        }

        /* Kontainer Utama */
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Produk dan Kamar */
        .room {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
            gap: 20px;
        }

        .room img {
            width: 100%;
            max-width: 350px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .room-info {
            max-width: 500px;
            padding: 20px;
            background-color: #f7f7f7;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .room-info h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .room-info p {
            margin-bottom: 20px;
        }

        /* Tabel Harga */
        .price-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }

        .price-table th,
        .price-table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .price-table th {
            background-color: #007BFF;
            color: white;
        }

        /* Footer */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px;
        }

        footer p {
            margin: 0;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <h1>Welcome to Hotel Perfect</h1>
        <p>Experience the best stay at our hotel</p>
    </header>

    <!-- Menu -->
    <div class="menu">
        <a href="index.php">Beranda</a>
        <a href="produk.php">Kamar</a>
        <a href="index.php?page=harga">Harga</a>
        <a href="index.php?page=tentang">Tentang Kami</a>
        <a href="pesan.php">Pesan Kamar</a>
        <a href="data_pemesanan.php">lihat pesanan</a>
    </div>

    <!-- Konten utama -->
    <div class="container">
        <h2>Our Rooms</h2>
        <div class="room">
            <img src="assets/images/standar.jpg" alt="Standard Room">
            <div class="room-info">
                <h3>Standard Room</h3>
                <p>Kamar yang cocok untuk solo traveler atau pasangan, dengan fasilitas dasar seperti tempat tidur nyaman, meja kerja, dan kamar mandi pribadi.</p>
                <p><strong>harga:</strong> Rp500.000/hari</p>
                <a href="pesan.php" class="cta-button">Book Now</a>
            </div>
        </div>

        <div class="room">
            <img src="assets/images/deluxe.jpg" alt="Deluxe Room">
            <div class="room-info">
                <h3>Deluxe Room</h3>
                <p>Kamar mewah dengan tempat tidur besar, sofa untuk bersantai, serta dekorasi modern. Ideal untuk pasangan atau pelancong yang menginginkan kenyamanan ekstra.</p>
                <p><strong>harga:</strong> Rp800.000/hari</p>
                <a href="pesan.php" class="cta-button">Book Now</a>
            </div>
        </div>
        <div class="room">
            <img src="assets/images/family.jpg" alt="Family Room">
            <div class="room-info">
                <h3>Family Room</h3>
                <p>Kamar luas dengan dua tempat tidur besar dan area tempat duduk, sempurna untuk keluarga yang menginginkan kenyamanan selama liburan.</p>
                <p><strong>harga:</strong> Rp1.200.000/hari</p>
                <a href="pesan.php" class="cta-button">Book Now</a>
            </div>
        </div>
<!-- About Us Section -->
<div class="container" id="about-us">
    <h2>Tentang</h2>
    <p>Hotel Perfect adalah hotel yang berkomitmen untuk memberikan kenyamanan terbaik kepada setiap tamu kami. Kami menawarkan pengalaman menginap yang luar biasa dengan fasilitas lengkap dan pelayanan terbaik, yang cocok untuk solo travelers, pasangan, maupun keluarga.</p>
    
    <h3>Visi</h3>
    <p>Menjadi hotel pilihan utama bagi semua kalangan, dengan menciptakan lingkungan yang ramah, profesional, dan memprioritaskan kepuasan pelanggan.</p>
    
    <h3>Misi</h3>
    <p>Misi kami adalah memberikan pengalaman menginap yang tidak terlupakan dengan fasilitas terbaik dan layanan yang selalu mengutamakan kenyamanan tamu. Kami percaya bahwa setiap tamu layak mendapatkan pelayanan yang istimewa, membuat mereka merasa seperti di rumah sendiri.</p>
    
    <h3>Kenapa memilih layanan kami?</h3>
    <ul>
        <li>Lokasi Strategis - Terletak di pusat kota, dekat dengan berbagai destinasi wisata dan tempat penting lainnya.</li>
        <li>Fasilitas Lengkap - Dari kamar nyaman hingga layanan spa dan restoran, kami memiliki semuanya untuk memenuhi kebutuhan Anda.</li>
        <li>Pelayanan Terbaik - Tim kami siap melayani Anda dengan sepenuh hati, membuat setiap kunjungan Anda istimewa.</li>
    </ul>
    
    <h3>Kontak</h3>
    <p>Alamat: Jalan Perfect No. 12, Jakarta</p>
    <p>Telepon: 021-1234567</p>
    <p>Email: <a href="mailto:info@hotelperfect.com">info@hotelperfect.com</a></p>
</div>
