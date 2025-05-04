<?php
session_start();
include 'db.php';

if (isset($_POST['tambah'])) {
    $id_menu = $_POST['id_menu'];
    $jumlah = $_POST['jumlah'];

    // Ambil data menu dari DB
    $query = "SELECT * FROM menu WHERE id_menu = $id_menu";
    $result = $conn->query($query);
    $menu = $result->fetch_assoc();

    // Buat item untuk keranjang
    $item = [
        'id_menu' => $menu['id_menu'],
        'nama_menu' => $menu['nama_menu'],
        'harga' => $menu['harga'],
        'jumlah' => $jumlah
    ];

    // Cek jika item sudah ada di keranjang
    if (isset($_SESSION['keranjang'][$id_menu])) {
        $_SESSION['keranjang'][$id_menu]['jumlah'] += $jumlah;
    } else {
        $_SESSION['keranjang'][$id_menu] = $item;
    }

    header("Location: keranjang_view.php");
    exit;
}
?>
