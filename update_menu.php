<?php

session_start();

include 'config/koneksi.php';

$id_menu = $_POST['id_menu'];
$nama_menu = $_POST['nama_menu'];
$kategori = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];

mysqli_query(
    $koneksi,
    "UPDATE menu SET
    nama_menu='$nama_menu',
    kategori ='$kategori',
    deskripsi ='$deskripsi',
    harga ='$harga'
    WHERE id_menu ='$id_menu'"
);

header("Location: data_menu.php");
exit;
