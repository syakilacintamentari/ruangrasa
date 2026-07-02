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
</head>

<body>
    <h1>Dashboard Admin Ruang Rasa</h1>

    <hr>
    <div class="row">
        <div class="col-md-3">
            <div class="card-shadow">
                <div class="card-body">
                    <h5>Total Menu</h5>
                    <h2><?php echo $total_menu; ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-shadow">
                <div class="card-body">
                    <h5>Total Pesanan</h5>
                    <h2><?php echo $total_pesanan; ?></h2>
                </div>
            </div>
        </div>

    </div>
    <p




        <h3>Pendapatan Hari Ini</h3>
    <p>
        Rp <?php echo number_format($pendapatan_hari['total_hari'] ?? 0); ?>
    </p>

    <h3>Pendapatan Bulan Ini</h3>
    <p>
        Rp <?php echo number_format($pendapatan_bulan['total_bulan'] ?? 0); ?>
    </p>

    <hr>

    <a href="data_menu.php">
        Kelola Menu
    </a>
    <br><br>


    <a href="data_pesanan.php">
        Kelola Pesanan
    </a>
    <br><br>

    <a href="laporan.php">
        Laporan Penjualan
    </a>
    <br><br>

    <a href="logout.php">
        Logout
    </a>
    <br><br>
</body>

</html>