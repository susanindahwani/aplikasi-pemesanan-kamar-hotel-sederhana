<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - Hotel Booking</title>
    <link rel="stylesheet" href="style.css">
</head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        .product-card {
            display: flex;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .product-card img {
            width: 250px;
            height: 150px;
            object-fit: cover;
            margin-right: 20px;
            border-radius: 5px;
        }
        .product-details {
            flex: 1;
        }
        .product-details h3 {
            margin: 0;
            font-size: 20px;
        }
        .product-details p {
            margin: 5px 0;
            line-height: 1.6;
        }
        .price {
            font-weight: bold;
            color: #007BFF;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Produk - Jenis Kamar</h1>

        <!-- Standard Room -->
        <div class="product-card">
            <img src="assets/images/standar.jpg" alt="Kamar Standar">
            <div class="product-details">
                <h3>Standar Room</h3>
                <p>Kamar yang cocok untuk solo traveler atau pasangan, dengan fasilitas dasar seperti tempat tidur nyaman,AC,wifi gratis,meja kerja,dan kamar mandi pribadi.</p>
                <p class="price">Harga: Rp500.000/hari</p>
            </div>
        </div>

        <!-- Deluxe Room -->
        <div class="product-card">
            <img src="assets/images/deluxe.jpg" alt="Kamar Deluxe">
            <div class="product-details">
                <h3>Deluxe Room</h3>
                <p>Kamar mewah dan dekorasi modern. Ideal untuk pasangan yang menginginkan kenyamanan ekstra. Dengan Fasiltias Tempat tidur, AC,wifi gratis,mini bar, dan kamar mandi pribadi.</p>
                <p class="price">Harga: Rp800.000/hari</p>
            </div>
        </div>

        <!-- Family Room -->
        <div class="product-card">
            <img src="assets/images/family.jpg" alt="Kamar Family">
            <div class="product-details">
                <h3>Family Room</h3>
                <p>Kamar luas sempurna untuk keluarga yang menginginkan kenyamanan selama liburan. Dengan Fasilitas Tempat tidur 2 tempat tidur ukuran Twin,AC,meja dan kursi yang kebih besar,Kamar mandi dengan shower,Lemari pakaian besar dengan rak tambahan untuk barang keluarga,Wifi gratis.</p>
                <p class="price">Harga: Rp1.200.000/hari</p>
            </div>
        </div>
    </div>
</body>
</html>
