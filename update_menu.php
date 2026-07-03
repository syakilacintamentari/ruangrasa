<?php

session_start();

include 'config/koneksi.php';

$id_menu = $_POST['id_menu'];
$nama_menu = $_POST['nama_menu'];
$kategori = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];

/* Ambil data menu lama */
$query = mysqli_query(
    $koneksi,
    "SELECT * FROM menu WHERE id_menu='$id_menu'"
);

$menu = mysqli_fetch_assoc($query);

/* Gunakan foto lama jika tidak upload foto baru */
$foto = $menu['foto'];

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
    "UPDATE menu SET
    nama_menu='$nama_menu',
    kategori='$kategori',
    deskripsi='$deskripsi',
    harga='$harga',
    foto='$foto'
    WHERE id_menu='$id_menu'"
);

header("Location: data_menu.php");
exit;
