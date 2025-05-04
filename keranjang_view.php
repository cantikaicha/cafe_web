<?php include 'db.php'; ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>Keranjang Belanja</h1>

    <?php if (!empty($_SESSION['keranjang'])): ?>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>

            <?php
            $grand_total = 0;
            foreach ($_SESSION['keranjang'] as $item):
                $total = $item['harga'] * $item['jumlah'];
                $grand_total += $total;
            ?>
            <tr>
                <td><?= $item['nama_menu']; ?></td>
                <td>Rp <?= number_format($item['harga'], 0, ',', '.'); ?></td>
                <td><?= $item['jumlah']; ?></td>
                <td>Rp <?= number_format($total, 0, ',', '.'); ?></td>
                <td><a href="hapus_item.php?id=<?= $item['id_menu']; ?>">Hapus</a></td>
            </tr>
            <?php endforeach; ?>

            <tr>
                <td colspan="3"><strong>Total</strong></td>
                <td colspan="2"><strong>Rp <?= number_format($grand_total, 0, ',', '.'); ?></strong></td>
            </tr>
        </table>

        <br>
        <a href="checkout.php"><button>Lanjutkan ke Checkout</button></a>
    <?php else: ?>
        <p>Keranjang masih kosong.</p>
    <?php endif; ?>
</body>
</html>
