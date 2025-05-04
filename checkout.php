<?php
session_start();
include 'includes/db.php';

if (empty($_SESSION['keranjang'])) {
    echo "Keranjang kosong. <a href='pesan.php'>Kembali ke Menu</a>";
    exit;
}

// Jika form dikirim (submit)
if (isset($_POST['checkout'])) {
    $nama = $_POST['nama'];
    $catatan = $_POST['catatan'];
    $tanggal = date('Y-m-d H:i:s');

    // Hitung total
    $total = 0;
    foreach ($_SESSION['keranjang'] as $item) {
        $total += $item['harga'] * $item['jumlah'];
    }

    // Simpan ke tabel pesanan
    $sqlPesan = "INSERT INTO pesanan (nama_pelanggan, catatan, total_harga, tanggal_pesan)
                 VALUES ('$nama', '$catatan', $total, '$tanggal')";
    $conn->query($sqlPesan);

    $id_pesanan = $conn->insert_id;

    // Simpan detail pesanan
    foreach ($_SESSION['keranjang'] as $item) {
        $id_menu = $item['id_menu'];
        $jumlah = $item['jumlah'];
        $harga = $item['harga'];

        $sqlDetail = "INSERT INTO detail_pesanan (id_pesanan, id_menu, jumlah, harga)
                      VALUES ($id_pesanan, $id_menu, $jumlah, $harga)";
        $conn->query($sqlDetail);
    }

    // Bersihkan session keranjang
    unset($_SESSION['keranjang']);

    // Arahkan ke halaman sukses
    header("Location: sukses.php?id=$id_pesanan");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h2>Form Checkout</h2>

    <form method="post" action="">
        <label>Nama Pelanggan:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Catatan Tambahan (opsional):</label><br>
        <textarea name="catatan" rows="3"></textarea><br><br>

        <button type="submit" name="checkout">Konfirmasi Pesanan</button>
    </form>
</body>
</html>
