<?php

session_start();

include 'config/koneksi.php';

$nama_menu = $_POST['nama_menu'];
$kategori = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];

mysqli_query(
    $koneksi,
    "INSERT INTO menu
    (
    nama_menu,
    kategori,
    deskripsi,
    harga
    )
    VALUES
    (
    '$nama_menu',
    '$kategori',
    '$deskripsi',
    '$harga'
    )"
);

header("Location: data_menu.php");
exit;
