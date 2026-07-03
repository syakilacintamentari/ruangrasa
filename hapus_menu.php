<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include 'config/koneksi.php';

if (!isset($_GET['id'])) {
    header("Location: data_menu.php");
    exit;
}

$id = $_GET['id'];

$query = mysqli_query(
    $koneksi,
    "SELECT foto FROM menu WHERE id_menu='$id'"
);

$data = mysqli_fetch_assoc($query);

if (!empty($data['foto'])) {

    $path = "assets/images/" . $data['foto'];

    if (file_exists($path)) {
        unlink($path);
    }
}

mysqli_query(
    $koneksi,
    "DELETE FROM detail_pesanan
    WHERE id_menu='$id'"
);

mysqli_query(
    $koneksi,
    "DELETE FROM menu
    WHERE id_menu='$id'"
);

header("Location: data_menu.php");
exit;
