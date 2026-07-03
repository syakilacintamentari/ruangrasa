<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include 'config/koneksi.php';

$total_menu = mysqli_num_rows(
    mysqli_query($koneksi, "SELECT * FROM menu")
);

$total_pesanan = mysqli_num_rows(
    mysqli_query($koneksi, "SELECT * FROM pesanan")
);

$pendapatan_hari = mysqli_fetch_assoc(
    mysqli_query(
        $koneksi,
        "SELECT SUM(total) AS total_hari
        FROM pesanan
        WHERE DATE(tanggal)=CURDATE()"
    )
);

$pendapatan_bulan = mysqli_fetch_assoc(
    mysqli_query(
        $koneksi,
        "SELECT SUM(total) AS total_bulan
        FROM pesanan
        WHERE MONTH(tanggal)=MONTH(CURDATE())
        AND YEAR(tanggal)=YEAR(CURDATE())"
    )
);


?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard Admin</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background: #f5f5f5;
        }

        .navbar-brand {
            font-weight: bold;
        }

        .card {
            border: none;
            border-radius: 18px;
        }

        .card h2 {
            font-weight: bold;
        }

        .menu-card {
            transition: .3s;
        }

        .menu-card:hover {
            transform: translateY(-6px);
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

            <a class="navbar-brand" href="#">
                <i class="bi bi-cup hot-fill"></i>
                Ruang Rasa Admin
            </a>

            <a href="logout.php"
                class="btn btn-light">
                Logout
            </a>

        </div>
    </nav>

    <div class="container mt-5">

        <h2 class="fw-bold mb-4">
            Dashboard Admin
        </h2>

        <p class="text-muted mb-4">
            Selamat datang di dashboard admin Ruang Rasa Cafe & Resto.
            Di sini Anda dapat mengelola menu, pesanan, dan melihat laporan penjualan.
        </p>

        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card menu-card shadow bg-success text-white">
                    <div class="card-body text-center">
                        <i class="bi bi-journal-bookmark-fill fs-1"></i>
                        <h5 class="mt-3">
                            Total Menu
                        </h5>
                        <h2>
                            <?php echo $total_menu; ?>
                        </h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card menu-card shadow bg-primary text-white">
                    <div class="card-body text-center">
                        <i class="bi bi-receipt fs-1"></i>
                        <h5 class="mt-3">
                            Total Pesanan
                        </h5>
                        <h2>
                            <?php echo $total_pesanan; ?>
                        </h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card menu-card shadow bg-warning text-dark">
                    <div class="card-body text-center">
                        <i class="bi bi-cash-stack fs-1"></i>
                        <h6 class="mt-3">
                            Pendapatan Hari Ini
                        </h6>

                        <h5>
                            Rp
                            <?php echo number_format($pendapatan_hari['total_hari'] ?? 0, 0, ",", "."); ?>
                        </h5>
                        <?php echo date("d F Y"); ?>
                        <br>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card menu-card shadow bg-danger text-white">
                    <div class="card-body text-center">
                        <i class="bi bi-graph-up-arrow fs-1"></i>
                        <h6 class="mt-3">
                            Pendapatan Bulan Ini
                        </h6>
                        <h5>
                            Rp
                            <?php echo number_format($pendapatan_bulan['total_bulan'] ?? 0, 0, ",", "."); ?>
                        </h5>
                        <?php echo date("F Y"); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-header bg-success text-white">
                Menu Admin
            </div>

            <div class="card-body">
                <div class="d-grid gap-3">
                    <a href="data_menu.php"
                        class="btn btn-outline-success">
                        📖 Kelola Menu
                    </a>

                    <a href="data_pesanan.php"
                        class="btn btn-outline-primary">
                        🧾 Kelola Pesanan
                    </a>

                    <a href="laporan.php"
                        class="btn btn-outline-warning">
                        📊 Laporan Penjualan
                    </a>
                </div>
            </div>

        </div>

    </div>

    <div class="footer">
        © 2026 Ruang Rasa Cafe & Resto
        <br>
        Nikmati Setiap Rasa, Ciptakan Setiap Cerita
    </div>

</body>

</html>