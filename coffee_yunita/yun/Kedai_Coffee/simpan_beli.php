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
    <h2 class="mt-4 text-center">Detail Pesanan</h2>
    <div class="card">
        <div class="card-header text-center">
            Informasi Pemesanan
        </div>
        <div class="card-body">
        <?php
            class Pesanan {      // class untuk menampung data pesanan  //abstraction untuk menyembunyikan detail implementasi
                private $meja;     //variabel untuk menyimpan
                private $nama;      // encapsulation dideklarasikan sebagai private
                private $jenis_menu;
                private $jumlah;

                // Setter
                public function setMeja($meja) {      // method dari class Pesanan
                    $this->meja = htmlspecialchars($meja);
                }

                public function setNama($nama) {
                    $this->nama = htmlspecialchars($nama);
                }

                public function setJenisMenu($jenis_menu) {
                    $this->jenis_menu = htmlspecialchars($jenis_menu);
                }

                public function setJumlah($jumlah) {
                    $this->jumlah = htmlspecialchars($jumlah);
                }

                // Getter
                public function getMeja() {    // method dari class Pesanan
                    return $this->meja;
                }

                public function getNama() {
                    return $this->nama;
                }

                public function getJenisMenu() {
                    return $this->jenis_menu;
                }

                public function getJumlah() {
                    return $this->jumlah;
                }

                public function hitungTotalHarga() {     //method dari class Pesanan
                    $harga_menu = 0;
                    switch ($this->jenis_menu) {    //pengkondisian untuk menentukan harga menu
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
                    return $harga_menu * $this->jumlah;
                }
            }

            // Mengambil data dari form yang dikirimkan
            $pesanan = new Pesanan();     //membuat class baru
            $pesanan->setMeja($_POST['meja']);      // $_POST ini adalah yang mengambil nilai dari input form dan menyimpannya ke set
            $pesanan->setNama($_POST['nama']);
            $pesanan->setJenisMenu($_POST['jenis_menu']);
            $pesanan->setJumlah($_POST['jumlah']);

            // Menghitung total harga
            $total_harga = $pesanan->hitungTotalHarga();

            // Menampilkan hasil pesanan, echo untuk mencetak informasi ke halaman webnya
            echo "<p><strong>Meja:</strong> " . $pesanan->getMeja() . "</p>";      
            echo "<p><strong>Nama:</strong> " . $pesanan->getNama() . "</p>";
            echo "<p><strong>Jenis Menu:</strong> " . $pesanan->getJenisMenu() . "</p>";
            echo "<p><strong>Jumlah:</strong> " . $pesanan->getJumlah() . "</p>";
            echo "<p><strong>Total Harga:</strong> Rp " . number_format($total_harga, 0, ',', '.') . "</p>";
        ?>
        </div>
        <div class="card-footer text-center">
            <a href="index.html" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>   
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
