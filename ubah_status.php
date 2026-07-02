<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include 'config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query(
        $koneksi,
        "SELECT * FROM pesanan
    WHERE id_pesanan = '$id'"
    )
);

$status = $data['status'];

if ($status == 'Menunggu') {
    $status_baru = 'Diproses';
} elseif ($status == 'Diproses') {
    $status_baru = 'Selesai';
} else {
    $status_baru = 'Selesai';
}

mysqli_query(
    $koneksi,
    "UPDATE pesanan
    SET status = '$status_baru'
    WHERE id_pesanan = '$id'"
);

header("Location: data_pesanan.php");
exit;
