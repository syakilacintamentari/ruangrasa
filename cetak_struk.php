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
        WHERE id_pesanan='$id'"
    )
);

$detail = mysqli_query(
    $koneksi,
    "SELECT detail_pesanan.*,
    menu.nama_menu
    FROM detail_pesanan
    JOIN menu
    ON detail_pesanan.id_menu = menu.id_menu
    WHERE detail_pesanan.id_pesanan='$id'"
);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Cetak Struk</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            width: 320px;
            margin: auto;
            color: #000;
        }

        h2,
        p {
            text-align: center;
            margin: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 4px 0;
            font-size: 14px;
        }

        hr {
            border: none;
            border-top: 1px dashed #000;
            margin: 10px 0;
        }

        .right {
            text-align: right;
        }

        .center {
            text-align: center;
        }

        .total {
            font-size: 18px;
            font-weight: bold;
        }
    </style>

</head>

<body>

    <h2>RUANG RASA</h2>

    <p>
        Cafe & Resto
    </p>

    <p>
        Nikmati Setiap Rasa,<br>
        Ciptakan Setiap Cerita
    </p>

    <hr>

    <table>

        <tr>
            <td>Nama</td>
            <td class="right">
                <?php echo $pesanan['nama_pelanggan']; ?>
            </td>
        </tr>

        <tr>
            <td>Meja</td>
            <td class="right">
                <?php echo $pesanan['nomor_meja']; ?>
            </td>
        </tr>

        <tr>
            <td>Tanggal</td>
            <td class="right">
                <?php echo $pesanan['tanggal']; ?>
            </td>
        </tr>

    </table>

    <hr>

    <table>

        <?php while ($row = mysqli_fetch_assoc($detail)) { ?>

            <tr>

                <td colspan="2">
                    <?php echo $row['nama_menu']; ?>
                </td>

            </tr>

            <tr>

                <td>
                    <?php echo $row['qty']; ?> x
                </td>

                <td class="right">
                    Rp<?php echo number_format($row['subtotal'], 0, ",", "."); ?>
                </td>

            </tr>

        <?php } ?>

    </table>

    <hr>

    <table>

        <tr>

            <td class="total">
                TOTAL
            </td>

            <td class="right total">
                Rp<?php echo number_format($pesanan['total'], 0, ",", "."); ?>
            </td>

        </tr>

    </table>

    <hr>

    <p>
        Terima Kasih
    </p>

    <p>
        Selamat Menikmati
    </p>

    <p>
        Ruang Rasa Cafe & Resto
    </p>

    <script>
        window.print();
    </script>

</body>

</html>