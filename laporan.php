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
        WHERE status='Selesai'"
    )
);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Laporan Penjualan | Ruang Rasa</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>
        body {
            background: #f5f5f5;
        }

        .card {
            border: none;
            border-radius: 18px;
        }

        .table th {
            background: white;
            color: #198754;
            border-bottom: 3px solid #198754;
            font-weight: bold;
        }

        .footer {
            margin-top: 50px;
            background: #212529;
            color: white;
            text-align: center;
            padding: 15px;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow">

        <div class="container">

            <a class="navbar-brand fw-bold" href="dashboard.php">
                Ruang Rasa Admin
            </a>

            <a href="dashboard.php"
                class="btn btn-light">
                Dashboard
            </a>

        </div>

    </nav>

    <div class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-success text-white">

                <h4 class="mb-0">
                    Laporan Penjualan
                </h4>

            </div>

            <div class="card-body">

                <table class="table table-bordered table-hover table-striped align-middle">

                    <thead>

                        <tr>

                            <th>ID</th>
                            <th>Pelanggan</th>
                            <th>Meja</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php while ($row = mysqli_fetch_assoc($data)) { ?>

                            <tr>

                                <td><?php echo $row['id_pesanan']; ?></td>

                                <td><?php echo $row['nama_pelanggan']; ?></td>

                                <td><?php echo $row['nomor_meja']; ?></td>

                                <td><?php echo $row['tanggal']; ?></td>

                                <td>
                                    Rp<?php echo number_format($row['total'], 0, ",", "."); ?>
                                </td>

                                <td>

                                    <?php
                                    if ($row['status'] == "Menunggu") {
                                        echo "<span class='badge bg-warning text-dark'>Menunggu</span>";
                                    } elseif ($row['status'] == "Diproses") {
                                        echo "<span class='badge bg-primary'>Diproses</span>";
                                    } else {
                                        echo "<span class='badge bg-success'>Selesai</span>";
                                    }
                                    ?>

                                </td>

                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

                <div class="text-end mt-4">

                    <h4 class="text-success fw-bold">
                        Total Pendapatan :
                        Rp<?php echo number_format($total['pendapatan'] ?? 0, 0, ",", "."); ?>
                    </h4>

                </div>

            </div>

        </div>

    </div>

    <div class="footer">
        &copy; <?php echo date("Y"); ?> Ruang Rasa Cafe & Resto.
        <br>
        Nikmati Setiap Rasa, Ciptakan Setiap Cerita
    </div>

</body>

</html>