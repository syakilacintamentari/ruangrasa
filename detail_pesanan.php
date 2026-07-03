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
    <title>Detail Pesanan | Ruang Rasa</title>

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

            <a href="data_pesanan.php"
                class="btn btn-light">
                Data Pesanan
            </a>

        </div>
    </nav>

    <div class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-success text-white">
                <h4 class="mb-0">
                    Detail Pesanan
                </h4>
            </div>

            <div class="card-body">

                <div class="row mb-4">

                    <div class="col-md-4">
                        <strong>Nama Pelanggan</strong><br>
                        <?php echo $pesanan['nama_pelanggan']; ?>
                    </div>

                    <div class="col-md-3">
                        <strong>Nomor Meja</strong><br>
                        <?php echo $pesanan['nomor_meja']; ?>
                    </div>

                    <div class="col-md-3">
                        <strong>Status</strong><br>

                        <?php
                        if ($pesanan['status'] == "Menunggu") {
                            echo "<span class='badge bg-warning text-dark'>Menunggu</span>";
                        } elseif ($pesanan['status'] == "Diproses") {
                            echo "<span class='badge bg-primary'>Diproses</span>";
                        } else {
                            echo "<span class='badge bg-success'>Selesai</span>";
                        }
                        ?>

                    </div>

                </div>

                <table class="table table-bordered table-hover table-striped">

                    <thead>

                        <tr>
                            <th>Menu</th>
                            <th width="120">Qty</th>
                            <th width="180">Subtotal</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php while ($row = mysqli_fetch_assoc($detail)) { ?>

                            <tr>

                                <td>
                                    <?php echo $row['nama_menu']; ?>
                                </td>

                                <td>
                                    <?php echo $row['qty']; ?>
                                </td>

                                <td>
                                    Rp<?php echo number_format($row['subtotal'], 0, ",", "."); ?>
                                </td>

                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

                <div class="text-end mt-4">

                    <h4 class="text-success fw-bold">
                        Total :
                        Rp<?php echo number_format($pesanan['total'], 0, ",", "."); ?>
                    </h4>

                </div>

                <div class="mt-4 d-flex gap-2">

                    <a
                        href="data_pesanan.php"
                        class="btn btn-secondary">
                        Kembali
                    </a>

                    <a
                        href="cetak_struk.php?id=<?php echo $id; ?>"
                        class="btn btn-success">
                        Cetak Struk
                    </a>

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