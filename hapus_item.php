<?php
session_start();

if (isset($_GET['id'])) {
    $id_menu = $_GET['id'];
    unset($_SESSION['keranjang'][$id_menu]);
}

header("Location: keranjang_view.php");
exit;
?>
