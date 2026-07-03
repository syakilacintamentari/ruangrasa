<?php

session_start();

include 'config/koneksi.php';

$nama_menu = $_POST['nama_menu'];
$kategori = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];

$foto = "";
if (isset($_FILES['foto']) && $_FILES['foto']['name'] != "") {
    $foto = time() . "_" . $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    move_uploaded_file(
        $tmp,
        "assets/images/" . $foto
    );
}

mysqli_query(
    $koneksi,
    "INSERT INTO menu
    (
    nama_menu,
    kategori,
    deskripsi,
    harga,
    foto
    )
    VALUES
    (
    '$nama_menu',
    '$kategori',
    '$deskripsi',
    '$harga',
    '$foto'
    )"
);

header("Location: data_menu.php");
exit;
