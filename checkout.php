<?php

session_start();

include 'config/koneksi.php';

$nama_pelanggan = $_POST['nama_pelanggan'];
$nomor_meja = $_POST['nomor_meja'];

$total = 0;

/*Hitung total*/

foreach ($_SESSION['keranjang'] as $id_menu => $qty) {
    $query = mysqli_query(
        $koneksi,
        "SELECT * FROM menu WHERE id_menu ='$id_menu'"

    );

    $menu = mysqli_fetch_assoc($query);

    $subtotal = $menu['harga'] * $qty;

    $total += $subtotal;
}

/*Simpan ke tabel pesanan*/
mysqli_query(
    $koneksi,
    "INSERT INTO pesanan
    (nama_pelanggan, nomor_meja, tanggal, total, status)
    VALUES
    (
    '$nama_pelanggan',
    '$nomor_meja',
    NOW(),
    '$total',
    'Menunggu'
    )"
);

$id_pesanan = mysqli_insert_id($koneksi);

/*Simpan detail pesanan*/

foreach ($_SESSION['keranjang'] as $id_menu => $qty) {
    $query = mysqli_query(
        $koneksi,
        "SELECT * FROM menu WHERE id_menu = '$id_menu'"
    );
    $menu = mysqli_fetch_assoc($query);

    $subtotal = $menu['harga'] * $qty;

    mysqli_query(
        $koneksi,
        "INSERT INTO detail_pesanan
    (id_pesanan, id_menu, qty, subtotal)
    VALUES
    (
'$id_pesanan',
'$id_menu',
'$qty',
'$subtotal'
)"
    );
}

unset($_SESSION['keranjang']);
header("Location: sukses.php");
exit;
