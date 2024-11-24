<!DOCTYPE html>
<html lang="id">
<head>
    <title>Beli</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    /* GUI modul 8 untuk menampilkan visual halaman */
    .body {
        background-color: #ce3d03;
    }
    .container {
        position: absolute;
        margin-top: -250px;
        margin-left: -150px;
        left: 50%;
        top: 50%;
        width: 500%;
    }
    .card-header {
        background-color: #4CAF50;
        text-align: center;
    }
</style>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form action="simpan_beli.php" method="POST">
                <div class="card">
                    <div class="card-header">
                        Form Pemesanan
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Meja</label>
                            <input type="text" class="form-control" name="meja" placeholder="Masukkan nomor meja" required>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan nama" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Menu</label>
                            <select class="form-control" name="jenis_menu" id="jenis_menu" required>
                                <option value="" data-harga="0">Pilih Menu</option>                                  <!-- modul 1. Variabel, Tipe Data, dan Array: Menggunakan atribut data-harga untuk menyimpan harga setiap menu -->
                                <option value="Luwak Hitam" data-harga="20000">Luwak Hitam - Rp 20,000</option>
                                <option value="Cappucino" data-harga="35000">Cappucino - Rp 35,000</option>
                                <option value="Gajah Tubruk" data-harga="18000">Gajah Tubruk - Rp 18,000</option>
                                <option value="Gula Aren" data-harga="20000">Gula Aren - Rp 20,000</option>
                                <option value="Caramel Latte" data-harga="25000">Gula Aren - Rp 25,000</option>
                                <option value="Coffee Susu" data-harga="15000">Gula Aren - Rp 15,000</option>
                                <option value="Matcha Latte" data-harga="30000">Matcha Latte - Rp 30,000</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Masukkan jumlah" required min="1" value="1">
                        </div>
                        <div class="form-group">
                            <label>Total Harga</label>
                            <input type="text" class="form-control" id="total_harga" placeholder="Total harga" readonly>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Buat Pesanan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modul 3 perulangan dan modul 4 function method -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
     /* modul 1. Variabel, Tipe Data, dan Array: Menggunakan variabel untuk menu dan harga */
    const jenisMenu = document.getElementById('jenis_menu');
    const jumlah = document.getElementById('jumlah');
    const totalHarga = document.getElementById('total_harga');
    
/* modul 4. Function and Method: Fungsi hitungTotalHarga untuk menghitung total harga berdasarkan pilihan */
    function hitungTotalHarga() {

        // modul 1. Variabel, Tipe Data, dan Array: Mengambil harga menu dari atribut data-harga
        const harga = parseInt(jenisMenu.options[jenisMenu.selectedIndex].getAttribute('data-harga')) || 0;
        const jumlahPesanan = parseInt(jumlah.value) || 1;
        totalHarga.value = 'Rp ' + (harga * jumlahPesanan).toLocaleString('id-ID');
    }
//modul 2. Pengkondisian Mengatur event listener berdasarkan perubahan pada jenis menu dan jumlah
    jenisMenu.addEventListener('change', hitungTotalHarga);
    jumlah.addEventListener('input', hitungTotalHarga);

       /* 4. Function and Method: Menjalankan fungsi hitungTotalHarga saat halaman pertama kali dimuat */
    document.addEventListener('DOMContentLoaded', hitungTotalHarga);
</script>
</body>
</html>