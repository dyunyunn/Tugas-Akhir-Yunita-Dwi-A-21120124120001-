<!DOCTYPE html>
<html lang="id">
<head>
    <title>Hasil Pesanan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
         /* modul 8. GUI: Pengaturan visual tampilan halaman */
        body {
            background-color: #f8f9fa; 
            font-family: Arial, sans-serif; 
        }
        .container {
            margin-top: 50px; 
        }
        .card {
            border-radius: 10px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
        }
        .card-header {
            background-color: #007bff; 
            color: white; 
            font-weight: bold; 
        }
        .btn-primary {
            background-color: #28a745; 
            border: none; 
        }
        .btn-primary:hover {
            background-color: #218838; 
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="mt-4 text-center">Detail Pesanan</h2> <!-- Menambahkan kelas text-center untuk meratakan teks -->
    <div class="card">
        <div class="card-header text-center"> <!-- Meratakan teks header -->
            Informasi Pemesanan
        </div>
        <div class="card-body">
        <?php
            // Mengambil data dari form yang dikirimkan
            $meja = htmlspecialchars($_POST['meja']);
            $nama = htmlspecialchars($_POST['nama']);
            $jenis_menu = htmlspecialchars($_POST['jenis_menu']);
            $jumlah = htmlspecialchars($_POST['jumlah']);

            // modul 2 pengkondisian : Mendefinisikan harga untuk setiap jenis menu
            $harga_menu = 0;
            switch ($jenis_menu) {
                case 'Luwak Hitam':
                    $harga_menu = 20000;
                    break;
                case 'Cappucino':
                    $harga_menu = 35000;
                    break;
                case 'Gajah Tubruk':
                    $harga_menu = 18000;
                    break;
                case 'Gula Aren':
                    $harga_menu = 20000;
                    break;
                case 'Caramel Latte':
                    $harga_menu = 25000;
                    break;
                case 'Coffee Susu':
                    $harga_menu = 15000;
                    break;
                case 'Matcha Latte':
                    $harga_menu = 30000;
                    break;
                default:
                    $harga_menu = 0; // Jika jenis menu tidak valid
                    break;
            }

            // Menghitung total harga
            $total_harga = $harga_menu * $jumlah;

            // Menampilkan hasil pesanan
            echo "<p><strong>Meja:</strong> $meja</p>";
            echo "<p><strong>Nama:</strong> $nama</p>";
            echo "<p><strong>Jenis Menu:</strong> $jenis_menu</p>";
            echo "<p><strong>Jumlah:</strong> $jumlah</p>";
            echo "<p><strong>Total Harga:</strong> Rp " . number_format($total_harga, 0, ',', '.') . "</p>"; // Menampilkan total harga dalam format yang benar
        ?>
        </div>
        <div class="card-footer text-center"> <!-- Meratakan teks footer -->
            <a href="index.html" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
