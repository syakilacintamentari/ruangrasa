<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include 'config/koneksi.php';

$id = $_GET['id'];

$pesanan = mysqli_fetch_assoc(
    mysqli_query(
        $koneksi,
        "SELECT * FROM pesanan
        WHERE id_pesanan = '$id'"
    )
);

$detail = mysqli_query(
    $koneksi,
    "SELECT detail_pesanan.*,
    menu.nama_menu
    FROM detail_pesanan
    JOIN menu
    ON detail_pesanan.id_menu = menu.id_menu
    WHERE detail_pesanan.id_pesanan = '$id'"
);

?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Detail Pesanan
    </title>
</head>

<body>
    <h1>Detail Pesanan</h1>

    <a href="data_pesanan.php">
        Kembali
    </a>

    <hr>

    <p>
        <b>Nama Pelanggan:</b>
        <?php echo $pesanan['nama_pelanggan']; ?>
    </p>

    <p>
        <b>Nomor Meja:</b>
        <?php echo $pesanan['nomor_meja']; ?>
    </p>

    <p>
        <b>Status:</b>
        <?php echo $pesanan['status']; ?>

    </p>

    <hr>

    <table border="1" cellpadding="10">
        <tr>
            <th>Menu</th>
            <th>Qty</th>
            <th>Subtotal</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($detail)) { ?>
            <tr>
                <td>
                    <?php echo $row['nama_menu']; ?>
                </td>
                <td>
                    <?php echo $row['qty']; ?>
                </td>

                <td>
                    <?php echo $row['subtotal']; ?>
                </td>
            </tr>
        <?php } ?>
    </table>
    <hr>
    <h3>
        Total:
        Rp<?php echo number_format($pesanan['total']); ?>
    </h3>

    <br>

    <a href="cetak_struk.php?id=<?php echo $id; ?>">
        Cetak Struk
    </a>
</body>

</html>