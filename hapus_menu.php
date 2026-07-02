<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include 'config/koneksi.php';

$id = $_GET['id'];

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
