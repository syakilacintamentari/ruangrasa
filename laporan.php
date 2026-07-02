<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include 'config/koneksi.php';

$data = mysqli_query(
    $koneksi,
    "SELECT * FROM pesanan
    ORDER BY tanggal DESC"
);

$total = mysqli_fetch_assoc(
    mysqli_query(
        $koneksi,
        "SELECT SUM(total) AS pendapatan
        FROM pesanan
        WHERE status = 'Selesai'"
    )
);

?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Laporan Penjualan
    </title>
</head>

<body>
    <h1>Laporan Penjualan Ruang Rasa</h1>

    <a href="dashboard.php">
        Kembali Ke Dashboard
    </a>

    <hr>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Pelanggan</th>
            <th>Meja</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Status</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($data)) { ?>
            <tr>
                <td><?php echo $row['id_pesanan']; ?></td>
                <td><?php echo $row['nama_pelanggan']; ?></td>
                <td><?php echo $row['nomor_meja']; ?></td>
                <td><?php echo $row['tanggal']; ?></td>
                <td><?php echo number_format($row['total']); ?></td>
                <td><?php echo $row['status']; ?></td>

            </tr>

        <?php } ?>


    </table>
    <hr>

    <h2>Total Pendapatan:
        Rp<?php echo number_format($total['pendapatan']) ?? 0; ?>
    </h2>
</body>

</html>