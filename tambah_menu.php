<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Tambah Menu</title>
</head>

<body>
    <h1>Tambah Menu Baru</h1>

    <form action="simpan_menu.php" method="POST">
        <P>
            Nama Menu
            <br>
            <input type="text" name="nama_menu" required>
        </P>

        <p>
            Kategori
            <br>

            <select name="kategori" required>
                <option value="">--Pilih Kategori--</option>

                <option value="Minuman">Minuman</option>
                <option value="Makanan">Makanan</option>
                <option value="Cemilan">Cemilan</option>
                <option value="Dessert">Dessert</option>
            </select>
        </p>

        <p>
            Deskripsi
            <br>
            <textarea
                name="deskripsi"
                rows="4"
                cols="40"
                required></textarea>
        </p>

        <p>
            Harga
            <br>
            <input type="number" name="harga" required>
        </p>

        <button type="submit">
            Simpan Menu
        </button>
    </form>
    <br>

    <a href="data_menu.php">
        Kembali
    </a>

</body>

</html>