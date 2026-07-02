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
    ORDER BY id_pesanan DESC"
);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Pesanan</title>
</head>

<body>
    <h1>Data Pesanan Ruang Rasa</h1>

    <a href="dashboard.php">
        Kembali ke Dashboard
    </a>

    <br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nama Pelanggan</th>
            <th>Nomor Meja</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($data)) { ?>

            <tr>
                <td><?php echo $row['id_pesanan']; ?></td>
                <td><?php echo $row['nama_pelanggan']; ?></td>
                <td><?php echo $row['nomor_meja']; ?></td>
                <td><?php echo $row['tanggal']; ?></td>
                <td>
                    Rp<?php echo number_format($row['total']); ?>
                </td>
                <td><?php echo $row['status']; ?>
                </td>

                <td>
                    <a href="detail_pesanan.php?id=<?php echo $row['id_pesanan']; ?>">
                        Detail
                    </a>

                    |

                    <a href="ubah_status.php?id=<?php echo $row['id_pesanan']; ?>">
                        Ubah Status
                    </a>
                </td>
            </tr>

        <?php } ?>
    </table>
</body>

</html>