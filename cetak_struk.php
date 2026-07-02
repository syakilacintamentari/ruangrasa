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
    JOIN Menu
    ON detail_pesanan.id_menu = menu.id_menu
    WHERE detail_pesanan.id_pesanan = '$id'"


);
?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Cetak Struk
    </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            width: 300px;
            margin: auto;
        }

        h2 {
            text-align: center;

        }

        table {
            width: 100%;
        }


        td {
            padding: 3px;
        }

        hr {
            border: 1px dashed black;
        }
    </style>

</head>

<body>
    <h2>RUANG RASA</h2>

    <p align="center">
        Nikmati Setiap Rasa,<br>
        Ciptakan Setiap Cerita
    </p>

    <hr>

    <p>
        Nama: <?php echo $pesanan['nama_pelanggan']; ?>
        <br>
        Meja: <?php echo $pesanan['nomor_meja']; ?>
        <br>
        Tanggal: <?php echo $pesanan['tanggal']; ?>
    </p>

    <hr>

    <table>
        <?php while ($row = mysqli_fetch_assoc($detail)) { ?>

            <tr>
                <td>
                    <?php echo $row['nama_menu']; ?>
                </td>

                <td align="center">
                    x<?php echo $row['qty']; ?>
                </td>

                <td align="right">
                    Rp<?php echo number_format($row['subtotal']); ?>
                </td>
            </tr>

        <?php } ?>
    </table>

    <hr>

    <h3>
        Total:
        Rp<?php echo number_format($pesanan['total']); ?>
    </h3>

    <hr>

    <p align="center">
        Terimakasih
    </p>

    <script>
        window.print();
    </script>
</body>

</html>